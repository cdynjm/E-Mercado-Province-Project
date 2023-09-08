<?php
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    $id = $id ?? null;
?>

@push('scripts')
   <script src = "{{asset('storage/js/action.js')}}"></script>
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
            
            <div class="col-lg-12 col-sm-12">
                @if (sizeof($carts) <= 0)
                <div class="row">

                    <div class="col-12">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    No item in your cart.
                                </div>
                                <div class="card-action">
                                        
                                </div>
                            </div>
                            
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">

                    <div class="col-12">
                        <div class="card "> 
                            <div class="card-body">
                               
                                @foreach($carts as $cart)
                                    
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-4">
                                            @if(empty($cart->product->images))
                                                <img class = "img-responsive" width = "100%" src = "{{asset('images/no-photo.jpg')}}">
                                            @else
                                                <img width = "100%" src = "{{asset('storage/post/'.$cart->SellerID.'/thumbnail/'.$cart->product->images[0]->FileName)}}">
                                            @endif
                                    
                                        </div>
                                        <div class="col-lg-7 col-sm-8">
                                            <span class = 'text-dark'>{{$cart->product->Title}}</span>
                                            <div class = "mt-1  text-sm" style = "font-size: 12px">Category: {!! '<a href = "#" class = "link text-primary">'.$cart->product->producttype->description .'</a> / <a href = "#" class = "link text-primary">' . $cart->product->kind->description .'</a>' !!}</span></div>
                                            <div class = "mt-3"><i class = "fa fa-calendar"></i> Date cancelled: {{date('F j, Y H:i:s', strtotime($cart->created_at))}}</div>
                                            
                                            <div class = "mt-3"><i class = "far fa-file-alt"></i> {{($cart->userrole=="buyer"?"Buyer ":"")}}Reason: <span class = "text-danger">{{$cart->notes}}</span></div>
                                        </div>
                                        <div class="col-lg-3 col-sm-12 mt-2">
                                            <div class = "text-warning h5" style = "text-align: right">₱ {{number_format($cart->Amount*$cart->qty, 2, '.', ',')}}</div>
                                            <div class = "text-secondary" style = "text-align: right; font-size: 12px">{{'₱ '.number_format($cart->Amount, 2, '.', ',').' /'.$cart->product->unit->UnitName. ' x ' .$cart->qty }}</div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                        
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
