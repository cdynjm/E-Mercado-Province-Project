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
                         <h2 class="mb-2 text-center">Buyer Registration Form</h2>
                         <p class="text-center">Create your {{env('APP_NAME')}} account.</p>
                         <x-auth-session-status class="mb-4" :status="session('status')" />
 
                         <!-- Validation Errors -->
                         <x-auth-validation-errors class="mb-4" :errors="$errors" />
                         <form method="POST" action="{{route('buyer.store')}}" data-toggle="validator" enctype="multipart/form-data">
                             {{csrf_field()}}
                            <input class="form-control" type="hidden" name="user_type" placeholder=" " value="buyer">
                            <div class="row">
                            <p class="text-center" style="font-weight: bold;">Personal Information</p>
                            <div class="col-lg-6">
                                  <div class="form-group">
                                     <label for="last_name" class="form-label">Last Name <span class = "text-danger">*</span></label>
                                     <input class="form-control" id="last_name" type="text" name="last_name" placeholder=" " value="{{old('last_name')}}" required autofocus>
                                  </div>
                               </div>
 
                               <div class="col-lg-6">
                                  <div class="form-group">
                                     <label for="first_name" class="form-label">First Name <span class = "text-danger">*</span></label>
                                     <input id="first_name"  name="first_name" value="{{old('first_name')}}" class="form-control" type="text" placeholder=" "  required  >
                                  </div>
                               </div> 
                              
                             <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="phone" class="form-label">Contact Number <span class = "text-danger">*</span></label>
                                   <input id="phone" type="number"  name="contact_number" value="{{old('phone_number')}}" class="form-control" type="text" placeholder=" "  required  >
                                </div>
                             </div>

                             <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="birth_date" class="form-label">Date of Birth <span class = "text-danger">*</span></label>
                                 <input name="birth_date" id='birth_date' value="{{old('birth_date')}}" class="form-control" type="date" placeholder=" "  required  >
                              </div>
                           </div> 

                           <div class="col-lg-6">
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
 
                             <div class="col-lg-6">
                              <div class="form-group">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input id="username" class="form-control" type="text" placeholder=" " name="username" value="{{old('username')}}" required>
                                    <center><small><label for="" class="form-label text-danger" id="verify-username-msg"></label></small></center>
                              </div>
                           </div>
                               <div class="col-lg-6">
                                  <div class="form-group">
                                     <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                     <input class="form-control" type="password" placeholder=" " id="password" name="password" required autocomplete="new-password" >
                                     <center><small><label for="" class="form-label text-danger" id="verify-password-msg"></label></small></center>
                                  </div>
                               </div>
                               <div class="col-lg-6">
                                  <div class="form-group">
                                     <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                     <input id="confirm_password" class="form-control" type="password" placeholder=" " name="password_confirmation" required >
                                  </div>
                               </div>
                              
                               <hr class = "mt-3">
                              <p class="text-center" style="font-weight: bold;">Address/Hometown</p>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="Province" class="form-label">Province <span class = "text-danger">*</span></label>
                                    @if (empty($Provinces))
                                    <div class = 'alert bg-rgba-danger'>No provinces found!</div>
                                    @else
                                       <select name="Province" id="Province" class="form-select" required>
                                          <option value = ""></option>
                                             @foreach($Provinces as $pro)
                                                <option value = "{{$aes->encrypt($pro->provCode)}}" <?=(old('province')==$aes->encrypt($pro->provCode)?"Selected":"")?>>{{ucwords(strtolower($pro->provDesc))}}</option>
                                             @endforeach
                                       </select>
                                 @endif
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="Municipality" class="form-label">Municipality <span class = "text-danger">*</span></label>
                                          <select name="Municipality" id="Municipality" class="form-select" required>
                                             <option value = ""></option>
                                          </select>
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="Barangay" class="form-label">Barangay <span class = "text-danger">*</span></label>
                                    <select name="Barangay" id="Barangay" class="form-select" required>
                                          <option value = ""></option>
                                       </select>
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="street" class="form-label">Street</label>
                                    <input id = "street" name="street" value="{{old('street')}}" class="form-control" type="text" placeholder=" " >
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="ZipCode" class="form-label">ZIP Code <span class = "text-danger">*</span></label>
                                    <input id="ZipCode"  name="ZipCode" value="{{old('ZipCode')}}" class="form-control" type="text" required placeholder=" " >
                                 </div>
                              </div>  

                               <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="profile_photo" class="form-label">Upload Profile Picture</label>
                                    <input id="name"  name="profile_photo" value="{{old('profile_photo')}}" onchange="viewPhoto(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg"  >
                                 </div>
                              </div>
                              <center>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <img id="profile-picture" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div>
                              </center> 
 
                               <div class="d-flex justify-content-center">
                                  <div class="form-check mb-3">
                                     <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                                     <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                  </div>
                               </div>
                            </div>
                            <div class="d-flex justify-content-center">
                               <button type="submit" class="btn btn-success"> {{ __('sign up') }}</button>
                            </div>
                            <p class="text-center my-3">or sign in with other accounts?</p>
                            <div class="d-flex justify-content-center">
                               <ul class="list-group list-group-horizontal list-group-flush">
                                  <li class="list-group-item border-0 pb-0">
                                     <a href="#"><img src="{{asset('images/brands/fb.svg')}}" alt="fb"></a>
                                  </li>
                                  <li class="list-group-item border-0 pb-0">
                                     <a href="#"><img src="{{asset('images/brands/gm.svg')}}" alt="gm"></a>
                                  </li>
                                  <li class="list-group-item border-0 pb-0">
                                     <a href="#"><img src="{{asset('images/brands/im.svg')}}" alt="im"></a>
                                  </li>
                                  <li class="list-group-item border-0 pb-0">
                                     <a href="#"><img src="{{asset('images/brands/li.svg')}}" alt="li"></a>
                                  </li>
                               </ul>
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
 