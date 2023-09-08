<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AESCipher;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\CartController;

use App\Http\Controllers\GlobalList;
use App\Models\Buyer;
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
use App\Models\PostProduct;


class GuestController extends Controller
{

    protected $globalList;
    protected $aes;

    public function __construct(){
        $this->globalList = new GlobalList();
        $this->aes = new AESCipher();
    }

    public function seller(Request $request)
    {
        $aids = Aid::orderBy("AidName", "ASC")->get();
        $beneficiaries = Beneficiary::orderBy("Description", "ASC")->get();
        $farmTypes = FarmType::orderby("description", "ASC")->get();
        $Municipalties = $this->globalList->Municipalities(864);
        $Barangays = [];
        if (!empty(old('Municipality'))){
            $Barangays = $this->globalList->Barangays($this->aes->decrypt(old('Municipality')));
        }

        $BarangayFarms = [];
        if (!empty(old('farm_municipal'))){
            $BarangayFarms = $this->globalList->Barangays($this->aes->decrypt(old('farm_municipal')));
        }

        return view('guest.seller', compact('Municipalties','farmTypes','aids','Barangays','BarangayFarms','beneficiaries'));
    }

    public function buyer(Request $request)
    {
        $Provinces = $this->globalList->Provinces();
        return view('guest.buyer', compact('Provinces'));
    }
    
    // public function storeseller(Request $request) //back up
    // {

    //     foreach(User::where(['username' => $request->username])->get() as $verify) {
    //         if($verify->username == $request->username) {
    //             $error = 'Username is already taken.';
    //             return redirect()->route('seller.signup')->withErrors(['errors' => $error])->withInput($request->all());
    //         }
    //     }

    //     // dd($request->all());
    //     $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'birth_date' => 'required|date|before:10 years ago',
    //         'gender' => 'required|string|max:6',
    //         'civil_status' => 'required|string|max:15',
    //         'education' => 'required|string|max:20',
    //         'Municipality' => 'required|string|max:255',
    //         'Barangay' => 'required|string|max:255',
    //         'street' => 'string|max:255',
    //         'ZipCode' => 'required|string|max:4',
    //         'username' => 'required|string|max:255',
    //         'contact_number' => 'required|numeric',
    //         'password' => 'required|string|max:255',
    //         'password_confirmation' => 'required|string|max:255',
    //         'idnumber' => 'required|string|max:255',
    //         'farm_name' => 'required|string|max:255',
    //         'farm_municipal' => 'required|string|max:255',
    //         'farm_barangay' => 'required|string|max:255',
    //         'farm_size' => 'required|string|max:255',
    //         'program_beneficiary' => 'required|string|max:255',
    //     ]);
    //     // 

    //     $Municipality = (isset($request->Municipality)?$this->aes->decrypt($request->Municipality):"");
    //     $Barangay = (isset($request->Barangay)?$this->aes->decrypt($request->Barangay):"");
    //     $farm_municipal = (isset($request->farm_municipal)?$this->aes->decrypt($request->farm_municipal):"");
    //     $farm_barangay = (isset($request->farm_barangay)?$this->aes->decrypt($request->farm_barangay):"");
    //     $specify_beneficiary = (isset($request->beneficiary)?$this->aes->decrypt($request->beneficiary):"");
        
    //     $msg = "";

    //     if (strlen($request->password) < 8){
    //         $msg .= "Password must be 8 characters or more." .", ";
    //     }

    //     if (strlen($request->contact_number) != 11){
    //         $msg .= "Contact number must be 11 digit." .", ";
    //     }

    //     if (substr($request->contact_number, 0,2) != "09"){
    //         $msg .= "Contact number must start with 09" .", ";
    //     }

    //     if (!$request->hasFile('valid_ID')) {
    //         $msg .= "Please select a valid ID" .", ";
    //     }
        
    //     if (!$request->hasFile('profile_photo')) {
    //         $msg .= "Please select a valid profile photo" .", ";
    //     }

    //     if (empty($Municipality)){
    //         $msg .= "Please select Municipality" .", ";
    //     }

    //     if (empty($Barangay)){
    //         $msg .= "Please select Barangay" .", ";
    //     }

    //     if ($request->password != $request->password_confirmation){
    //         $msg .= "Passwords did not matched" .", ";
    //     }

