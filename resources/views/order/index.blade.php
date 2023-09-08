<?php
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    $id = $id ?? null;
?>

@push('scripts')
   <script src = "{{asset('storage/js/order.js')}}"></script>
@endpush

<x-app-layout :assets="$assets ?? []">
    <div>
      
        <div class="row">

            <div class="col-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{$pageTitle}}</h4>
                        </div>
                        <div class="card-action">
                                {!! $headerAction !!}
                        </div>
                    </div>
                    
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="row">
            
            <div class="col-lg-8 col-sm-12">
            
                @foreach($ordersgrp as $grp)
                
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor"></path> 
                                    </svg>                        
                                    More from <a href = "{{route('search.seller', ['searchstring' => $aes->encrypt($grp->SellerID), 'store' => $aes->encrypt($grp->user2->name)])}}" class = "link text-primary">{{$grp->user2->name}}</a>                             
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                        <path d="M16.6308 13.131C16.5743 13.189 16.3609 13.437 16.1622 13.641C14.9971 14.924 11.9576 17.024 10.3668 17.665C10.1252 17.768 9.51437 17.986 9.18802 18C8.8753 18 8.5772 17.928 8.29274 17.782C7.93814 17.578 7.65368 17.257 7.49781 16.878C7.39747 16.615 7.2416 15.828 7.2416 15.814C7.08573 14.953 7 13.554 7 12.008C7 10.535 7.08573 9.193 7.21335 8.319C7.22796 8.305 7.38383 7.327 7.55431 6.992C7.86702 6.38 8.47784 6 9.13151 6H9.18802C9.61374 6.015 10.509 6.395 10.509 6.409C12.0141 7.051 14.9834 9.048 16.1768 10.375C16.1768 10.375 16.5129 10.716 16.659 10.929C16.887 11.235 17 11.614 17 11.993C17 12.416 16.8724 12.81 16.6308 13.131Z" fill="currentColor"></path>                            
                                    </svg>                        
                                
                                </div>
                                
                            </div>
                            <hr>
                            <div class="card-body">
                                @foreach($orders as $order)
                                    @if ($grp->SellerID == $order->SellerID)
                                    <div class="row mb-3">
                                        <div class="col-lg-2 col-sm-4">
                                            @if(sizeof($order->product->images) <= 0)
                                                <img class = "img-responsive" width = "100%" src = "{{asset('images/no-photo.jpg')}}">
                                            @else
                                                <img width = "100%" src = "{{asset('storage/post/'.$order->SellerID.'/thumbnail/'.$order->product->images[0]->FileName)}}">
                                            @endif
                                    
                                        </div>
                                        
                                        <div class="col-lg-7 col-sm-8">
                                            <span class = 'text-dark'>{{$order->product->Title}}</span>
                                            <div class = "mt-1  text-sm" style = "font-size: 12px">Category: 
                                            <a href = "{{route('search.category', ['searchstring' => $order->product->producttype->description])}}" class = "link text-primary">{{$order->product->producttype->description}}</a> / 
                                            <a href = "{{route('search.subcategory', ['searchstring' => $order->product->kind->description])}}" class = "link text-primary">{{$order->product->kind->description}}</a>
                                            </div>
                                            <div class = "mt-2  text-sm" style = "font-size: 14px"><i class = "fa fa-map-marker"></i> 
                                            <a href = "{{route('search.barangay', ['searchstring' => $aes->encrypt($order->seller->barangay), 'area' => $aes->encrypt(ucwords(strtolower($order->seller->Barangay->brgyDesc)))])}}" class = "link text-primary">{{ucwords(strtolower($order->seller->Barangay->brgyDesc))}}</a>, 
                                            <a href = "{{route('search.municipality', ['searchstring' => $aes->encrypt($order->seller->municipality), 'area' => $aes->encrypt(ucwords(strtolower($order->seller->Municipality->citymunDesc)))])}}" class = "link text-primary">{{ucwords(strtolower($order->seller->Municipality->citymunDesc))}}</a>, 
                                            <a href = "{{route('search.province', ['searchstring' => $aes->encrypt($order->seller->province), 'area' => $aes->encrypt(ucwords(strtolower($order->seller->Province->provDesc)))])}}" class = "link text-primary">{{ucwords(strtolower($order->seller->Province->provDesc))}}</a>
                                            </div>
                                            <div class = "mt-2  text-sm" style = "font-size: 12px"><i class = "fa fa-calendar"></i> Date placed: {{date('F j, Y', strtotime($order->created_at))}}</div>
                                            <div>
                                                <a href = "#" data-id = "{{$aes->encrypt($order->id, auth()->user()->secretkey)}}" data-bs-toggle="modal" data-bs-target="#cancelmodal" class = "mb-2 btn btn-danger btn-sm mt-2">CANCEL ORDER</a>
                                        
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-12 mt-2">
                                            <div class = "text-warning h5" style = "text-align: right">₱ {{number_format($order->Amount*$order->qty, 2, '.', ',')}}</div>
                                            <div class = "text-secondary" style = "text-align: right; font-size: 12px">{{'₱ '.number_format($order->Amount, 2, '.', ',').' /'.$order->product->unit->UnitName. ' x ' .$order->qty }}</div>
                                        </div>
                                    </div><hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                    
                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>                            
                                        </svg>                                              
                                        Order Summary
                                    
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="card-body">
                                    <?php   
                                        $sum = 0;
                                    ?>      
                                    @foreach($orders as $order)
                                        <div class="d-flex justify-content-between">
                                            <div class="header-title">
                                               Item
                                            </div>
                                            <div class="card-action text-warning">
                                                ₱ {{number_format($order->Amount*$order->qty, 2, '.', ',')}}
                                            </div>
                                        </div>
                                       <?php
                                            $sum += $order->Amount*$order->qty;
                                       ?>
                                    @endforeach
                                    <hr>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="header-title">
                                            Total
                                        </div>
                                        <div class="card-action text-warning">
                                            ₱ {{number_format($sum, 2, '.', ',')}}
                                        </div>
                                    </div>
                                    
                                    <span class = "text-danger small">Cancellation of orders will only be available if the seller did not confirm your order.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.cancel')
</x-app-layout>
