<x-app-layout :assets="$assets ?? []">
   <div>
      <?php
         $id = $id ?? null;
      ?>
      @if(isset($id))
      {!! Form::model($data, ['route' => ['users.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
      @else
      {!! Form::open(['route' => ['users.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      @endif
      <div class="row">

      @if(auth()->user()->user_type == 'seller')

         @foreach (Session::get('seller') as $seller)

            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Update Account Information</h4>
                     </div>
                     <div class="card-action">
                           <a href="{{route('users.show', auth()->id() || 1)}}" class="btn btn-sm btn-primary" role="button">Back</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-user-info">
                           <div class="row">
                              
                              <form method="POST" action="{{ route('register_seller') }}" data-toggle="validator" enctype="multipart/form-data">
                                 {{csrf_field()}}
                              <input class="form-control" type="hidden" name="user_type" placeholder=" " value="seller">
                              <div class="row">
                              <p class="text-center" style="font-weight: bold;">Personal Information</p>
                              <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="last-name" class="form-label">Last Name</label>
                                       <input class="form-control" type="text" name="last_name" placeholder=" " value="{{ $seller->last_name }}" required autofocus>
                                    </div>
                                 </div>
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="full-name" class="form-label">First Name</label>
                                       <input id="name"  name="first_name" value="{{ $seller->first_name }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div>  
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="middle-name" class="form-label">Middle Name</label>
                                       <input id="name"  name="middle_name" value="{{ $seller->middle_name }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div>   
   
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="birth-date" class="form-label">Date of Birth</label>
                                       <input id="name"  name="birth_date" value="{{ $seller->birthdate }}" class="form-control" type="date" placeholder=" "  required autofocus >
                                    </div>
                                 </div>   
   
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="gender" class="form-label">Gender</label>
                                       <select name="gender" class="form-control">
                                          <option value="{{ $seller->gender }}">{{ $seller->gender }}</option>
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
                                          <option value="{{ $seller->civil_status }}">{{ $seller->civil_status }}</option>
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
                                       <input id="name"  name="contact_number" value="{{ $seller->contact_number }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div>   
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="education" class="form-label">Highest Educational Attainment</label>
                                       <select name="education" class="form-control">
                                          <option value="{{ $seller->education }}">{{ $seller->education }}</option>
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
                                       <input id="name"  name="province" value="{{ $seller->province }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div> 
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="municipal" class="form-label">Municipality</label>
                                       <input id="name"  name="municipal" value="{{ $seller->municipality }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div>  
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="barangay" class="form-label">Barangay</label>
                                       <input id="name"  name="barangay" value="{{ $seller->barangay }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div>  
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="street" class="form-label">Street</label>
                                       <input id="name"  name="street" value="{{ $seller->street }}" class="form-control" type="text" placeholder=" " autofocus >
                                    </div>
                                 </div>  
   
                                 <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="zipcode" class="form-label">ZIP Code</label>
                                       <input id="name"  name="zipcode" value="{{ $seller->zipcode }}" class="form-control" type="text" placeholder=" " autofocus >
                                    </div>
                                 </div>  
   
                                 <p class="text-center" style="font-weight: bold;">Account Information</p>
   
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="phone" class="form-label">Username</label>
                                       <input class="form-control" type="text" name="username" value="{{ $seller->username }}" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       
                                       <input class="form-control" type="password" value="" id="password" name="password" required autocomplete="new-password" >
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
                                       <input id="name"  name="idnumber" value="{{ $seller->idnumber }}" class="form-control" type="text" placeholder=" " autofocus >
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
                                       <img id="valid-id" style="width: 200px; height: 200px; border-radius: 5px;" src="{{ asset('client-images/ID/'.$seller->idphoto) }}" alt="" />
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
                                       <img id="profile-picture" style="width: 200px; height: 200px; border-radius: 5px;" src="{{ asset('client-images/profile/photo/'.$seller->profile_picture) }}" alt="" />
                                    </div>
                                 </div> 
   
                                 <p class="text-center" style="font-weight: bold;">Farm Information</p>
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="province" class="form-label">Province</label>
                                       <input id="name"  name="farm_province" value="{{ $seller->farm_province }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div> 
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="municipal" class="form-label">Municipality</label>
                                       <input id="name"  name="farm_municipal" value="{{ $seller->farm_municipality }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div>  
   
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="barangay" class="form-label">Barangay</label>
                                       <input id="name"  name="farm_barangay" value="{{ $seller->farm_barangay }}" class="form-control" type="text" placeholder=" "  required autofocus >
                                    </div>
                                 </div> 
                                 
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="coordinates" class="form-label">Coordinates</label>
                                       <input id="name"  name="farm_coordinates" value="{{ $seller->farm_coordinates }}" class="form-control" type="text" placeholder=" " autofocus >
                                    </div>
                                 </div>
                                 
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="size" class="form-label">Estimated Farm Size</label>
                                       <select name="farm_size" class="form-control">
                                          <option value="{{ $seller->farm_size }}">{{ $seller->farm_size }} Square Meters</option>
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
   
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="type" class="form-label">Aid Received</label><br>
                                       <input type="checkbox" class="custom-control-input" name="fertilizers" value="Fertilizer"><label for="" class="ms-2">Fertilizer</label><br>
                                       <input type="checkbox" class="custom-control-input" name="seedlings" value="Seedlings"><label for="" class="ms-2">Seedlings</label><br>
                                       <input type="checkbox" class="custom-control-input" name="feeds" value="Feeds"><label for="" class="ms-2">Feeds</label><br>
                                    </div>
                                 </div>  
                                 <div class="col-lg-3">
                                    <button class="btn btn-success" type="submit">Update</button>
                                 </div>
                              </form>

                           </div>
                     </div>
                  </div>
               </div>
            </div>

         @endforeach
      @endif
        </div>
        {!! Form::close() !!}
   </div>
</x-app-layout>
