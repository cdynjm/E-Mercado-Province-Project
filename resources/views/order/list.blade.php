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
                                    <a data-id = "{{$aes->encrypt($order->id, auth()->user()->secretkey)}}" href = "#" class = "mb-2 btn btn-danger btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#cancelmodalseller">CANCEL ORDER</a>
                                    <a pid = "{{$aes->encrypt($order->id, auth()->user()->secretkey)}}" href = "#" class = "mb-2 btn btn-success btn-sm mt-2 orderconfirm">CONFIRM ORDER</a>
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
