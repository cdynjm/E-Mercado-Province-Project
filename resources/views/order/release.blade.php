<?php
    use App\Http\Controllers\AESCipher;
    use App\Http\Controllers\GlobalDeclare;
    $aes = new AESCipher();
    $global = new GlobalDeclare();
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
            
                <div class = "card">
                    <div class="card-body">
                        @if (sizeof($orders)<=0)
                        There are no orders placed yet.
                        @else
                        @foreach($orders as $order)
                            
                            <div class="row">
                                <div class="col-lg-2 col-sm-4">
                                    @if(sizeof($order->product->images) <= 0)
                                        <img class = "img-responsive" width = "100%" src = "{{asset('images/no-photo.jpg')}}">
                                    @else
                                        <img width = "100%" src = "{{asset('storage/post/'.$order->SellerID.'/thumbnail/'.$order->product->images[0]->FileName)}}">
                                    @endif
                            
                                </div>
                                <div class="col-lg-7 col-sm-8">
                                    <span class = 'text-dark'>{{$order->product->Title}}</span>
                                    <div class = "mt-1  text-sm" style = "font-size: 12px">Category: {!! '<a href = "#" class = "link text-primary">'.$order->product->producttype->description .'</a> / <a href = "#" class = "link text-primary">' . $order->product->kind->description .'</a>' !!}</span></div>
                                    <div class = "mt-1  text-sm" style = "font-size: 13px">Buyer: {!! '<a href = "#" class = "link text-primary">'.$order->buyer->first_name . ' ' . $order->buyer->last_name .'</a>' !!}</span></div>
                                    

                                    <div class=" d-flex justify-content-between">
                                        <div class="">
                                            <a data-id = "{{$aes->encrypt($order->id, auth()->user()->secretkey)}}" href = "#" class = "mb-2 btn btn-danger btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#cancelmodalseller">CANCEL ORDER</a>
                                            <a href = "/chatify/{{$global->base64encode($order->userbuyer->id)}}" class = "mb-2 btn btn-warning btn-sm mt-2">
                                                <svg width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                                    <path d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z" fill="currentColor"></path>                            
                                                </svg>                        
                                                CHAT THE BUYER
                                            </a>
                                        </div>
                                        <div class="">
                                            <a oid = "{{$aes->encrypt($order->id, auth()->user()->secretkey)}}" href = "#" class = "mb-2 btn btn-success btn-sm mt-2 doneorder"><i class = "far fa-thumbs-up "></i> DONE</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-sm-12 mt-2">
                                    <div class = "text-warning h5" style = "text-align: right">₱ {{number_format($order->Amount*$order->qty, 2, '.', ',')}}</div>
                                    <div class = "text-secondary" style = "text-align: right; font-size: 12px">{{'₱ '.number_format($order->Amount, 2, '.', ',').' /'.$order->product->unit->UnitName. ' x ' .$order->qty }}</div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        @endif
                    </div>
                </div>
                        
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
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.cancelseller')
</x-app-layout>
