<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AESCipher;
use Illuminate\Support\Carbon;

use App\Models\FarmType;
use App\Models\FarmTypeSub;
use App\Models\UOM;
use App\Models\PostProduct;
use App\Models\SellerImage;
use App\Models\Cart;

class BuyerController extends Controller
{

    protected $globalList;
    protected $aes;

    public function __construct(){
        $this->globalList = new GlobalList();
        $this->aes = new AESCipher();
    }

    public function index(){

    }

    // wala pa ni diri na edit
    public function create(Request $request)
    {
     
        $pageTitle = "Post New Product";
        $headerAction = '<a href="'.route('post.index').'" class="btn btn-sm btn-primary" role="button">Back</a>';
        $buttonCaption = "Post New Product";
        $farmtypes = FarmType::orderBy('description','ASC')->get();
        $uoms = UOM::orderby("UnitName", "ASC")->get();

        $farmsub = [];
        if (!empty(old('ProductType'))){
            $farmsub = FarmTypeSub::where('farmtypeid', $this->aes->decrypt(old('ProductType')))->get();
        }

        return view('post.form', compact('farmtypes','uoms','farmsub'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
            'buttonCaption' => $buttonCaption,
            'form' => 'post'
        ]);

    }

    public function store(Request $request){

        $request->validate([
            'Title' => 'required|string|max:255',
            'ProductType' => 'required|string|max:255',
            'ProductTypeSub' => 'required|string',
            'Stocks' => 'required|numeric',
            'Amount' => 'required|numeric',
            'UOM' => 'required|string',
            'Description' => 'required|string'
        ]);

        $checkAvailable = (isset($request->switchstock)?$request->switchstock:0);
        $dateAvailable = $request->HarvestDate;
        if (empty($checkAvailable )){
            if (empty($dateAvailable)){
                return redirect()->route('post.create')->withErrors(['errors' => "Please set date of target harvest"])->withInput($request->all());
            }
        }

        $producttype = (isset($request->ProductType)?$this->aes->decrypt($request->ProductType):"");
        $productkind = (isset($request->ProductTypeSub)?$this->aes->decrypt($request->ProductTypeSub):"");
        $uom = (isset($request->UOM)?$this->aes->decrypt($request->UOM):"");

        $posts = PostProduct::insert([
            'SellerID' => Auth::user()->account_id,
            'Title' => $request->Title,
            'ProductType' => $producttype,
            'ProductKind' => $productkind,
            'Stocks' => $request->Stocks,
            'UOM' => $uom,
            'StockAvailable' => $checkAvailable,
            'AvailableDate' => ($checkAvailable == 1? null : $dateAvailable."-01"),
            'Description' => $request->Description,
            'Remarks' => $request->remarks,
            'draft' => 0,
            'Amount' => $request->Amount,
            'created_at' => Carbon::now(),
            'slug_name' => \Str::slug($request->Title)
        ]);

        if ($posts){
            return redirect()->route('post.drafts')->withSuccess("Product successfully saved in draft.");
        }

        return redirect()->route('post.create')->withErrors(['errors' => "Unable to save new product to post"])->withInput($request->all());
    }

    public function drafts(){
        
        $drafts = PostProduct::where("draft", 0)
            ->where('SellerID', Auth::user()->account_id)
            ->orderBy('created_at', 'DESC')->get();
        
        $pageTitle = "TO BE POSTED";
        $headerAction = '<a href="'.route('post.create').'" class="btn btn-sm btn-primary" role="button">Post New Product</a>';


        return view('post.drafts', compact('drafts'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);

    }
}