    //     if (empty($farm_municipal)){
    //         $msg .= "Please select your farm municipality" .", ";
    //     }

    //     if (empty($farm_barangay)){
    //         $msg .= "Please select your farm barangay" .", ";
    //     }


    //     if (!isset($request->FarmType)){
    //         $msg .= "Please select type of farm" .", ";
    //     }   

    //     if (isset($request->FarmType)){
    //         $naa = false;
    //         foreach($request->FarmType as $ftype){
    //             $id = $this->aes->decrypt($ftype);
    //             $exTypeSubs = FarmTypeSub::where("farmtypeid", $id)->get();
    //             foreach($exTypeSubs as $sub){
    //                 $name = \Str::slug($sub->description);
    //                 if (isset($request->$name)){
    //                     $naa = true;
    //                     $gross = $name."-harvest_gross";
    //                     $net = $name."-harvest_net";
    //                     // dd($request->$gross);
    //                     if (empty($request->$gross)){
    //                         $msg .= "Please select estimated yield per havest (gross) of product " .$sub->description .", ";
    //                     }
    //                     if (empty($request->$net)){
    //                         $msg .= "Please select estimated yield per havest (net) of product " .$sub->description .", ";
    //                     }
                        
    //                 }
    //             }
                
    //         }

    //         if (!$naa){
    //             $msg .= "Please select product(s) of selected farm type" .", ";
    //         }
    //     }

    //     if (strtolower($request->program_beneficiary) == "yes"){

    //         if (empty($specify_beneficiary)){
    //             $msg .= "Please select Program Beneficiary" .", ";
    //         }

    //         if (!isset($request->aidreceived)){
    //             $msg .= "Please select at least one aid received" .", ";
    //         }
    //     }
        
    //     // dd($msg);
    //     if (!empty($msg)){
    //         return redirect()->route('seller.signup')->withErrors(['errors' => $msg])->withInput($request->all());
    //     }

    //     $datetime = date('Ymd-His');

    //     $validIDName = \Str::slug($request->username.'-'.$datetime).'.'.$request->valid_ID->extension();  
    //     $profilepictureName = \Str::slug($request->username.'-'.$datetime).'.'.$request->profile_photo->extension(); 

    //     $transferid = $request->file('valid_ID')->storeAs('public/images/client/id', $validIDName);
    //     $transferphoto = $request->file('profile_photo')->storeAs('public/images/client/photo', $profilepictureName);

    //     $saveseller = Seller::create([
    //         'last_name' => $request->last_name,
    //         'first_name' => $request->first_name,
    //         'middle_name' => $request->middle_name,
    //         'birthdate' => $request->birth_date,
    //         'gender' => $request->gender,
    //         'civil_status' => $request->civil_status,
    //         'contact_number' => $request->contact_number,
    //         'education' => $request->education,
    //         'province' => 864,
    //         'municipality' => $Municipality,
    //         'barangay' => $Barangay,
    //         'street' => $request->street,
    //         'zipcode' => $request->ZipCode,
    //         'idnumber' => $request->idnumber,
    //         'idphoto' => $validIDName,
    //         'profile_picture' => $profilepictureName,
    //         'status' => 0
    //     ]);

    //     Farm::create([
    //         'seller_id' => $saveseller->id,
    //         'farm_province' => 864,
    //         'farm_municipality' => $farm_municipal,
    //         'farm_barangay' => $farm_barangay,
    //         'farm_size' => $request->farm_size,
    //         'beneficiary' => $request->program_beneficiary,
    //         'aid_received' => '',
    //         'beneficiary_specify' => $specify_beneficiary,
    //     ]);

    //     foreach($request->FarmType as $ftype){
    //         $id = $this->aes->decrypt($ftype);
    //         $exTypeSubs = FarmTypeSub::where("farmtypeid", $id)->get();
    //         foreach($exTypeSubs as $sub){
    //             $name = \Str::slug($sub->description);
    //             $gross = $name."-harvest_gross";
    //             $net = $name."-harvest_net";
    //             if (isset($request->$name)){
    //                 Farmer_farmtype::create([
    //                     'seller_id' => $saveseller->id,
    //                     'farmid' => $id,
    //                     'farmsubid' => $sub->id,
    //                     'grossyield' => $request->$gross,
    //                     'netyield' => $request->$net,
    //                 ]);
    //             }
    //         }
    //     }

