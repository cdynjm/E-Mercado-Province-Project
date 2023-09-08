@push('scripts')
   <script src = "{{asset('storage/js/order.js')}}"></script>
   <script src = "{{asset('storage/js/dashboard.js')}}"></script>
@endpush



<x-app-layout :assets="$assets ?? []">
      <div class="row">
         <?php
            $draft = 0;
            $final = 0;
            $total = 0;


            $confirmed = 0;
            $unprocess = 0;
            $totalOrders = 0;

            $totalTop5 = 0;
            $totalgross = 0;
         ?>
         @foreach($gross as $g)
            <?php
            $totalgross+=$g->totalPaid;
            ?>
         @endforeach
         @foreach($top5 as $top)
            <?php
            $totalTop5+=$top->countBuyer;
            ?>
         @endforeach

         @foreach($posts as $post)
            <?php
               $total += $post->countPost;
            ?>
            @if ($post->draft == 0)
               <?php
                  $draft = $post->countPost;
               ?>
            @elseif ($post->draft == 1)
               <?php
                  $final = $post->countPost;
               ?>
            @endif
         @endforeach

         @foreach($orders as $order)
            <?php
               $totalOrders += $order->countOrder;
            ?>
            @if ($order->orderstatus == 0)
               <?php
                  $unprocess = $order->countOrder;
               ?>
            @elseif ($order->orderstatus == 1)
               <?php
                  $confirmed = $order->countOrder;
               ?>
            @endif
         @endforeach

         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-02" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="{{$total}}" data-value="{{$final}}" data-type="percent">
                     
                     </div>
                     <div class="progress-detail">
                        <p  class="mb-2">POSTED</p>
                        <h4 class="counter">{{$final}}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-03" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="{{$total}}" data-value="{{$draft}}" data-type="percent">
                                                
                     </div>
                     <div class="progress-detail">
                        <p  class="mb-2">DRAFT</p>
                        <h4 class="counter">{{$draft}}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-04" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="{{$totalOrders}}" data-value="{{$unprocess}}" data-type="percent">
                        
                     </div>
                     <div class="progress-detail">
                        <p  class="mb-2">CONFIRMATION</p>
                        <h4 class="counter">{{$unprocess}}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class = "card"  data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-05" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="{{$totalOrders}}" data-value="{{$confirmed}}" data-type="percent">
                        
                     </div>
                     <div class="progress-detail">
                        <p  class="mb-2">CONFIRMED</p>
                        <h4 class="counter">{{$confirmed}}</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class = "row">
      <div class="col-md-12 col-lg-8">
         <div class="row">
            <div class="col-md-12">
               <div class="card" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">₱ {{number_format($totalgross, 2, '.',',')}}</h4>
                        <p class="mb-0">Gross Sales</p>
                     </div>
                     
                     <div class="dropdown">
                        
                        This Year
                       
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="d-main" class="d-main" value = "{{implode(',',$months_val)}}"></div>
                  </div>
               </div>
            </div>
            <!-- <div class="col-md-12 col-lg-6">
               <div class="card" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Earnings</h4>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-secondary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div id="myChart" class="col-md-8 col-lg-8 myChart"></div>
                        <div class="d-grid gap col-md-4 col-lg-4">
                           <div class="d-flex align-items-start">
                              <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="#3a57e8">
                                 <g id="Solid dot">
                                    <circle id="Ellipse 67" cx="12" cy="12" r="8" fill="#3a57e8"></circle>
                                 </g>
                              </svg>
                              <div class="ms-3">
                                 <span class="text-secondary">Fashion</span>
                                 <h6>251K</h6>
                              </div>
                           </div>
                           <div class="d-flex align-items-start">
                              <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="#4bc7d2">
                                 <g id="Solid dot1">
                                    <circle id="Ellipse 68" cx="12" cy="12" r="8" fill="#4bc7d2"></circle>
                                 </g>
                              </svg>
                              <div class="ms-3">
                                 <span class="text-secondary">Accessories</span>
                                 <h6>176K</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- <div class="col-md-12 col-lg-6">
               <div class="card" data-aos="fade-up" data-aos-delay="1200">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Conversions</h4>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-secondary dropdown-toggle" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="d-activity" class="d-activity"></div>
                  </div>
               </div>
            </div> -->
            <div class="col-md-12 col-lg-12">
               <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title mb-2">TOP 5 BUYER</h4>
                        <p class="mb-0"></p>
                     </div>
                     
                  </div>
                  <div class="card-body p-0">
                     <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                           <thead>
                              <tr>
                                 <th>NAME</th>
                                 <th>ADDRESS</th>
                                 <th>BOUGHT</th>
                                 <th>PERCENTAGE</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach($top5 as $top)
                              <tr>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       
                                       <h6>{{$top->buyer->first_name . ' ' .$top->buyer->last_name}}</h6>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       
                                       <h6>{{$top->buyer->Barangay->brgyDesc . ', ' .ucwords(strtolower($top->buyer->Municipality->citymunDesc)). ', ' .ucwords(strtolower($top->buyer->Province->provDesc))}}</h6>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       {{$top->countBuyer}}
                                    </div>
                                 </td>
                                 <td>
                                    <div class="d-flex align-items-center mb-2">
                                       <h6>{{($top->countBuyer/$totalTop5)*100}}%</h6>
                                    </div>
                                    <div class="progress bg-soft-primary shadow-none w-100" style="height: 4px">
                                       <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="{{($top->countBuyer/$totalTop5)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </td>
                              </tr>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-lg-4">
         <div class="row">
            <div class="col-md-12 col-lg-12">
               <div class="card" data-aos="fade-up" data-aos-delay="400">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title mb-2">Your rating</h4>
                        
                     </div>
                  </div>
                  <div class="card-body">
                     
                     <h2 class="m-2"><i data-star="{{$rating->rating}}"></i></h2>
                     <span class="m-2">{{($rating->rating==0?0:$rating->rating)}} ratings</span>
                  </div>
               </div>
            </div>

            <div class="col-md-12 col-lg-12">
               <div class="card" data-aos="fade-up" data-aos-delay="400">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title mb-2">Activity overview</h4>
                        
                     </div>
                  </div>
                  <div class="card-body">

                     @foreach($logs as $log)
                     <div class=" d-flex profile-media align-items-top mb-2">
                        <div class="profile-dots-pills border-primary mt-1"></div>
                        <div class="ms-4">

                           <h6 class=" mb-1">{{$log->headertitle}}</h6>
                           <span class="mb-0">{{$log->created_at}}</span>

                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
