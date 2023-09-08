<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AESCipher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Cart;
use App\Models\PostProduct;

class CartController extends Controller
{

    protected $aes;

    public function __construct(){

        $this->aes = new AESCipher();
    }

    public function badge(){
        $ctr = 0;

        if (Auth::check()){
            $ctrTMP = Cart::select("PostID")
                ->where("BuyerID", Auth::user()->account_id)
                ->groupBy("PostID")
                ->get();
            
            $ctr = 0;
            if (!empty($ctrTMP)){
                $ctr = sizeof($ctrTMP);
            }
        }

        return $ctr;
    }

    public function add(Request $request){
        $postid = (isset($request->pid)?$this->aes->decrypt($request->pid, Auth::user()->secretkey):"");
        $sellerid = (isset($request->sid)?$this->aes->decrypt($request->sid, Auth::user()->secretkey):"");
        $qty = (isset($request->qty)?$request->qty:0);

        if (empty($postid))
            return response()->json(['Error' => 1, 'Message' => "Invalid Post ID"]);
        if (empty($sellerid))
            return response()->json(['Error' => 1, 'Message' => "Invalid Seller ID"]);
        if (empty($qty))
            return response()->json(['Error' => 1, 'Message' => "Invalid Quantity"]);

        $product = PostProduct::where("id", $postid)->first();

        if (empty($product))
            return response()->json(['Error' => 1, 'Message' => "Invalid Product"]);
        
        if ($qty > $product->Stocks)
            return response()->json(['Error' => 1, 'Message' => "Insufficient Quantity"]);

        $oldcart = Cart::where("PostID", $postid)
            ->where('BuyerID', Auth::user()->account_id)
            ->first();
        
        

        if (empty($oldcart)){
            $newQty = $qty;
        }else{
            $newQty = ($oldcart->qty + $qty);
            // dd($newQty);
            $oldcart->delete();
        }

        

        $data = [
            'PostID' => $postid,
            'BuyerID' => Auth::user()->account_id,
            'SellerID' => $sellerid,
            'qty' => $newQty,
            'Amount' => $product->Amount,
            'created_at' => Carbon::now()
        ];

        $save = Cart::insert($data);

        if ($save){
            PostProduct::where("id", $postid)->update(['Stocks' => ($product->Stocks-$qty)]);
            return response()->json(['Error' => 0]);
        }
        return response()->json(['Error' => 1, 'Message' => "Invalid operation"]);
    }

    public function view(){
        $cartsgrp = Cart::select('SellerID')
            ->where("BuyerID", Auth::user()->account_id)
            ->groupBy('SellerID')
            ->get();

        $carts = Cart::where('BuyerID', Auth::user()->account_id)->get();
        $pageTitle = "My Cart";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
      

        return view('cart.index', compact('cartsgrp','carts'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);
    }

    public function remove(Request $request){
        // dd($request->all());
       
        $id = (isset($request->id)?$this->aes->decrypt($request->id, Auth::user()->secretkey):"");
    
        if (empty($id))
            return response()->json(['Error' => 1, 'Message' => "Invalid ID"]);

        $ex = Cart::find($id);

        if (empty($ex))
            return response()->json(['Error' => 1, 'Message' => "Invalid Cart Item"]);
        
        if ($ex->delete()){

            //add qty to posted product

            $getPost = PostProduct::find($ex->PostID);
            if (!empty($getPost)){
                $data = ['Stocks' => ($getPost->Stocks + $ex->qty)];
                $getPost->update($data);
            }

            return response()->json(['Error' => 0]);

        }
    }
}
