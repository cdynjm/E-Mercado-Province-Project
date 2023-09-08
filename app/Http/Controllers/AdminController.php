<?php

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
use App\Models\FarmTypeSub;
use App\Models\Aid;
use App\Models\Seller;
use App\Models\Farm;
use App\Models\User;
use App\Models\Admin;
use App\Models\Farmer_farmtype;
use App\Models\Aid_received;
use App\Models\Beneficiary;

class AdminController extends Controller
{

    protected $globalList;
    protected $aes;

    public function __construct(){
        $this->globalList = new GlobalList();
        $this->aes = new AESCipher();
    }
    
    //CREATE - INSERT

    public function createadmin(Request $request) {
        
        $Municipality = (isset($request->Municipality)?$this->aes->decrypt($request->Municipality):"");
        $MunCode = (isset($request->muncode)?$this->aes->decrypt($request->muncode):"");
        // dd($request->all());
        if($Municipality == '' || $request->username == '' || $request->password == '' || $request->lastname == '' || $request->firstname == ''|| $request->profile_photo == '' || $request->password != $request->password_confirmation) 
        { 
            return response()->json(['Error' => 1, 'Message'=> 'Empty Field']); 
        
        }
       
           // foreach(Admin::where(['account_id' => $MunCode])->get() as $verify) { return 1; }

            foreach(User::where(['username' => $request->username])->get() as $verify) {
                return response()->json(['Error' => 1, 'Message'=> 'Username is already taken']);
            }

            $datetime = date('Ymd-His');

            $profilepictureName = \Str::slug($request->username.'-'.$datetime).'.'.$request->profile_photo->extension(); 

            $transferphoto = $request->file('profile_photo')->storeAs('public/images/client/photo', $profilepictureName);

            $saveadmin = Admin::create([
                'account_id' => 0,
                'municipal' => $Municipality,
                'province' => '864',
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'profile_picture' => $profilepictureName
            ]);

            User::create([
                'account_id' => $saveadmin->id,
                'username' => $request->username,
                'user_type' => "municipal",
                'email' => null,
                'password' => Hash::make($request->password),
                'secretkey' => \Str::random(16),
                'name' => null,
                'profile' => $profilepictureName,
                'name' => $saveadmin->first_name.' '.$saveadmin->last_name
            ]);

            return response()->json(['Error' => 0, 'Message'=> 'Account created successfully']); 

    }

    public function createfarm(Request $request) {

        if($request->farmdescription == '') 
        { 
            return 0; 
        }

        else {

            foreach(FarmType::where(['description' => $request->farmdescription])->get() as $verify) { return 1; }

            FarmType::create(['description' => $request->farmdescription]);

            return 2;

        }

    }

    public function createfarmproduct(Request $request) {

        $farmtype = (isset($request->farmtype)?$this->aes->decrypt($request->farmtype):"");

        if($request->productdescription == '') 
        { 
            return 0; 
        }

        else {

            foreach(FarmTypeSub::where(['description' => $request->productdescription])->get() as $verify) { return 1; }
        
            FarmTypeSub::create([
                'farmtypeid' => $farmtype,
                'description' => $request->productdescription
            ]);

            return 2;

        }

    }

    public function createaid(Request $request) {

        if($request->aiddescription == '') 
        { 
            return 0; 
        }
        else {

            foreach(Aid::where(['AidName' => $request->aiddescription])->get() as $verify) { return 1; }

            Aid::create(['AidName' => $request->aiddescription]);

            return 2;

        }

    }
    
     public function createprogram(Request $request) {

        if($request->program == '') 
        { 
            return 0; 
        }
        else {

            foreach(Beneficiary::where(['Description' => $request->program])->get() as $verify) { return 1; }

            Beneficiary::create(['Description' => $request->program, 'AddedBy' => Auth::user()->account_id]);

            return 2;

        }

    }



//UPDATE - MODIFY

    public function updateadmin(Request $request) {
        
        $Municipality = (isset($request->municipal)?$this->aes->decrypt($request->municipal):"");
        $MunCode = (isset($request->muncode)?$this->aes->decrypt($request->muncode):"");
        $updateid = (isset($request->updateid)?$this->aes->decrypt($request->updateid):"");

        if($Municipality == '' || $request->username == '' || $request->password == '' || $request->password == '' || $request->password_confirmation == '') 
        { 
            return 0; 
        
        }
        else {

            foreach(User::where(['account_id' => $updateid])->get() as $verify) {
                if(Hash::check($request->password, $verify->password)) {
                    break;
                }
                else {
                    return 1;
                }
            }
         
            User::where(['account_id' => $updateid])
            ->update([
                'account_id' => $MunCode,
                'username' => $request->username,
                'user_type' => "municipal",
                'email' => null,
                'password' => Hash::make($request->password_confirmation),
                'secretkey' => \Str::random(16),
            ]);

            Admin::where(['account_id' => $updateid])
            ->update([
                'account_id' => $MunCode,
                'municipal' => strtolower($Municipality),
                'province' => $request->province
            ]);

            return 2;

        }

    }

    public function updatefarm(Request $request) {

        if($request->farmdescription == '') 
        { 
            return 0; 
        }

        else {

            FarmType::where(['id' => $request->updateid])->update(['description' => $request->farmdescription]);

            return 2;

        }

    }

    public function updatefarmproduct(Request $request) {

        $farmtype = (isset($request->farmtype)?$this->aes->decrypt($request->farmtype):"");

        if($request->productdescription == '') 
        { 
            return 0; 
        }

        else {

            FarmTypeSub::where(['id' => $request->updateid])
            ->update([
                'farmtypeid' => $farmtype,
                'description' => $request->productdescription
            ]);
                
            return 2;

        }

    }

    public function updateaid(Request $request) {

        if($request->aiddescription == '') 
        { 
            return 0; 
        }
        else {

            Aid::where(['id' => $request->updateid])->update(['AidName' => $request->aiddescription]);

            return 2;

        }

    }
    
    public function updateprogram(Request $request) {

        if($request->program == '') 
        { 
            return 0; 
        }
        else {

            Beneficiary::where(['id' => $request->updateid])->update(['Description' => $request->program, 'AddedBy' => Auth::user()->account_id]);

            return 2;

        }

    }
}
