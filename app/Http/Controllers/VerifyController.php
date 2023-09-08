<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AESCipher;
use App\Http\Controllers\GlobalList;
use App\Models\User;
use App\Models\Seller;
use App\Models\FarmCoordinates;

class VerifyController extends Controller
{
    public function __construct(){
        $this->globalList = new GlobalList();
        $this->aes = new AESCipher();
    }

    public function verifyusername(Request $request) {

        if (strlen($request->username) >= 5){
            foreach(User::where(['username' => $request->username])->get() as $verify) {
                if($verify->username == $request->username)
                    return "Username is already taken.";
            }
        }
        else {
            return "Username must be at least 5 characters long.";
        }
    }

    public function verifypassword(Request $request) {

        if (strlen($request->password) < 8){
            return "Password must be at least 8 characters long.";
        }
    }

    public function approveseller(Request $request) {

        $sellerid = (isset($request->sellerid)?$this->aes->decrypt($request->sellerid):"");

       if(is_numeric($request->longitude) && is_numeric($request->latitude)) {

            FarmCoordinates::create([
                'seller_id' => $sellerid,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude
            ]);

            Seller::where(['id' => $sellerid])
            ->update(['status' => 1, 'verified_by' => Auth::user()->userProfile->first_name.' '.Auth::user()->userProfile->last_name]);

            $request->session()->flash('success', 'Account Verified Successfully');
        }

        else 
        {
            $request->session()->flash('error', 'Please input a valid coordinate');
        }

        return redirect()->route('pending.sellers');

    }
}
