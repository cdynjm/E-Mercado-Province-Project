<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AESCipher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Cancel;

class CancelController extends Controller
{

    protected $aes;

    public function __construct(){

        $this->aes = new AESCipher();
    }

    public function buyer(){
        // $cartsgrp = Cancel::select('SellerID')
        //     ->where("BuyerID", Auth::user()->account_id)
        //     ->groupBy('SellerID')
        //     ->get();

        $carts = Cancel::where('BuyerID', Auth::user()->account_id)->latest()->get();
        $pageTitle = "My Cancellations";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
      

        return view('cancel.buyer', compact('carts'), [
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction,
        ]);
    }
}
