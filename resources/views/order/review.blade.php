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
            
            <div class="col-lg-12 col-sm-12">
            
                <div class = "card">
                    <div class="card-body">
                        @if (sizeof($lists)<=0)
                        There are no orders to review.
                        @else
                        @foreach($lists as $order)
                            
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
                                    <div class = "mt-1  text-sm" style = "font-size: 13px">Seller: {!! '<a href = "#" class = "link text-primary">'.$order->user2->name .'</a>' !!}</span></div>
                                    <a data-id = "{{$aes->encrypt($order->id, auth()->user()->secretkey)}}" href = "#" class = "mb-2 btn btn-success btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#reviewmodalbuyer">WRITE A REVIEW</a>
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
           
        </div>
    </div>
    @include('modals.review')
</x-app-layout>
