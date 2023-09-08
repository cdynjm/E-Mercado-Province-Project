<?php
   use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    
?>

<x-guest-layout>
    <section class="login-content">
       <div class="row m-0 align-items-center bg-lavender vh-100">            
          
          <div class="col-md-12 mt-4 mb-4">           
             <div class="row justify-content-center">
                <div class="col-md-10">
                   <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                      <div class="card-body">
                         <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center mb-3">
                           <img src="{{asset('e-mercado-logo.png')}}" style="width: 50px; height: 40px;" alt="">
                            <h4 class="logo-title ms-3">{{env('APP_NAME')}}</h4>
                         </a>
                         <h2 class="mb-2 text-center">Seller Registration Form</h2>
                         <p class="text-center">Create your {{env('APP_NAME')}} account.</p>
                         <x-auth-session-status class="mb-4" :status="session('status')" />
 
                         <!-- Validation Errors -->
                         <x-auth-validation-errors class="mb-4" :errors="$errors" />
                         
                         <form method="POST" action="{{ route('seller.store') }}" data-toggle="validator" enctype="multipart/form-data">
                              @csrf
                              <hr class = "mt-2">
                              <p class="text-center" style="font-weight: bold;">Personal Information</p>
                              <div class="row">
                            
                            

                              <div class="col-lg-4 col-sm-12">
                                  <div class="form-group">
                                     <label for="full_name" class="form-label">First Name <span class = "text-danger">*</span></label>
                                     <input name="first_name" id='full_name' value="{{old('first_name')}}" class="form-control" type="text" placeholder=" "  required autofocus>
                                  </div>
                              </div>  

                              <div class="col-lg-4 col-sm-12">
                                 <div class="form-group">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input name="middle_name" id='middle_name' value="{{old('middle_name')}}" class="form-control" type="text" placeholder=""   >
                                 </div>
                              </div>   

                              <div class="col-lg-4 col-sm-12">
                                  <div class="form-group">
                                     <label for="last_name" class="form-label">Last Name <span class = "text-danger">*</span></label>
                                     <input class="form-control" id='last_name' type="text" name="last_name" placeholder=" " value="{{old('last_name')}}" required >
                                  </div>
                              </div>
 
                              

                               

                              <div class="col-lg-4  col-sm-12">
                                 <div class="form-group">
                                    <label for="birth_date" class="form-label">Date of Birth <span class = "text-danger">*</span></label>
                                    <input name="birth_date" id='birth_date' value="{{old('birth_date')}}" class="form-control" type="date" placeholder=" "  required  >
                                 </div>
                              </div>   

                              <div class="col-lg-4 col-sm-12">
                                 <div class="form-group">
                                    <label for="gender" class="form-label">Gender <span class = "text-danger">*</span></label>
                                    <select name="gender" id='gender' class="form-select" required>
                                       <option value="">Select</option>
                                       <option value="Male" <?=(old('gender')=="Male"?"Selected":"")?>>Male</option>
                                       <option value="Female" <?=(old('gender')=="Female"?"Selected":"")?>>Female</option>
                                       <option value="None" <?=(old('gender')=="None"?"Selected":"")?>>Prefer Not To Say</option>
                                    </select>
                                 </div>
                              </div> 
                              
                              <div class="col-lg-4 col-sm-12">
                                 <div class="form-group">
                                    <label for="civil_status" class="form-label">Civil Status <span class = "text-danger">*</span></label>
                                    <select name="civil_status" id = "civil_status" class="form-select" required>
                                       <option value="">Select</option>
                                       <option value="single" <?=(old('civil_status')=="single"?"Selected":"")?>>Single</option>
                                       <option value="married" <?=(old('civil_status')=="married"?"Selected":"")?>>Married</option>
                                       <option value="widowed" <?=(old('civil_status')=="widowed"?"Selected":"")?>>Widowed</option>
                                       <option value="complicated" <?=(old('civil_status')=="complicated"?"Selected":"")?>>Complicated</option>
                                       <option value="None" <?=(old('civil_status')=="None"?"Selected":"")?>>Prefer Not To Say</option>
                                    </select>
                                 </div>
                              </div> 

                              <div class="col-lg-4  col-sm-12">
                                 <div class="form-group">
                                    <label for="contact_number" class="form-label">Contact Number <span class = "text-danger">*</span></label>
                                    <input name="contact_number" id = "contact_number" value="{{old('contact_number')}}" class="form-control" type="number" placeholder=" "  required  >
                                 </div>
                              </div>   

                              <div class="col-lg-8  col-sm-12">
                                 <div class="form-group">
                                    <label for="education" class="form-label">Highest Educational Attainment <span class = "text-danger">*</span></label>
                                    <select name="education" id = "education" class="form-select" required>
                                       <option value="">Select</option>
                                       <option value="primary" <?=(old('education')=="primary"?"Selected":"")?>>Primary Education</option>
                                       <option value="secondary" <?=(old('education')=="secondary"?"Selected":"")?>>Secondary Education</option>
                                       <option value="tertiary" <?=(old('education')=="tertiary"?"Selected":"")?>>Tertiary Education</option>
                                       <option value="None" <?=(old('education')=="None"?"Selected":"")?>>Prefer Not To Say</option>
                                    </select>
                                 </div>
                              </div>    
                              <hr class = "mt-3">
                              <p class="text-center" style="font-weight: bold;">Address/Hometown</p>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="province" class="form-label">Province</label>
                                    <input id="province"  name="province" value="Southern Leyte" class="form-control" type="text" placeholder=""  readonly >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="Municipality" class="form-label">Municipality <span class = "text-danger">*</span></label>
                                    @if (empty($Municipalties))
                                       <div class = 'alert bg-rgba-danger'>No municipalities found!</div>
                                    @else
                                          <select name="Municipality" id="Municipality" class="form-select" required>
                                             <option value = ""></option>
                                                @foreach($Municipalties as $mun)
                                                   <option zip = "{{$mun->ZipCode}}" value = "{{$aes->encrypt($mun->citymunCode)}}" <?=(old('Municipality')==$aes->encrypt($mun->citymunCode)?"Selected":"")?>>{{ucwords(strtolower($mun->citymunDesc))}}</option>
                                                @endforeach
                                          </select>
                                    @endif
                                 
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="Barangay" class="form-label">Barangay <span class = "text-danger">*</span></label>
                                       @if (empty(old('Barangay')))
                                       <select name="Barangay" id="Barangay" class="form-select" required>
                                          <option value = ""></option>
                                       </select>
                                       @else
                                       <select name="Barangay" id="Barangay" class="form-select" required>
                                          <option value = ""></option>
                                             @foreach($Barangays as $brgy)
                                                <option value = "{{$aes->encrypt($brgy->brgyCode)}}" <?=(old('Barangay')==$aes->encrypt($brgy->brgyCode)?"Selected":"")?>>{{ucwords(strtolower($brgy->brgyDesc))}}</option>
                                             @endforeach
                                       </select>
                                       @endif
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="street" class="form-label">Street</label>
                                    <input id = "street" name="street" value="{{old('street')}}" class="form-control" type="text" placeholder=" " >
                                 </div>
                              </div>  

                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="ZipCode" class="form-label">ZIP Code <span class = "text-danger">*</span></label>
                                    <input id="ZipCode"  name="ZipCode" value="{{old('ZipCode')}}" class="form-control" type="text" required placeholder=" " >
                                 </div>
                              </div>  
                              <hr class = "mt-3">
                              <p class="text-center" style="font-weight: bold;">Account Information</p>

                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="username" class="form-label">Username <span class = "text-danger">*</span></label>
                                     <input class="form-control" type="text" name="username" id = "username" required placeholder=" " value = "{{old('username')}}">
                                     <center><small><label for="" class="form-label text-danger" id="verify-username-msg"></label></small></center>
                                  </div>
                               </div>
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="password" class="form-label">Password <span class = "text-danger">*</span></label>
                                     <input class="form-control" type="password" placeholder=" " id="password" name="password" required autocomplete="new-password" value = "{{old('password')}}">
                                     <center><small><label for="" class="form-label text-danger" id="verify-password-msg"></label></small></center>
                                  </div>
                               </div>
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="password_confirmation" class="form-label">Confirm Password <span class = "text-danger">*</span></label>
                                     <input id="password_confirmation" class="form-control" type="password" placeholder=" " name="password_confirmation" required value = "{{old('password_confirmation')}}">
                                 </div>
                               </div>
                              <hr class = "mt-3">
                               <p class="text-center" style="font-weight: bold;">Identity Verification</p>
 
                               <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="idnumber" class="form-label">Valid ID Number <span class = "text-danger">*</span></label>
                                    <input name="idnumber" id = "idnumber" value="{{old('idnumber')}}" class="form-control" type="text" placeholder=" " required  >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="valid_ID" class="form-label">Photo of Valid ID <span class = "text-danger">*</span></label>
                                    <input id = "valid_ID" name="valid_ID" value="{{old('valid_ID')}}" onchange="viewID(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg" required  >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <img id="valid-id" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="profile_photo" class="form-label">Upload Profile Picture <span class = "text-danger">*</span></label>
                                    <input id = "profile_photo"  name="profile_photo" value="{{old('profile_photo')}}" onchange="viewPhoto(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg" required  >
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <img id="profile-picture" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div> 
                              

                               <div class="d-flex justify-content-center">
                                  <div class="form-check mb-3">
                                     <label class="form-check-label" for="agreeterms">I agree with the terms of use <span class = "text-danger">*</span></label>
                                     <input type="checkbox" class="custom-control-input" name = "agreeterms" id="agreeterms" value = "1" required>
                                  </div>
                               </div>
                            </div>
                            <div class="d-flex justify-content-center">
                               <button type="submit" class="btn btn-success"> {{ __('sign up') }}</button>
                            </div>
                           
                            <p class="mt-3 text-center">
                               Already have an Account  <a href="{{route('auth.signin')}}" class="text-underline">Sign In</a>
                            </p>
                         </form>
                      </div>
                   </div> 
                </div>
             </div>    
             <div class="sign-bg sign-bg-right">
              
             </div>
          </div>   
       </div>
    </section>
 </x-guest-layout>
 