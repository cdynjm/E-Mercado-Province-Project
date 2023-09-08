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
                         <form method="POST" action="{{route('register_buyer')}}" data-toggle="validator" enctype="multipart/form-data">
                             {{csrf_field()}}
                            <input class="form-control" type="hidden" name="user_type" placeholder=" " value="buyer">
                            <div class="row">
                            <p class="text-center" style="font-weight: bold;">Personal Information</p>
                            <div class="col-lg-6">
                                  <div class="form-group">
                                     <label for="last-name" class="form-label">Last Name</label>
                                     <input class="form-control" type="text" name="last_name" placeholder=" " value="{{old('last_name')}}" required autofocus>
                                  </div>
                               </div>
 
                               <div class="col-lg-6">
                                  <div class="form-group">
                                     <label for="full-name" class="form-label">First Name</label>
                                     <input id="name"  name="first_name" value="{{old('first_name')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                  </div>
                               </div> 
                               
                               <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="address" class="form-label">Address</label>
                                   <input id="address"  name="address" value="{{old('address')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                </div>
                             </div>
                             
                             <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="phone" class="form-label">Contact Number</label>
                                   <input id="phone"  name="phone_number" value="{{old('phone_number')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                </div>
                             </div>
 
                             <div class="col-lg-12">
                              <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder=" " name="username" value="{{old('username')}}" required>
                              </div>
                           </div>
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                     <input class="form-control" type="password" placeholder=" " id="password" name="password" required autocomplete="new-password" >
                                  </div>
                               </div>
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="confirm-password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                     <input id="password_confirmation" class="form-control" type="password" placeholder=" " name="password_confirmation" required >
                                  </div>
                               </div>

                               <div class="col-lg-9">
                                 <div class="form-group">
                                    <label for="profile_photo" class="form-label">Upload Profile Picture</label>
                                    <input id="name"  name="profile_photo" value="{{old('profile_photo')}}" onchange="viewPhoto(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg" autofocus >
                                 </div>
                              </div>

                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <img id="profile-picture" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div> 
 
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
 