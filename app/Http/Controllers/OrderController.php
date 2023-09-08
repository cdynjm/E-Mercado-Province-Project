<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AESCipher;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Cart;
use App\Models\Order;
use App\Models\PostProduct;
use App\Models\Cancel;
use App\Models\FinalOrder;
use App\Models\Rating;

class OrderController extends Controller
{

    protected $aes;
    protected $log;

    public function __construct(){

        $this->aes = new AESCipher();
        $this->log = new LogController();
    }

    public function place(){

        $carts = Cart::where('BuyerID', Auth::user()->account_id)->get();
        $error = 0;

        foreach($carts as $cart){

            $save = Order::insert([
                'PostID' => $cart->PostID,
                'BuyerID' => $cart->BuyerID,
                'SellerID' => $cart->SellerID,
                'qty' => $cart->qty,
                'Amount' => $cart->Amount,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if ($save){
                $del = Cart::where("id", $cart->id)->delete();
                if (!$del){
                    $error = 1;
                }
            }else{
                $error = 1;
            }

        }

        if ($error == 1){
            return redirect()->route('cart.view')->withErrors(['errors' => "Please review your cart. Some items cannot be checked out"]);
        }
        
        return redirect()->route('order.view'); 

    }

    public function view(){

        $ordersgrp = Order::select('SellerID')
            ->where("BuyerID", Auth::user()->account_id)
            ->where('orderstatus', 0)
            ->groupBy('SellerID')
            ->get();

        $orders = Order::where('BuyerID', Auth::user()->account_id)
            ->where('orderstatus', 0)
            ->get();
        $pageTitle = "My Orders";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
      
        return view('order.index', compact('ordersgrp','orders'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);
    }

    public function confirmed(){
        $ordersgrp = Order::select('SellerID')
            ->where("BuyerID", Auth::user()->account_id)
            ->where('orderstatus', 1)
            ->groupBy('SellerID')
            ->get();

        $orders = Order::where('BuyerID', Auth::user()->account_id)
            ->where('orderstatus', 1)
            ->get();
        $pageTitle = "My Confirmed Orders";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
      
        return view('order.confirmed', compact('ordersgrp','orders'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);
    }

    public function list(){

        $orders = Order::where('SellerID', Auth::user()->account_id)
            ->where('orderstatus', 0)
            ->get();

        $pageTitle = "Orders Masterlist";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
      
        return view('order.list', compact('orders'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);


    }

    public function release(){

        $orders = Order::where('SellerID', Auth::user()->account_id)
            ->where('orderstatus', 1)
            ->get();

        $pageTitle = "for Release Masterlist";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
      
        return view('order.release', compact('orders'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);
    }

    public function done(Request $request){
        
        $orderid = (isset($request->id)?$this->aes->decrypt($request->id, Auth::user()->secretkey):"");

        if (empty($orderid))
            return response()->json(['Error' => 1, 'Message' => "Invalid Order ID"]);

        $product = Order::where("id", $orderid)->first();

        if (empty($product))
            return response()->json(['Error' => 1, 'Message' => "Invalid Order"]);
        
        $data = [
            'PostID' => $product->PostID,
            'BuyerID' => $product->BuyerID,
            'SellerID' => Auth::user()->account_id,
            'qty' => $product->qty,
            'Amount' => $product->Amount,
            'created_at' => Carbon::now()
        ];

        $save = FinalOrder::insert($data);

        if ($save){
            Order::where("id", $orderid)->delete();
            $this->log->save([
                'headertitle' => 'Order Finalize',
                'description' => "An order has been marked as finalized",
                'orderid' => $product->PostID,
                'to' => Auth::user()->account_id
            ]);
            return response()->json(['Error' => 0]);
        }
        return response()->json(['Error' => 1, 'Message' => "Invalid operation"]);
    }

    public function confirm(Request $request){

        $id = (isset($request->id)?$this->aes->decrypt($request->id, Auth::user()->secretkey):"");

        if (empty($id))
            return response()->json(['Error' => 1, 'Message' => "Invalid ID"]);

        $data = ['orderstatus' => 1, 'confirmdate' => date('Y-m-d')];

        $ex = Order::find($id);

        if (empty($ex))
            return response()->json(['Error' => 1, 'Message' => "Invalid Order"]);

        if ($ex->update($data)){
            $this->log->save([
                'headertitle' => 'Order Confirmation',
                'description' => "Your order has confirmed",
                'orderid' => $id,
                'to' => $ex->BuyerID
            ]);

            return response()->json(['Error' => 0, 'Message' => "ok Order"]);
        }
    }

    public function cancel(Request $request){

        // dd($request->all());
        $hidReason = (isset($request->hidReason)?$request->hidReason:"");
        $hidID = (isset($request->hidID)?$this->aes->decrypt($request->hidID, Auth::user()->secretkey):"");
        $customreason = (isset($request->customreason)?$request->customreason:"");

        if (empty($hidID))
            return response()->json(['Error' => 1, 'Message' => "Invalid ID"]);

        if ($hidReason == 1){
            if (empty($customreason))
                return response()->json(['Error' => 1, 'Message' => "Please enter reason"]);
        }

        if (empty($hidReason))
            return response()->json(['Error' => 1, 'Message' => "Please enter reason"]);

        $ex = Order::find($hidID);

        if (empty($ex))
            return response()->json(['Error' => 1, 'Message' => "Invalid Order"]);

        $data = [
            'PostID'
        ];  
        
        if ($ex->delete()){

            //save in cancel table
            $data = [
                'PostID' => $ex->PostID,
                'BuyerID' => $ex->BuyerID,
                'SellerID' => $ex->SellerID,
                'qty' => $ex->qty,
                'Amount' => $ex->Amount,
                'notes' => ($hidReason == 1?$customreason:$hidReason),
                'userrole' => 'seller'
            ];

            $saveCancel = Cancel::insert($data);
            

            //add qty to posted product

            $getPost = PostProduct::find($ex->PostID);
            if (!empty($getPost)){
                $data = ['Stocks' => ($getPost->Stocks + $ex->qty)];
                $getPost->update($data);
            }

            $this->log->save([
                'headertitle' => 'Cancel Order',
                'description' => "You cancelled your order",
                'orderid' => $hidID,
                'to' => $ex->BuyerID,
            ]);

            return response()->json(['Error' => 0]);

        }
    }

    public function cancelseller(Request $request){

        // dd($request->all());
        $hidReason = (isset($request->hidReason)?$request->hidReason:"");
        $hidID = (isset($request->hidID)?$this->aes->decrypt($request->hidID, Auth::user()->secretkey):"");
        $customreason = (isset($request->customreason)?$request->customreason:"");

        if (empty($hidID))
            return response()->json(['Error' => 1, 'Message' => "Invalid ID"]);

        if ($hidReason == 1){
            if (empty($customreason))
                return response()->json(['Error' => 1, 'Message' => "Please enter reason"]);
        }

        if (empty($hidReason))
            return response()->json(['Error' => 1, 'Message' => "Please enter reason"]);

        $ex = Order::find($hidID);

        if (empty($ex))
            return response()->json(['Error' => 1, 'Message' => "Invalid Order"]);
        
        if ($ex->delete()){

            //save in cancel table
            $data = [
                'PostID' => $ex->PostID,
                'BuyerID' => $ex->BuyerID,
                'SellerID' => $ex->SellerID,
                'qty' => $ex->qty,
                'Amount' => $ex->Amount,
                'notes' => ($hidReason == 1?$customreason:$hidReason),
                'userrole' => 'buyer'
            ];

            $saveCancel = Cancel::insert($data);
            

            //add qty to posted product

            $getPost = PostProduct::find($ex->PostID);
            if (!empty($getPost)){
                $data = ['Stocks' => ($getPost->Stocks + $ex->qty)];
                $getPost->update($data);
            }

            $this->log->save([
                'headertitle' => 'Cancel Order',
                'description' => "Your order was cancelled by the seller",
                'orderid' => $hidID,
                'to' => $ex->BuyerID,
            ]);

            $this->log->save([
                'headertitle' => 'Cancel Order',
                'description' => "You cancelled the buyer's order",
                'orderid' => $hidID,
                'to' => $ex->SellerID
            ]);

            return response()->json(['Error' => 0]);

        }
    }

    public function forreview(){

        $lists = FinalOrder::where('BuyerID', Auth::user()->account_id)
            ->whereNull("RatingID")
            ->get();

        $pageTitle = "Write a review";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
    
        return view('order.review', compact('lists'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);
    }

    public function proreview(Request $request){
        // dd($request->all());
        $rate = (isset($request->rate)?$request->rate:"");
        $hidID = (isset($request->hidID)?$this->aes->decrypt($request->hidID, Auth::user()->secretkey):"");
        $customcomment = (isset($request->customcomment)?$request->customcomment:"");

        if (empty($hidID))
            return response()->json(['Error' => 1, 'Message' => "Invalid ID"]);

        if (empty($rate))
            return response()->json(['Error' => 1, 'Message' => "Please rate the product"]);

        $ex = FinalOrder::find($hidID);

        if (empty($ex))
            return response()->json(['Error' => 1, 'Message' => "Invalid product to review"]);
        
        $data = [
            'PostID' => $ex->PostID,
            'SellerID' => $ex->SellerID,
            'BuyerID' => $ex->BuyerID,
            'comments' => $customcomment,
            'star_rating' => $rate //'created_at' => Carbon::now()
        ];

        $saveRating = Rating::create($data);

        if ($saveRating){

            $updateFinalORder = [
                'RatingID' => $saveRating->id
            ];
            $ex->update($updateFinalORder);

            $this->log->save([
                'headertitle' => 'Product Reviewed',
                'description' => "You have reviewed the product",
                'orderid' => $hidID,
                'to' => $ex->BuyerID,
            ]);
    
            return response()->json(['Error' => 0]);
        }
        return response()->json(['Error' => 1, 'Message' => "Unknown Error"]);
        
    }
}

?>