<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AESCipher;
use App\Http\Controllers\GlobalList;
use App\Models\User;
use App\Models\Admin;
use App\Models\Refbrgy;
use App\Models\Seller;
use App\Models\Buyer;
use App\Models\FarmType;
use App\Models\FarmTypeSub;
use App\Models\Farmer_farmtype;
use App\Models\Aid;
use App\Models\Farm;
use App\Models\FarmCoordinates;
use App\Models\Aid_received;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\Beneficiary;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LogController;

use App\Models\PostProduct;
use App\Models\Order;
use App\Models\FinalOrder;
use App\Models\Rating;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function __construct(){
        $this->globalList = new GlobalList();
        $this->aes = new AESCipher();
    }

    public function index()
    {
        $assets = ['chart', 'animation'];
        $uType = Auth::user()->user_type;
        $cart = new CartController();
        $ctr = $cart->badge();

        $log = new LogController();

        if (strtolower($uType) == "provincial"){
            
            $totalusers = User::count();
            $totaladmins = User::where('user_type', 'municipal')->count();
            $totalverified = Seller::where('status', 1)->count();
            $totalpending = Seller::where('status', 0)->count();
            $totalbuyer = Buyer::count();
            $sellersbymunicipal = Municipality::where('provCode', '=', Auth::user()->userProfile->province)->get();
            $totalsellerspending = Seller::where('status', '=', 0)->get();
            $totalsellersverified = Seller::where('status', '=', 1)->get();
            $recentlyverified = Seller::where('status', 1)->limit(10)->orderby('updated_at', 'DESC')->get();

            return view('dashboards.admin', compact('assets', 'totalusers', 'totaladmins', 'totalverified', 'totalpending', 'totalbuyer', 'recentlyverified', 'sellersbymunicipal', 'totalsellerspending', 'totalsellersverified'));
        }
        elseif (strtolower($uType) == "municipal"){

            $totalusers = Buyer::count() + Seller::where('municipality', Auth::user()->account_id)->count();
            $totalverified = Seller::where('municipality', Auth::user()->userProfile->municipal)->where('status', 1)->count();
            $totalpending = Seller::where('municipality',  Auth::user()->userProfile->municipal)->where('status', 0)->count();
            $municipalityof = Admin::where('id', '=', Auth::user()->account_id)->get();
            $totalbuyer = Buyer::count();
            $sellersbybrgy = Barangay::where('citymunCode', '=', Auth::user()->userProfile->municipal)->get();
            $totalsellerspending = Seller::where('status', '=', 0)->get();
            $totalsellersverified = Seller::where('status', '=', 1)->get();
            $recentlyverified = Seller::where('status', 1)->where('municipality', Auth::user()->userProfile->municipal)->limit(10)->orderby('updated_at', 'DESC')->get();

            return view('dashboards.admin', compact('assets', 'totalusers', 'totalverified', 'totalpending', 'totalbuyer', 'sellersbybrgy', 'totalsellerspending', 'totalsellersverified', 'recentlyverified', 'municipalityof'));
        }
        elseif (strtolower($uType) == "seller"){

            $posts = PostProduct::select('draft', DB::raw('count(draft) as countPost'))
                ->where("SellerID", Auth::user()->account_id)
                ->groupBy("draft")
                ->get();

            $orders = Order::select('orderstatus', DB::raw('count(orderstatus) as countOrder'))
                ->where("SellerID", Auth::user()->account_id)
                ->groupBy("orderstatus")
                ->get();
                
            $top5 = FinalOrder::select('BuyerID', DB::raw('count(BuyerID) as countBuyer'))
                ->where("SellerID", Auth::user()->account_id)
                ->groupBy("BuyerID")
                ->orderBy('countBuyer', 'DESC')
                ->get();

            $gross = FinalOrder::select(DB::raw('(qty * Amount) as totalPaid'))
                    ->where("SellerID", Auth::user()->account_id)
                    ->where("created_at", 'LIKE', date('Y')."-%")
                    ->get();

            $oneyears = FinalOrder::select(DB::raw('(qty * Amount) as totalPaid'), DB::raw('MONTH(created_at) as month'))
                ->where("SellerID", Auth::user()->account_id)
                ->where("created_at", 'LIKE', date('Y')."-%")
                ->groupby('month','totalPaid')
                ->get();

            $rating = Rating::select(DB::raw('AVG(star_rating) as rating'))
            ->where("SellerID", Auth::user()->account_id)
            ->first();

            $months_val = [];
            for ($start = 1; $start <= 12; $start++){
                $val = 0;
                foreach($oneyears as $one){
                    if ($one->month == $start){
                        $val += $one->totalPaid;
                    }
                }

                array_push($months_val, $val);
            }

            return view('dashboards.seller', compact('assets','posts','orders','top5', 'gross','months_val'),[
                'logs' => $log->show(5),
                'rating' => $rating
            ]);

        }elseif (strtolower($uType) == "buyer"){

            $posteds = PostProduct::where("draft", 1)->orderBy('created_at', 'DESC')->paginate(10);

            return view('dashboards.buyer', compact('assets','posteds'),[
                'Badge' => $ctr,
                'logs' => $log->show(5)
            ]);

        }else{


        }
    }
    
    public function municipaladmins() {

        $Municipalties = $this->globalList->Municipalities(864);

        if(strtolower(Auth::user()->user_type) == 'provincial') {

            $municipaladmins = Admin::where('municipal', '!=', null)->orderby('municipal', 'ASC')->get();

            return view('dashboards.admin-pages.municipaladmins', compact('Municipalties', 'municipaladmins'));

        }
        else {

            return view('errors.error404');

        }
    }

    public function verifiedsellers() {

        if(strtolower(Auth::user()->user_type) == 'provincial') {

            $verifiedsellers = Seller::where(['status' => 1])->orderby('last_name', 'ASC')->get();

            return view('dashboards.admin-pages.verifiedsellers', compact('verifiedsellers'));

        }

        if(strtolower(Auth::user()->user_type) == 'municipal') {

            $verifiedsellers = Seller::where(['status' => 1])->where('municipality', Auth::user()->userProfile->municipal)->orderby('last_name', 'ASC')->get();

            return view('dashboards.admin-pages.verifiedsellers', compact('verifiedsellers'));

        }
        

    }

    public function pendingsellers() {

        if(strtolower(Auth::user()->user_type) == 'provincial') {

            $pendingsellers = Seller::where(['status' => 0])->orderby('last_name', 'ASC')->get();

            return view('dashboards.admin-pages.pendingsellers', compact('pendingsellers'));

        }

        if(strtolower(Auth::user()->user_type) == 'municipal') {

            $pendingsellers = Seller::where(['status' => 0])->where('municipality', Auth::user()->userProfile->municipal)->orderby('last_name', 'ASC')->get();

            return view('dashboards.admin-pages.pendingsellers', compact('pendingsellers'));

        }

    }

    public function buyers() {

        if(strtolower(Auth::user()->user_type) == 'provincial' || strtolower(Auth::user()->user_type) == 'municipal') {

            $buyers = Buyer::orderby('last_name', 'ASC')->get();

            return view('dashboards.admin-pages.buyers', compact('buyers'));

        }

    }

    public function farmtype() {

        if(strtolower(Auth::user()->user_type) == 'municipal' || strtolower(Auth::user()->user_type) == 'provincial') {

            $farmtypes = FarmType::orderby('description', 'ASC')->get();

            return view('dashboards.admin-pages.farmtype', compact('farmtypes'));

        }

    }

    public function farmproduct() {

        if(strtolower(Auth::user()->user_type) == 'municipal' || strtolower(Auth::user()->user_type) == 'provincial') {

            $farmproduct = FarmTypeSub::orderby('description', 'ASC')->get();

            $farmtypes = FarmType::orderby('description', 'ASC')->get();

            return view('dashboards.admin-pages.farmproduct', compact('farmproduct', 'farmtypes'));

        }

    }

    public function farmaid() {

        if(strtolower(Auth::user()->user_type) == 'municipal' || strtolower(Auth::user()->user_type) == 'provincial') {

            $farmaid = Aid::orderby('AidName', 'ASC')->get();

            return view('dashboards.admin-pages.farmaid', compact('farmaid'));

        }
    }
    public function programs() {

        if(strtolower(Auth::user()->user_type) == 'municipal' || strtolower(Auth::user()->user_type) == 'provincial') {

            $program = Beneficiary::orderby('Description', 'ASC')->get();

            return view('dashboards.admin-pages.programs', compact('program'));

        }
    }

    public function pendingseller(Request $request) {

        $seller_id = (isset($request->seller_id)?$this->aes->decrypt($request->seller_id):"");

        $sellerinfo = Seller::where(['id' => $seller_id])->get();

        $sellerfarm = Farm::where(['seller_id' => $seller_id])->get();
       
        $sellerfarmtype = Farmer_farmtype::where(['seller_id' => $seller_id])->get();

        $selleraid = Aid_received::where(['seller_id' => $seller_id])->get();

        return view('dashboards.admin-pages.pending-seller', compact('sellerinfo', 'sellerfarm', 'sellerfarmtype', 'selleraid'));

    }

    public function viewseller(Request $request) {

        $seller_id = (isset($request->seller_id)?$this->aes->decrypt($request->seller_id):"");

        $sellerinfo = Seller::where(['id' => $seller_id])->get();

        $sellerfarm = Farm::where(['seller_id' => $seller_id])->get();
       
        $sellerfarmtype = Farmer_farmtype::where(['seller_id' => $seller_id])->get();

        $selleraid = Aid_received::where(['seller_id' => $seller_id])->get();

        $sellercoordinates = FarmCoordinates::where(['seller_id' => $seller_id])->get();

        return view('dashboards.admin-pages.view-seller', compact('sellerinfo', 'sellerfarm', 'sellerfarmtype', 'selleraid', 'sellercoordinates'));

    }

    public function viewbuyer(Request $request) {

        $buyer_id = (isset($request->buyer_id)?$this->aes->decrypt($request->buyer_id):"");        

        $buyerinfo = Buyer::where(['id' => $buyer_id])->get();

        return view('dashboards.admin-pages.view-buyer', compact('buyerinfo'));

    }


     /*
     * uisheet Page Routs
     */
    public function guest(Request $request)
    {
        $cart = new CartController();
        $ctr = $cart->badge();
        $posteds = PostProduct::where("draft", 1)->orderBy('created_at', 'DESC')->paginate(15);
        $categories = FarmType::orderBy("description", 'ASC')->get();
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr
        ]);
    }

 
    public function signin(Request $request)
    {
        return view('auth.login');
    }


    public function provincial(Request $request)
    {
        return view('auth.superadmin');
    }



    public function error404(Request $request)
    {
        return view('errors.error404');
    }

}
