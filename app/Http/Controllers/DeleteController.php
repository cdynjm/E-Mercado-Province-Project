<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AESCipher;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

use App\Http\Controllers\GlobalList;
use App\Models\FarmType;
use App\Models\Buyer;
use App\Models\FarmTypeSub;
use App\Models\Aid;
use App\Models\Seller;
use App\Models\Farm;
use App\Models\User;
use App\Models\Admin;
use App\Models\Farmer_farmtype;
use App\Models\Aid_received;
use App\Models\FarmCoordinates;
use App\Models\Beneficiary;

class DeleteController extends Controller
{
    protected $globalList;
    protected $aes;

    public function __construct(){
        $this->globalList = new GlobalList();
        $this->aes = new AESCipher();
    }

    public function deleteadmin(Request $request) {

        $deleteid = (isset($request->deleteid)?$this->aes->decrypt($request->deleteid):"");

        foreach(User::where('account_id', Auth::user()->account_id)->get() as $verify) {
            if(Hash::check($request->deletepassword, $verify->password)) {
                break;
            }
            else {
                return 0;
            }
        }

        Admin::where(['id' => $deleteid])->delete();
        User::where(['account_id' => $deleteid])->delete();

        return 1;

    }

    public function deletefarm(Request $request) {

        FarmType::where(['id' => $request->deleteid])->delete();

        FarmTypeSub::where(['farmtypeid' => $request->deleteid])->delete();

        return 1;

    }

    public function deleteproduct(Request $request) {

        FarmTypeSub::where(['id' => $request->deleteid])->delete();

        return 1;

    }

    public function deleteaid(Request $request) {

        Aid::where(['id' => $request->deleteid])->delete();

        return 1;

    }
    
     public function deleteprogram(Request $request) {

        Beneficiary::where(['id' => $request->deleteid])->delete();

        return 1;

    }

    public function deletebuyer(Request $request) {

        $deleteid = (isset($request->deleteid)?$this->aes->decrypt($request->deleteid):"");

        foreach(User::where('account_id', Auth::user()->account_id)->get() as $verify) {
            if(Hash::check($request->deletepassword, $verify->password)) {
                break;
            }
            else {
                return 0;
            }
        }

        Buyer::where(['id' => $deleteid])->delete();
        User::where(['account_id' => $deleteid])->delete();

        return 1;

    }

    public function deleteseller(Request $request) {

        $deleteid = (isset($request->deleteid)?$this->aes->decrypt($request->deleteid):"");

        foreach(User::where('account_id', Auth::user()->account_id)->get() as $verify) {
            if(Hash::check($request->deletepassword, $verify->password)) {
                break;
            }
            else {
                return 0;
            }
        }

        Seller::where(['id' => $deleteid])->delete();
        User::where(['account_id' => $deleteid])->delete();
        Aid_received::where(['seller_id' => $deleteid])->delete();
        Farmer_farmtype::where(['seller_id' => $deleteid])->delete();
        Farm::where(['seller_id' => $deleteid])->delete();
        FarmCoordinates::where(['seller_id' => $deleteid])->delete();

        return 1;

    }
}
