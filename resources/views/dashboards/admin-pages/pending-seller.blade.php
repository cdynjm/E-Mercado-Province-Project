<?php
   use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    
?>

<x-app-layout :assets="$assets ?? []">
   <div class="row">
         <div class="col-md-12 mb-4">           
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                     <div class="card-body">
                        <h2 class="mb-2 mt-4 text-center">Seller Information</h2>
                        <p class="text-center text-danger">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                           <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                     </svg>

                        Account Under Review</p>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
      
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('approve.seller') }}">
                        @csrf

                           <hr class = "mt-2">
                           <p class="text-center" style="font-weight: bold;">Personal Information</p>
                           <div class="row">
                           
                           @foreach ( $sellerinfo as $si)

                           <div class="col-lg-4 col-sm-12">
                                 <div class="form-group">
                                    <label for="full_name" class="form-label">First Name</label>
                                    <input id='full_name' value="{{ strtoupper($si->first_name) }}" class="form-control bg-white fw-bold" type="text" readonly>
                                 </div>
                           </div>  

                           <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input id='middle_name' value="{{ strtoupper($si->middle_name) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>   

                           <div class="col-lg-4 col-sm-12">
                                 <div class="form-group">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input id='last_name' value="{{ strtoupper($si->last_name) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                           </div>

                           <div class="col-lg-4  col-sm-12">
                              <div class="form-group">
                                    <label for="birth_date" class="form-label">Birth Date</label>
                                    <input id='birth_date' value="{{ strtoupper(date('F d, Y', strtotime($si->birthdate))) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                           </div>   

                           <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input id='gender' value="{{ strtoupper($si->gender) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                           </div> 
                           
                           <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                    <label for="civil_status" class="form-label">Civil Status</label>
                                    <input id='civil_status' value="{{ strtoupper($si->civil_status) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                           </div> 

                           <div class="col-lg-4  col-sm-12">
                              <div class="form-group">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input id='contact_number' value="{{ $si->contact_number }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                           </div>   

                           <div class="col-lg-8  col-sm-12">
                              <div class="form-group">
                                 <label for="education" class="form-label">Highest Educational Attainment</label>
                                 <input id='education' value="{{ strtoupper($si->education) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>    
                           <hr class = "mt-3">
                           <p class="text-center" style="font-weight: bold;">Address/Hometown</p>

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="province" class="form-label">Province</label>
                                 <input id='province' value="{{ strtoupper($si->Province->provDesc) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div> 

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="municipal" class="form-label">Municipality</label>
                                 <input id='municipal' value="{{ strtoupper($si->Municipality->citymunDesc) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="barangay" class="form-label">Barangay</label>
                                 <input id='barangay' value="{{ strtoupper($si->Barangay->brgyDesc) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="street" class="form-label">Barangay</label>
                                 <input id='street' value="{{ strtoupper($si->street) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  

                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label for="zipcode" class="form-label">ZIP Code</label>
                                 <input id='zipcode' value="{{ strtoupper($si->zipcode) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  

                           <hr class = "mt-3">
                              <p class="text-center" style="font-weight: bold;">Identity Verification</p>

                              <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="idnumber" class="form-label">Valid ID Number</label>
                                 <input id='idnumber' value="{{ strtoupper($si->idnumber) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div> 

                           <div class="col-lg-6">
                              <div class="form-group text-center">
                                 <label for="idnumber" class="form-label">Photo of Valid ID Number</label><br>
                                 <img id="valid-id" style="width: 250px; height: 250px; border-radius: 5px;" src="{{ asset('storage/images/client/id/'. $si->idphoto) }}" alt="" />
                              </div>
                           </div> 

                           <div class="col-lg-6">
                              <div class="form-group text-center">
                                 <label for="idnumber" class="form-label">Profile Picture</label><br>
                                 <img id="valid-id" style="width: 250px; height: 250px; border-radius: 5px;" src="{{ asset('storage/images/client/photo/'. $si->profile_picture) }}" alt="" />
                              </div>
                           </div> 

                           @endforeach

                           <hr class = "mt-3">
                           <p class="text-center" style="font-weight: bold;">Farm Information</p>

                           @foreach ($sellerfarm as $sf)
                     
                           
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="farmprovince" class="form-label">Province</label>
                                 <input id='farmprovince' value="{{ strtoupper($sf->Province->provDesc) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div> 

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="farmmunicipal" class="form-label">Municipality</label>
                                 <input id='farmmunicipal' value="{{ strtoupper($sf->Municipality->citymunDesc) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="farmbarangay" class="form-label">Barangay</label>
                                 <input id='farmbarangay' value="{{ strtoupper($sf->Barangay->brgyDesc) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>    

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="farmsize" class="form-label">Farm Size</label>
                                 <input id='farmsize' value="{{ strtoupper($sf->farm_size. ' Square Meters') }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>  

                           @endforeach

                           <div class="col-lg-12">
                              <div class="form-group overflow-auto">
                                 <label for="farmsize" class="form-label">Farm Products</label>
                                 <table class="table bg-white rounded table-hover">
                                    <thead>
                                       <tr class="table-info">
                                       <th scope="col">#</th>
                                       <th scope="col">Farm Product</th>
                                       <th scope="col">Farm Type</th>
                                       <th scope="col">Gross Yield</th>
                                       <th scope="col">Net Yield</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                          @php $count = 1; @endphp
                                          @foreach ($sellerfarmtype as $sft)
                                             <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $sft->FarmTypeSub->description }}</td>
                                                <td>{{ $sft->FarmType->description }}</td>
                                                <td>{{ $sft->grossyield }}</td>
                                                <td>{{ $sft->netyield }}</td>
                                             </tr>
                                             @php $count += 1; @endphp
                                          @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div> 

                           @foreach ($sellerfarm as $sf)

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="program" class="form-label">Program Beneficiary</label>
                                 <input id='program' value="{{ strtoupper($sf->beneficiary) }}" class="form-control bg-white fw-bold" readonly>
                              </div>
                           </div>

                              @if(strtoupper($sf->beneficiary) == 'YES')

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="program" class="form-label">Type of Program Beneficiary</label>
                                    <input id='program' value="{{ strtoupper($sf->beneficiary_specify) }}" class="form-control bg-white fw-bold" readonly>
                                 </div>
                              </div>

                              @endif

                           @endforeach


                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="type" class="form-label">Aid Received</label><br>
                                 <ul>
                                    @foreach ($selleraid as $sa)
                                       <li class="fw-bold">{{ strtoupper($sa->Aid->AidName) }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>  

                              @foreach ($sellerinfo as $si)
                                 <input type="hidden" name="sellerid" value='{{ $aes->encrypt($si->id) }}' class="form-control bg-white fw-bold" readonly>
                              @endforeach

                              <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="longitude" class="form-label">Coordinates (Longitude)</label>
                                       <input type="number" step="0.0001" id='longitude' name="longitude" placeholder='° N' class="form-control bg-white fw-bold" required>
                                 </div>
                              </div>

                              <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="latitude" class="form-label">Coordinates (Latitude)</label>
                                       <input type="number" step="0.0001" id='latitude' name="latitude" placeholder='° E' class="form-control bg-white fw-bold" required>
                                 </div>
                              </div>
   
                              <div class="d-flex justify-content-center">
                                 <button type="submit"  class="btn btn-success"> {{ __('Approve') }}</button>
                              </div>
                           </form>

                           <p class="mt-3 text-center">
                              <a href="{{route('pending.sellers')}}" class="text-underline">Back</a>
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
 @include('partials.dashboard._app_toast')