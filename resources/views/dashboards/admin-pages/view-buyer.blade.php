<?php
   use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    
?>

<x-app-layout :assets="$assets ?? []">
   <div class="row">
   <div class="col-md-12 mt-0 mb-4">           
             <div class="row justify-content-center">
                <div class="col-md-10">
                   <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                      <div class="card-body">
                         <h2 class="mb-2 mt-4 text-center">Buyer Information</h2>
                         <x-auth-session-status class="mb-4" :status="session('status')" />

                         @foreach($buyerinfo as $bi)
                            <div class="row">
                            <p class="text-center" style="font-weight: bold;">Personal Information</p>
                            <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="full_name" class="form-label">First Name</label>
                                     <input id='full_name' value="{{ strtoupper($bi->first_name) }}" class="form-control bg-white fw-bold" type="text" readonly>
                                  </div>
                               </div>
 
                               <div class="col-lg-6">
                                  <div class="form-group">
                                   <label for="last_name" class="form-label">Last Name</label>
                                     <input id='last_name' value="{{ strtoupper($bi->last_name) }}" class="form-control bg-white fw-bold" readonly>
                                  </div>
                               </div> 
                              
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                     <input id='contact_number' value="{{ $bi->contact_number }}" class="form-control bg-white fw-bold" readonly>
                                </div>
                             </div>

                             <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="birth_date" class="form-label">Birth Date</label>
                                 <input id='birth_date' value="{{ strtoupper(date('F d, Y', strtotime($bi->birth_date))) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div> 

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="gender" class="form-label">Gender</label>
                                 <input id='gender' value="{{ strtoupper($bi->gender) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  
                           
                              
                               <hr class = "mt-3">
                              <p class="text-center" style="font-weight: bold;">Address/Hometown</p>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="province" class="form-label">Province</label>
                                    <input id='province' value="{{ strtoupper($bi->Province->provDesc) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                              </div> 

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="municipal" class="form-label">Municipality</label>
                                    <input id='municipal' value="{{ strtoupper($bi->Municipality->citymunDesc) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input id='barangay' value="{{ strtoupper($bi->Barangay->brgyDesc) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="street" class="form-label">Street</label>
                                    <input id='street' value="{{ strtoupper($bi->street) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                              </div>  

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="zipcode" class="form-label">ZIP Code</label>
                                    <input id='zipcode' value="{{ strtoupper($bi->zipcode) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                              </div>  
                            
                              <div class="col-lg-12">
                                 <div class="form-group text-center">
                                    <label for="idnumber" class="form-label">Profile Picture</label><br>
                                    <img id="valid-id" style="width: 250px; height: 250px; border-radius: 5px;" src="{{ asset('storage/images/client/photo/'. $bi->profile_picture) }}" alt="" />
                                 </div>
                              </div> 
                        @endforeach

                        <p class="mt-3 text-center">
                           <a href="{{route('admin.buyer')}}" class="text-underline">Back</a>
                        </p>

                      </div>
                   </div> 
                </div>
             </div>    
             <div class="sign-bg sign-bg-right">
              
             </div>
          </div>   
    </div>
</x-app-layout>