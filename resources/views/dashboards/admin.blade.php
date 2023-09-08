<?php
   use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    
?>

<x-app-layout :assets="$assets ?? []">
   <div class="row">
         @if(Auth::user()->user_type == 'provincial')
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                     </svg>
                     <div class="progress-detail">
                        <p  class="mb-2">Municipal Admins</p>
                        <h4 class="counter">{{ $totaladmins }}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endif
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                     </svg>
                     <div class="progress-detail">
                        <p  class="mb-2">Verified Sellers</p>
                        <h4 class="counter">{{ $totalverified }}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                        <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                     </svg>
                     <div class="progress-detail">
                        <p  class="mb-2">Pending Sellers</p>
                        <h4 class="counter">{{ $totalpending }}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <svg class="text-warning" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                     </svg>
                     <div class="progress-detail">
                        <p  class="mb-2">Buyers</p>
                        <h4 class="counter">{{ $totalbuyer }}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>


      <div class="col-md-4 col-lg-4">
         <div class="card" data-aos="fade-up" data-aos-delay="400">
            <div class="card-header d-flex justify-content-between flex-wrap">
               <div class="header-title">
                  <h4 class="card-title mb-2">Activity Overview</h4>
                  <p class="mb-0">
                     
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                     <path fill="#17904b" fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                     </svg>
                     
                     Recently Verified Sellers
                  </p>
               </div>
            </div>
            <div class="card-body">
               @foreach ($recentlyverified as $rv)
                     
               <div class=" d-flex profile-media align-items-top mb-2">
                  <div class="border-primary mt-1">
                     <img src="{{asset('storage/images/client/photo/'. $rv->profile_picture)}}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                  </div>
                  <div class="ms-4">
                     <h6 class=" mb-1">{{ ucwords($rv->last_name) }}, {{ ucwords($rv->first_name) }} {{ ucwords($rv->middle_name) }}</h6>
                     <span class="mb-0 fs-6"><small>{{ strtoupper(date('d M h:i A', strtotime($rv->updated_at))) }}</small></span>
                     <div class="mb-0 fs-6"><small>Verified by: <span class='fw-bold'>{{ $rv->verified_by }}</span></small></div>
                  </div>
               </div>

               @endforeach

            </div>
         </div>
      </div>
      @if(Auth::user()->user_type == 'provincial')
      <div class="col-md-8 col-lg-8">
         <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
            <div class="card-header d-flex justify-content-between flex-wrap">
               <div class="header-title">
                  <h4 class="card-title mb-2">Total Sellers by Municipal</h4>
                  <p class="mb-0">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                      </svg>
                     Province of Southern Leyte
                  </p>
               </div>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                  <table id="basic-table" class="table mb-0" role="grid">
                     <thead>
                        <tr>
                           <th>Municipal</th>
                           <th>Pending</th>
                           <th>Verified</th>
                        </tr>
                     </thead>
                     <tbody>

                        @php $countpen = 0; @endphp
                        @php $countver = 0; @endphp

                        @foreach ($sellersbymunicipal as $sbm)
                           <tr>
                              <td>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                  </svg>
                                 {{ ucwords(strtolower($sbm->citymunDesc)) }}
                              </td>

                              @foreach ($totalsellerspending as $tsp)
                                 @if($sbm->citymunCode == $tsp->municipality)
                                    @php $countpen += 1; @endphp
                                 @endif
                              @endforeach

                              <td class="text-danger">{{ $countpen }}</td>

                              @foreach ($totalsellersverified as $tsv)
                                 @if($sbm->citymunCode == $tsv->municipality)
                                    @php $countver += 1; @endphp
                                 @endif
                              @endforeach

                              <td class="text-success">{{ $countver }}</td>
                           </tr>
                           @php $countpen = 0; @endphp
                           @php $countver = 0; @endphp
                        @endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div> 
      @endif        

      @if(Auth::user()->user_type == 'municipal')
      <div class="col-md-8 col-lg-8">
         <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
            <div class="card-header d-flex justify-content-between flex-wrap">
               <div class="header-title">
                  <h4 class="card-title mb-2">Total Sellers by Barangay</h4>
                  <p class="mb-0">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                      </svg>
                      @foreach ($municipalityof as $admin)
                        Municipality of {{ ucwords(strtolower($admin->Municipality->citymunDesc)) }}
                      @endforeach  
                  </p>
               </div>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                  <table id="basic-table" class="table mb-0" role="grid">
                     <thead>
                        <tr>
                           <th>Municipal</th>
                           <th>Pending</th>
                           <th>Verified</th>
                        </tr>
                     </thead>
                     <tbody>

                        @php $countpen = 0; @endphp
                        @php $countver = 0; @endphp

                        @foreach ($sellersbybrgy as $sbb)
                           <tr>
                              <td>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                  </svg>
                                 {{ ucwords($sbb->brgyDesc) }}
                              </td>

                              @foreach ($totalsellerspending as $tsp)
                                 @if($sbb->brgyCode == $tsp->barangay)
                                    @php $countpen += 1; @endphp
                                 @endif
                              @endforeach

                              <td class="text-danger">{{ $countpen }}</td>

                              @foreach ($totalsellersverified as $tsv)
                                 @if($sbb->brgyCode == $tsv->barangay)
                                    @php $countver += 1; @endphp
                                 @endif
                              @endforeach

                              <td class="text-success">{{ $countver }}</td>
                           </tr>
                           @php $countpen = 0; @endphp
                           @php $countver = 0; @endphp
                        @endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div> 
      @endif        
      </div>
   </div>
</div>
</x-app-layout>