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
                         <form method="POST" action="{{ route('register_seller') }}" data-toggle="validator" enctype="multipart/form-data">
                             {{csrf_field()}}
                           <input class="form-control" type="hidden" name="user_type" placeholder=" " value="seller">
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
                                    <label for="middle-name" class="form-label">Middle Name</label>
                                    <input id="name"  name="middle_name" value="{{old('middle_name')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div>   

                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="birth-date" class="form-label">Date of Birth</label>
                                    <input id="name"  name="birth_date" value="{{old('birth_date')}}" class="form-control" type="date" placeholder=" "  required autofocus >
                                 </div>
                              </div>   

                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control">
                                       <option value="">Select</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                       <option value="None">Prefer Not To Say</option>
                                    </select>
                                 </div>
                              </div> 
                              
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="civil-status" class="form-label">Civil Status</label>
                                    <select name="civil_status" class="form-control">
                                       <option value="">Select</option>
                                       <option value="single">Single</option>
                                       <option value="married">Married</option>
                                       <option value="widowed">Widowed</option>
                                       <option value="complicated">Complicated</option>
                                       <option value="None">Prefer Not To Say</option>
                                    </select>
                                 </div>
                              </div> 

                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="contact-number" class="form-label">Contact Number</label>
                                    <input id="name"  name="contact_number" value="{{old('contact_number')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div>   

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="education" class="form-label">Highest Educational Attainment</label>
                                    <select name="education" class="form-control">
                                       <option value="">Select</option>
                                       <option value="primary">Primary Education</option>
                                       <option value="secondary">Secondary Education</option>
                                       <option value="tertiary">Tertiary Education</option>
                                       <option value="None">Prefer Not To Say</option>
                                    </select>
                                 </div>
                              </div>    

                              <p class="text-center" style="font-weight: bold;">Address/Hometown</p>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="province" class="form-label">Province</label>
                                    <input id="name"  name="province" value="{{old('province')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="municipal" class="form-label">Municipality</label>
                                    <input id="name"  name="municipal" value="{{old('municipal')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input id="name"  name="barangay" value="{{old('barangay')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="street" class="form-label">Street</label>
                                    <input id="name"  name="street" value="{{old('street')}}" class="form-control" type="text" placeholder=" " autofocus >
                                 </div>
                              </div>  

                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="zipcode" class="form-label">ZIP Code</label>
                                    <input id="name"  name="zipcode" value="{{old('zipcode')}}" class="form-control" type="text" placeholder=" " autofocus >
                                 </div>
                              </div>  

                              <p class="text-center" style="font-weight: bold;">Account Information</p>

                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="phone" class="form-label">Username</label>
                                     <input class="form-control" type="text" name="username" placeholder=" ">
                                  </div>
                               </div>
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="password" class="form-label">Password</label>
                                     <input class="form-control" type="password" placeholder=" " id="password" name="password" required autocomplete="new-password" >
                                  </div>
                               </div>
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label for="confirm-password" class="form-label">Confirm Password</label>
                                     <input id="password_confirmation" class="form-control" type="password" placeholder=" " name="password_confirmation" required >
                                  </div>
                               </div>

                               <p class="text-center" style="font-weight: bold;">Identity Verification</p>
 
                               <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="idnumber" class="form-label">Valid ID Number</label>
                                    <input id="name"  name="idnumber" value="{{old('idnumber')}}" class="form-control" type="text" placeholder=" " autofocus >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="valid_ID" class="form-label">Photo of Valid ID</label>
                                    <input id="name"  name="valid_ID" value="{{old('valid_ID')}}" onchange="viewID(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg" autofocus >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <img id="valid-id" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="profile_photo" class="form-label">Upload Profile Picture</label>
                                    <input id="name"  name="profile_photo" value="{{old('profile_photo')}}" onchange="viewPhoto(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg" autofocus >
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <img id="profile-picture" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div> 

                              <p class="text-center" style="font-weight: bold;">Farm Information</p>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="province" class="form-label">Province</label>
                                    <input id="name"  name="farm_province" value="{{old('farm_province')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="municipal" class="form-label">Municipality</label>
                                    <input id="name"  name="farm_municipal" value="{{old('farm_municipal')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input id="name"  name="farm_barangay" value="{{old('farm_barangay')}}" class="form-control" type="text" placeholder=" "  required autofocus >
                                 </div>
                              </div> 
                              
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="coordinates" class="form-label">Coordinates</label>
                                    <input id="name"  name="farm_coordinates" value="{{old('farm_coordinates')}}" class="form-control" type="text" placeholder=" " autofocus >
                                 </div>
                              </div>
                              
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="size" class="form-label">Estimated Farm Size</label>
                                    <select name="farm_size" class="form-control">
                                       <option value="">Select</option>
                                       <option value="100-300">100-300 Square Meters</option>
                                       <option value="301-600">301-600 Square Meters</option>
                                       <option value="601-900">601-900 Square Meters</option>
                                       <option value="Above 900">Above 900 Square Meters</option>
                                    </select>
                                 </div>
                              </div>    

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Type of Farm</label><br>
                                    <input type="checkbox" class="custom-control-input" name="crops" id="check-crops" value="Crops"><label for="" class="ms-2">Crops</label><br>
                                    <input type="checkbox" class="custom-control-input" name="livestocks" id="check-livestocks" value="Livestocks"><label for="" class="ms-2">Livestocks</label><br>
                                    <input type="checkbox" class="custom-control-input" name="vegetables" id="check-vegetables" value="Vegetables"><label for="" class="ms-2">Vegetables</label><br>
                                    <input type="checkbox" class="custom-control-input" name="products" id="check-products" value="Processed Products"><label for="" class="ms-2">Processed Products/Goods</label><br>
                                 </div>
                              </div>   
                              
                              <div class="col-lg-6" style="display: none;" id="crops-show">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Crops</label><br>
                                    <input type="checkbox" class="custom-control-input" name="crop1" value="Crops"><label for="" class="ms-2">Crops</label><br>
                                    <input type="checkbox" class="custom-control-input" name="crop2" value="Livestocks"><label for="" class="ms-2">Livestocks</label><br>
                                    <input type="checkbox" class="custom-control-input" name="crop3" value="Vegetables"><label for="" class="ms-2">Vegetables</label><br>
                                    <input type="checkbox" class="custom-control-input" name="crop4" value="Vegetables"><label for="" class="ms-2">Processed Products/Goods</label><br>
                                 </div>
                              </div>   

                              <div class="col-lg-6" style="display: none;" id="livestocks-show">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Livestocks</label><br>
                                    <input type="checkbox" class="custom-control-input" name="livestock1" value="Crops"><label for="" class="ms-2">Crops</label><br>
                                    <input type="checkbox" class="custom-control-input" name="livestock2" value="Livestocks"><label for="" class="ms-2">Livestocks</label><br>
                                    <input type="checkbox" class="custom-control-input" name="livestock3" value="Vegetables"><label for="" class="ms-2">Vegetables</label><br>
                                    <input type="checkbox" class="custom-control-input" name="livestock4" value="Vegetables"><label for="" class="ms-2">Processed Products/Goods</label><br>
                                 </div>
                              </div>   

                              <div class="col-lg-6" style="display: none;" id="vegetables-show">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Vegetables</label><br>
                                    <input type="checkbox" class="custom-control-input" name="vegetable1" value="Crops"><label for="" class="ms-2">Crops</label><br>
                                    <input type="checkbox" class="custom-control-input" name="vegetable2" value="Livestocks"><label for="" class="ms-2">Livestocks</label><br>
                                    <input type="checkbox" class="custom-control-input" name="vegetable3" value="Vegetables"><label for="" class="ms-2">Vegetables</label><br>
                                    <input type="checkbox" class="custom-control-input" name="vegetable4" value="Vegetables"><label for="" class="ms-2">Processed Products/Goods</label><br>
                                 </div>
                              </div>  

                              <div class="col-lg-6" style="display: none;" id="products-show">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Processed Products/Goods</label><br>
                                    <input type="checkbox" class="custom-control-input" name="product1" value="Crops"><label for="" class="ms-2">Crops</label><br>
                                    <input type="checkbox" class="custom-control-input" name="product2" value="Livestocks"><label for="" class="ms-2">Livestocks</label><br>
                                    <input type="checkbox" class="custom-control-input" name="product3" value="Vegetables"><label for="" class="ms-2">Vegetables</label><br>
                                    <input type="checkbox" class="custom-control-input" name="product4" value="Vegetables"><label for="" class="ms-2">Processed Products/Goods</label><br>
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="size" class="form-label">Estimated Yield per Harvest (Gross)</label>
                                    <select name="harvest_gross" class="form-control">
                                       <option value="">Select</option>
                                       <option value="Below 10,000">Below ₱10,000</option>
                                       <option value="10,001-20,000">₱10,001 - ₱20,000</option>
                                       <option value="30,0001-40,000">₱30,0001 - ₱40,000</option>
                                       <option value="Above 50,000">Above ₱50,000</option>
                                    </select>
                                 </div>
                              </div>    

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="size" class="form-label">Estimated Yield per Harvest (Net)</label>
                                    <select name="harvest_net" class="form-control">
                                       <option value="">Select</option>
                                       <option value="Below 10,000">Below ₱10,000</option>
                                       <option value="10,001-20,000">₱10,001 - ₱20,000</option>
                                       <option value="30,0001-40,000">₱30,0001 - ₱40,000</option>
                                       <option value="Above 50,000">Above ₱50,000</option>
                                    </select>
                                 </div>
                              </div>    

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Program Beneficiary</label><br>
                                    <select name="program_beneficiary" id="yes-beneficiary"  class="form-control">
                                       <option value="">Select</option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div>
                              </div>   

                              <div class="col-lg-6" style="display: none;" id="beneficiary-show">
                                 <div class="form-group">
                                    <label for="" class="form-label">Program Beneficiary (Pls. Specify)</label>
                                    <input name="beneficiary" value="" class="form-control" type="text" placeholder=" " autofocus >
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="type" class="form-label">Aid Received</label><br>
                                    <input type="checkbox" class="custom-control-input" name="fertilizers" value="Fertilizer"><label for="" class="ms-2">Fertilizer</label><br>
                                    <input type="checkbox" class="custom-control-input" name="seedlings" value="Seedlings"><label for="" class="ms-2">Seedlings</label><br>
                                    <input type="checkbox" class="custom-control-input" name="feeds" value="Feeds"><label for="" class="ms-2">Feeds</label><br>
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
 