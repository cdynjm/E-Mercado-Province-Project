<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="d-flex flex-wrap align-items-center justify-content-between">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                        <img src="{{asset('client-images/profile/photo/'.auth()->user()->profile_picture)}}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                       
                     </div>
                     <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                        <h4 class="me-2 h4">{{ auth()->user()->full_name }}</h4>
                        <span class="text-capitalize"> - {{ str_replace('_',' ',auth()->user()->user_type)}}</span>
                        @if(auth()->user()->user_type == 'seller')
                           @if(auth()->user()->status == 'pending')
                              <span class="text-capitalize" style="color: red;">({{ str_replace('_',' ',auth()->user()->status)}} for Verification)</span>
                           @endif
                           @if(auth()->user()->status == 'verified')
                              <span class="text-capitalize" style="color: green;">({{ str_replace('_',' ',auth()->user()->status)}})</span>
                           @endif
                        @endif
                     </div>
                  </div>
                  <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab" aria-selected="false">Feed</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Add Product</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-friends" role="tab" aria-selected="false">Friends</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-profile" role="tab" aria-selected="false">Profile</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>      

      <div class="col-lg-9">
         <div class="profile-content tab-content">
         <div id="profile-feed" class="tab-pane fade active show">
            <div class="card pb-4">
               <div class="card-header">
                   <div class="d-flex justify-content-between">
                       <div class="d-flex align-items-center">
                           <div class="p-2 rounded bg-warning disabled">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="none" viewBox="0 0 24 24" stroke="white">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                               </svg>
                           </div>
                           <h4 class="px-3">Crops</h4>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row">

            <div class="col-md-4">
               <div class="card credit-card-widget">
               
                  <img style="width: 100%; height: 200px; border-radius: 5px;" src="https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcS4hyJJ0-aiq_6eeSoEdt5sphj8nROBsTKfA_WGzXcBm-Ys70iAliE7YxK0Gi9WoCUaz9yu4LvQEPbE2zQ" alt="">
                     
                  <div class="card-body">
                     <div class=" mb-4 text-left">
                        <h5>Carrots</h5>
                     </div>
                     <div class="d-flex align-itmes-center flex-wrap  mb-4">
                        
                        <div class="d-flex align-itmes-center me-0 me-md-4">
                           <div>
                              <div class="p-3 mb-2 rounded bg-soft-primary">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                 </svg>
                              </div>
                           </div>
                           <div class="ms-3">
                              <h5>1153</h5>
                              <small class="mb-0">Stocks Availble</small>
                           </div>
                        </div>
                        <div class="d-flex align-itmes-center">
                           <div>
                              <div class="p-3 mb-2 rounded bg-soft-info">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                 </svg>
                              </div>
                           </div>
                           <div class="ms-3">
                              <h5>81K</h5>
                              <small class="mb-0">Sold</small>
                           </div>
                        </div>
                     </div>
                     <div class="mb-4">
                        <div class="d-flex justify-content-between flex-wrap">
                           <h2 class="mb-2">₱ 45.00</h2>
                           <div>
                              <span class="badge bg-success rounded-pill">YoY 24%</span>
                           </div>
                        </div>
                        <p class="text-info">Life time sales</p>
                     </div>
                     <div class="d-grid grid-cols-2 gap">
                        <button class="btn btn-success p-2">View</button>
                        <button class="btn btn-info p-2"><i class="fa-solid fa-cart-plus"></i></button>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-md-4">
               <div class="card credit-card-widget">
               
                  <img style="width: 100%; height: 200px; border-radius: 5px;" src="https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcS4hyJJ0-aiq_6eeSoEdt5sphj8nROBsTKfA_WGzXcBm-Ys70iAliE7YxK0Gi9WoCUaz9yu4LvQEPbE2zQ" alt="">
                     
                  <div class="card-body">
                     <div class=" mb-4 text-left">
                        <h5>Carrots</h5>
                     </div>
                     <div class="d-flex align-itmes-center flex-wrap  mb-4">
                        
                        <div class="d-flex align-itmes-center me-0 me-md-4">
                           <div>
                              <div class="p-3 mb-2 rounded bg-soft-primary">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                 </svg>
                              </div>
                           </div>
                           <div class="ms-3">
                              <h5>1153</h5>
                              <small class="mb-0">Stocks Availble</small>
                           </div>
                        </div>
                        <div class="d-flex align-itmes-center">
                           <div>
                              <div class="p-3 mb-2 rounded bg-soft-info">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                 </svg>
                              </div>
                           </div>
                           <div class="ms-3">
                              <h5>81K</h5>
                              <small class="mb-0">Sold</small>
                           </div>
                        </div>
                     </div>
                     <div class="mb-4">
                        <div class="d-flex justify-content-between flex-wrap">
                           <h2 class="mb-2">₱ 45.00</h2>
                           <div>
                              <span class="badge bg-success rounded-pill">YoY 24%</span>
                           </div>
                        </div>
                        <p class="text-info">Life time sales</p>
                     </div>
                     <div class="d-grid grid-cols-2 gap">
                        <button class="btn btn-success p-2">View</button>
                        <button class="btn btn-info p-2"><i class="fa-solid fa-cart-plus"></i></button>
                     </div>
                  </div>
               </div>
            </div>

         </div>
         
           <div class="card pb-4">
               <div class="card-header">
                   <div class="d-flex justify-content-between">
                       <div class="d-flex align-items-center">
                           <div class="p-2 rounded bg-warning disabled">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="none" viewBox="0 0 24 24" stroke="white">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                               </svg>
                           </div>
                           <h4 class="px-3">Livestocks</h4>
                       </div>
                   </div>
               </div>
           </div>

           <div class="card pb-4">
               <div class="card-header">
                   <div class="d-flex justify-content-between">
                       <div class="d-flex align-items-center">
                           <div class="p-2 rounded bg-warning disabled">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="none" viewBox="0 0 24 24" stroke="white">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                               </svg>
                           </div>
                           <h4 class="px-3">Vegetables</h4>
                       </div>
                   </div>
               </div>
           </div>

           <div class="card pb-4">
               <div class="card-header">
                   <div class="d-flex justify-content-between">
                       <div class="d-flex align-items-center">
                           <div class="p-2 rounded bg-warning disabled">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="none" viewBox="0 0 24 24" stroke="white">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                               </svg>
                           </div>
                           <h4 class="px-3">Processed Products</h4>
                       </div>
                   </div>
               </div>
           </div>

           
         </div>
         <div id="profile-activity" class="tab-pane fade">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Start Selling</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="">
                     <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="" class="form-label">Upload Product Photo</label>
                           <input class="form-control" type="file">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <img id="profile-picture" style="width: 230px; height: 200px; border-radius: 5px;" src="https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg" alt="" />
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label for="" class="form-label">Product Name</label>
                           <input class="form-control" type="text">
                        </div>
                     </div> 

                     <div class="col-lg-12">
                        <div class="form-group">
                           <label for="" class="form-label">Product Description</label>
                           <textarea class="form-control"></textarea>
                        </div>
                     </div> 

                     <div class="col-lg-4">
                        <div class="form-group">
                           <label for="" class="form-label">Stocks</label>
                           <input class="form-control" type="number">
                        </div>
                     </div> 

                     <div class="col-lg-4">
                        <div class="form-group">
                           <label for="" class="form-label">Price</label>
                           <input class="form-control" type="number">
                        </div>
                     </div> 

                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-label">Type</label>
                           <select name="" class="form-control">
                              <option value="">Select</option>
                              <option value="">Crop</option>
                              <option value="">Livestock</option>
                              <option value="">Vegetable</option>
                              <option value="">Processed Product</option>
                           </select>
                        </div>
                     </div> 
                  </div>

                  <div class="col-lg-4">
                     <div class="form-group">
                        <button class="btn btn-success">Add Product</button>
                     </div>
                  </div> 

                  </form>
               </div>
            </div>
         </div>
         <div id="profile-friends" class="tab-pane fade">
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Friends</h4>
                  </div>
               </div>
               <div class="card-body">
                  <ul class="list-inline m-0 p-0">
                     <li class="d-flex mb-4 align-items-center">
                       
                        <div class="ms-3 flex-grow-1">
                           <h6>Paul Molive</h6>
                           <p class="mb-0">Web Designer</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton9">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/05.png')}}" alt="story-img" class="rounded-pill avatar-40">
                        <div class="ms-3 flex-grow-1">
                           <h6>Paul Molive</h6>
                           <p class="mb-0">trainee</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton10">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/02.png')}}" alt="story-img" class="rounded-pill avatar-40">
                        <div class="ms-3 flex-grow-1">
                           <h6>Anna Mull</h6>
                           <p class="mb-0">Web Developer</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton11">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/03.png')}}" alt="story-img" class="rounded-pill avatar-40">
                        <div class="ms-3 flex-grow-1">
                           <h6>Paige Turner</h6>
                           <p class="mb-0">trainee</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton12">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/04.png')}}" alt="story-img" class="rounded-pill avatar-40">
                        <div class="ms-3 flex-grow-1">
                           <h6>Barb Ackue</h6>
                           <p class="mb-0">Web Designer</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton13">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/05.png')}}" alt="story-img" class="rounded-pill avatar-40">
                        <div class="ms-3 flex-grow-1">
                           <h6>Greta Life</h6>
                           <p class="mb-0">Tester</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton14">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/03.png')}}" alt="story-img" class="rounded-pill avatar-40">                              <div class="ms-3 flex-grow-1">
                           <h6>Ira Membrit</h6>
                           <p class="mb-0">Android Developer</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton15">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="{{asset('images/avatars/02.png')}}" alt="story-img" class="rounded-pill avatar-40">
                        <div class="ms-3 flex-grow-1">
                           <h6>Pete Sariya</h6>
                           <p class="mb-0">Web Designer</p>
                        </div>
                        <div class="dropdown">
                           <span class="dropdown-toggle" id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                           </span>
                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton16">
                              <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                              <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                              <a class="dropdown-item " href="javascript:void(0);">block</a>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>

         <div id="profile-profile" class="tab-pane fade">
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Profile</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="text-center">
                     <div class="user-profile">
                        <img src="{{asset('client-images/profile/photo/'.auth()->user()->profile_picture)}}" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                     </div>
                     <div class="mt-3">
                        <h3 class="d-inline-block">{{ auth()->user()->full_name  }}</h3>
                        <p class="d-inline-block pl-3"> - {{ auth()->user()->user_type  }}</p>
                        <p class="mb-0"><button class="btn btn-primary"  onclick="window.location.href='{{route('users.create')}}'">Edit</button></p>
                     </div>
                  </div>
               </div>
            </div>
            @if(auth()->user()->user_type == 'seller')
               @foreach (Session::get('seller') as $seller)
                  <div class="card">
                     <div class="card-header">
                        <div class="header-title">
                           <h4 class="card-title">Personal Information</h4>
                        </div>
                     </div>
                        <div class="card-body">
                           <div class="user-bio">
                              <h6 class="mb-1">Full Name:</h6>
                              <p>{{ $seller->last_name }}, {{ $seller->first_name }} {{ $seller->middle_name }}</p>
                           </div>
                           <div class="mt-2">
                           <h6 class="mb-1">Joined:</h6>
                           <p>{{ date('F d, Y', strtotime($seller->created_at)) }}</p>
                           </div>
                           <div class="mt-2">
                           <h6 class="mb-1">Address/Hometown:</h6>
                           <p>{{ $seller->province }}, {{ $seller->municipality }}, {{ $seller->barangay }}, {{ $seller->street }}, {{ $seller->zipcode }}</p>
                           </div>
                           <div class="mt-2">
                           <h6 class="mb-1">Birthdate:</h6>
                           <p><a href="#" class="text-body">{{ date('F d, Y', strtotime($seller->birthdate)) }}</a></p>
                           </div>
                           <div class="mt-2">
                           <h6 class="mb-1">Gender:</h6>
                           <p><a href="#" class="text-body" target="_blank">{{ $seller->gender }}</a></p>
                           </div>
                           <div class="mt-2">
                              <h6 class="mb-1">Civil Status:</h6>
                              <p><a href="#" class="text-body text-capitalize" target="_blank">{{ $seller->civil_status }}</a></p>
                              </div>
                           <div class="mt-2">
                           <h6 class="mb-1">Status:</h6>
                           <p><a href="#" class="text-body text-capitalize" style="color: red;">{{ $seller->status }} for Verification</a></p>
                           </div>
                        </div>
                     </div>

                     <div class="card">
                        <div class="card-header">
                           <div class="header-title">
                              <h4 class="card-title">Farm Information</h4>
                           </div>
                        </div>
                           <div class="card-body">
                              <div class="mt-2">
                                 <h6 class="mb-1">Farm Address</h6>
                                 <p>{{ $seller->farm_province }}, {{ $seller->farm_municipality }}, {{ $seller->farm_barangay }}, {{ $seller->farm_coordinates }}</p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Farm Size:</h6>
                                 <p>{{ $seller->farm_size }} SQM</p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Farm Type/s</h6>
                                 <p>{{ $seller->farm_type }}</p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Crops:</h6>
                                 <p><a href="#" class="text-body">{{ $seller->farm_crops }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Livestocks:</h6>
                                 <p><a href="#" class="text-body">{{ $seller->farm_livestocks }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Vegetables:</h6>
                                 <p><a href="#" class="text-body">{{ $seller->farm_vegetables }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Products:</h6>
                                 <p><a href="#" class="text-body">{{ $seller->farm_products }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Gross Harvest:</h6>
                                 <p><a href="#" class="text-body">{{ $seller->gross_harvest }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Net Harvest:</h6>
                                 <p><a href="#" class="text-body">{{ $seller->net_harvest }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Program Beneficiary:</h6>
                                 <p><a href="#" class="text-body" target="_blank">{{ $seller->beneficiary }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Program:</h6>
                                 <p><a href="#" class="text-body" target="_blank">{{ $seller->beneficiary_specify }}</a></p>
                              </div>
                              <div class="mt-2">
                                 <h6 class="mb-1">Aid Received:</h6>
                                 <p><a href="#" class="text-body text-capitalize" target="_blank">{{ $seller->aid_received }}</a></p>
                              </div>
                           </div>
                        </div>
                  @endforeach
               @endif
         </div>
         
      </div>
      </div>

      <div class="col-lg-3">
         
         <div class="card">
         <div class="card-header d-flex align-items-center justify-content-between">
            <div class="header-title">
               <h4 class="card-title">Gallery</h4>
            </div>
            <span>132 pics</span>
         </div>
         <div class="card-body">
            <div class="d-grid gap-card grid-cols-3">
               <a data-fslightbox="gallery" href="{{asset('images/icons/04.png')}}">
                  <img src="{{asset('images/icons/04.png')}}" class="img-fluid bg-soft-info rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/shapes/02.png')}}">
                  <img src="{{asset('images/shapes/02.png')}}" class="img-fluid bg-soft-primary rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/icons/08.png')}}">
                  <img src="{{asset('images/icons/08.png')}}" class="img-fluid bg-soft-info rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/shapes/04.png')}}">
                  <img src="{{asset('images/shapes/04.png')}}" class="img-fluid bg-soft-primary rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/icons/02.png')}}">
                  <img src="{{asset('images/icons/02.png')}}" class="img-fluid bg-soft-warning rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/shapes/06.png')}}">
                  <img src="{{asset('images/shapes/06.png')}}" class="img-fluid bg-soft-primary rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/icons/05.png')}}">
                  <img src="{{asset('images/icons/05.png')}}" class="img-fluid bg-soft-danger rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/shapes/04.png')}}">
                  <img src="{{asset('images/shapes/04.png')}}" class="img-fluid bg-soft-primary rounded" alt="profile-image">
               </a>
               <a data-fslightbox="gallery" href="{{asset('images/icons/01.png')}}">
                  <img src="{{asset('images/icons/01.png')}}" class="img-fluid bg-soft-success rounded" alt="profile-image">
               </a>
            </div>
         </div>
         </div>
      </div>
      
   </div>

   @include('partials.components.share-offcanvas')
</x-app-layout>