    //     if (isset($request->aidreceived)){
    //         foreach($request->aidreceived as $key => $value) {
    //             $id = $this->aes->decrypt($value);
    //             Aid_received::create([
    //                 'seller_id' => $saveseller->id,
    //                 'aid_id' => $id,
    //             ]);
    //         }
    //     }   

    //     Auth::login($user = User::create([
    //         'account_id' => $saveseller->id,
    //         'username' => $request->username,
    //         'user_type' => "seller",
    //         'email' => null,
    //         'password' => Hash::make($request->password),
    //         'secretkey' => \Str::random(16),
    //         'name' => $request->farm_name,
    //         'profile' => $profilepictureName
    //     ]));

    //     event(new Registered($user));

    //     return redirect(RouteServiceProvider::HOME);

    // }

    public function storeseller(Request $request)
    {

        foreach(User::where(['username' => $request->username])->get() as $verify) {
            if($verify->username == $request->username) {
                $error = 'Username is already taken.';
                return redirect()->route('seller.signup')->withErrors(['errors' => $error])->withInput($request->all());
            }
        }

        // dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before:10 years ago',
            'gender' => 'required|string|max:6',
            'civil_status' => 'required|string|max:15',
            'education' => 'required|string|max:20',
            'Municipality' => 'required|string|max:255',
            'Barangay' => 'required|string|max:255',
            'street' => 'string|max:255',
            'ZipCode' => 'required|string|max:4',
            'username' => 'required|string|max:255',
            'contact_number' => 'required|numeric',
            'password' => 'required|string|max:255',
            'password_confirmation' => 'required|string|max:255',
            'idnumber' => 'required|string|max:255',
        ]);
        // 

        $Municipality = (isset($request->Municipality)?$this->aes->decrypt($request->Municipality):"");
        $Barangay = (isset($request->Barangay)?$this->aes->decrypt($request->Barangay):"");
        $farm_municipal = (isset($request->farm_municipal)?$this->aes->decrypt($request->farm_municipal):"");
        $farm_barangay = (isset($request->farm_barangay)?$this->aes->decrypt($request->farm_barangay):"");
        
        $msg = "";

        if (strlen($request->password) < 8){
            $msg .= "Password must be 8 characters or more." .", ";
        }

        if (strlen($request->contact_number) != 11){
            $msg .= "Contact number must be 11 digit." .", ";
        }

        if (substr($request->contact_number, 0,2) != "09"){
            $msg .= "Contact number must start with 09" .", ";
        }

        if (!$request->hasFile('valid_ID')) {
            $msg .= "Please select a valid ID" .", ";
        }
        
        if (!$request->hasFile('profile_photo')) {
            $msg .= "Please select a valid profile photo" .", ";
        }

        if (empty($Municipality)){
            $msg .= "Please select Municipality" .", ";
        }

        if (empty($Barangay)){
            $msg .= "Please select Barangay" .", ";
        }

        if ($request->password != $request->password_confirmation){
            $msg .= "Passwords did not matched" .", ";
        }
        
        // dd($msg);
        if (!empty($msg)){
            return redirect()->route('seller.signup')->withErrors(['errors' => $msg])->withInput($request->all());
        }

        $datetime = date('Ymd-His');

        $validIDName = \Str::slug($request->username.'-'.$datetime).'.'.$request->valid_ID->extension();  
        $profilepictureName = \Str::slug($request->username.'-'.$datetime).'.'.$request->profile_photo->extension(); 

        $transferid = $request->file('valid_ID')->storeAs('public/images/client/id', $validIDName);
        $transferphoto = $request->file('profile_photo')->storeAs('public/images/client/photo', $profilepictureName);

        $saveseller = Seller::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'birthdate' => $request->birth_date,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'contact_number' => $request->contact_number,
            'education' => $request->education,
            'province' => 864,
            'municipality' => $Municipality,
            'barangay' => $Barangay,
            'street' => $request->street,
            'zipcode' => $request->ZipCode,
            'idnumber' => $request->idnumber,
            'idphoto' => $validIDName,
            'profile_picture' => $profilepictureName,
            'status' => 0
        ]);

        Auth::login($user = User::create([
            'account_id' => $saveseller->id,
            'username' => $request->username,
            'user_type' => "seller",
            'email' => null,
            'password' => Hash::make($request->password),
            'secretkey' => \Str::random(16),
            'name' => $request->farm_name,
            'profile' => $profilepictureName
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);

    }

    public function storebuyer(Request $request) {

        foreach(User::where(['username' => $request->username])->get() as $verify) {
            if($verify->username == $request->username) {
                $error = 'Username is already taken.';
                return redirect()->route('buyer.signup')->withErrors(['errors' => $error])->withInput($request->all());
            }
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before:10 years ago',
            'gender' => 'required|string|max:6',
            'Province' => 'required|string|max:255',
            'Municipality' => 'required|string|max:255',
            'Barangay' => 'required|string|max:255',
            'street' => 'string|max:255',
            'ZipCode' => 'required|string|max:4',
            'username' => 'required|string|max:255',
            'contact_number' => 'required|numeric',
            'password' => 'required|string|max:255',
            'password_confirmation' => 'required|string|max:255',

        ]);

        $Province = (isset($request->Province)?$this->aes->decrypt($request->Province):"");
        $Municipality = (isset($request->Municipality)?$this->aes->decrypt($request->Municipality):"");
        $Barangay = (isset($request->Barangay)?$this->aes->decrypt($request->Barangay):"");

        $msg = "";

        if (strlen($request->password) < 8){
            $msg .= "Password must be 8 characters or more." .", ";
        }

        if (strlen($request->contact_number) != 11){
            $msg .= "Contact number must be 11 digit." .", ";
        }

        if (substr($request->contact_number, 0,2) != "09"){
            $msg .= "Contact number must start with 09" .", ";
        }

        if (empty($Province)){
            $msg .= "Please select Province" .", ";
        }

        if (empty($Municipality)){
            $msg .= "Please select Municipality" .", ";
        }

        if (empty($Barangay)){
            $msg .= "Please select Barangay" .", ";
        }

        if (isset($request->username)){
            foreach(User::where(['username' => $request->username])->get() as $verify) {
                if($verify->username == $request->username)
                $msg .= "Username is already taken" .", ";
            }
        }

        if ($request->password != $request->password_confirmation){
            $msg .= "Passwords did not matched" .", ";
        }
 
        $datetime = date('Ymd-His');

        $profilepictureName = \Str::slug($request->username.'-'.$datetime).'.'.$request->profile_photo->extension(); 
        $transferphoto = $request->file('profile_photo')->storeAs('public/images/client/photo', $profilepictureName);

        $savebuyer = Buyer::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'contact_number' => $request->contact_number,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'province' => $Province,
            'municipality' => $Municipality,
            'barangay' => $Barangay,
            'street' => $request->street,
            'zipcode' => $request->ZipCode,
            'profile_picture' => $profilepictureName
        ]);

        Auth::login($user = User::create([
            'account_id' => $savebuyer->id,
            'username' => $request->username,
            'user_type' => "buyer",
            'email' => null,
            'password' => Hash::make($request->password),
            'secretkey' => \Str::random(16),
            'name' => $request->farm_name,
            'profile' => $profilepictureName
        ]));


        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);

    }

    public function view(Request $request){

        $cart = new CartController();
        $ctr = $cart->badge();

        $posted = PostProduct::where("slug_name", $request->id)->first();

        if (empty($posted)){
            return redirect()->route('errors.error404');
        }

        $pages = $posted->ratings()
            ->latest()
            ->paginate(15);
        $categories = FarmType::orderBy("description", 'ASC')->get();
        return view('guest.one', compact('categories','posted'),[
            'Badge' => $ctr,
            'pages' => $pages
        ]);
    }

    public function faq(){
        
        $pageTitle = "FREQUENTLY ASKED QUESTIONS";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
        return view('guest.faq',[
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction
        ]);
    }

    public function privacy(){
        
        $pageTitle = "PRIVACY STATEMENT";
        $headerAction = '<a href="/" class="btn btn-sm btn-primary" role="button">Home</a>';
        return view('guest.privacy',[
            'pageTitle' => $pageTitle,
            'headerAction' => $headerAction
        ]);
    }

}
