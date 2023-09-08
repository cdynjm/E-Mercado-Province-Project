<?php
    use App\Http\Controllers\AESCipher;
    use App\Http\Controllers\GlobalDeclare;
    $global = new GlobalDeclare();
    $aes = new AESCipher();
    $id = $id ?? null;
?>

@push('scripts')
   <script src = "{{asset('storage/js/action.js')}}"></script>
   <script src = "{{asset('storage/js/seller.js')}}"></script>
   <script src = "{{asset('storage/js/buyer.js')}}"></script>
   <script src = "{{asset('storage/js/login.js')}}"></script>
@endpush

<x-app-layout layout="simple" :assets="$assets ?? []">
    <span class="uisheet screen-darken"></span>

    @include('partials.guestbanner')
    <div class="row m-2">
        @if(!$global->isMobile())
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="bd-aside card iq-document-card sticky-xl-top text-muted align-self-start mb-5 mt-n5" id="left-side-bar">
                <div class="row m-2">
                    <h2 class="h6 pb-2 border-bottom">Categories</h2>
                   
                    <ul class="list-unstyled mb-0">
                        @foreach($categories as $cat)
                        <li class="mt-2">
                        <a href = "{{route('search.category', ['searchstring' => $cat->description])}}">{{$cat->description}}</a>
                        </li>
                        @endforeach
                    </ul>
                   
                </div>

                <div class="row m-2">
                    <h2 class="h6 pt-3 border-top">Price Watch</h2>
                </div>

            </div>

        </div>
        
       

        @endif
        <div class="col-lg-9  col-md-9 col-sm-12" <?=($global->isMobile()?'style = "margin-left: 10px; width: 97%"':'')?>>
            @if (sizeof($posteds) <= 0)
            <div class = "m-5">
                <h5>{{$str ?? ''}}</h5>
                <p>0 item for {{$str ?? ''}}</p>
            </div>
            <div class = "text-center m-5">
                <h3 class = "mb-3">Search No Result</h3>
                <p>We're sorry. We cannot find any matches for your search term.</p>
                <i style = "font-size: 100px" class = 'fas fa-search'></i>
            </div>
            
            @else
                @if (isset($results))
                <aside class=" bd-aside card iq-document-card text-muted align-self-start" >
                    <div class = "">
                        <p class = "text-primary">{{$results}} {{($results==1?"item":"items")}} found for "{{$str}}"</p>
                    </div>
                </aside>
                @endif
                @foreach($posteds as $draft)
            
                    <aside class=" bd-aside card iq-document-card text-muted align-self-start" >
                        
                        <div class="row">
                            <div class="col-lg-4 col-sm-12">

                                @if (count($draft->images) <= 0)
                                    <div class = "img-wrapper">
                                        <img class = "img-responsive" width = "100%" src = "{{asset('images/no-photo.jpg')}}">
                                    </div>
                                @else
                                <div class="bd-example">

                                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <?php
                                                $ctr = 0;
                                            ?>
                                            @foreach($draft->images as $img)
                                            <?php
                                                $active = "";
                                                if ($ctr == 0){
                                                    $active = "active";
                                                }
                                            ?>
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$ctr}}" class="{{$active }}" aria-label="Slide 1"></button>
                                            <?php
                                                $ctr++;
                                            ?>
                                            @endforeach
                                        </div>
                                        <div class="carousel-inner">
                                            <?php
                                                $ctr = 0;
                                            ?>
                                            @foreach($draft->images as $img)
                                            <?php
                                                $active = "";
                                                if ($ctr == 0){
                                                    $active = "active";
                                                }
                                            ?>
                                            
                                            <div class="carousel-item {{$active}}" style = "height: 300px">
                                                <img src = "{{asset('storage/post/'.$draft->SellerID.'/size500/'.$img->FileName)}}">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5></h5>
                                                    <p></p>
                                                </div>
                                                
                                            </div>
                                        
                                            <?php
                                                $ctr++;
                                            ?>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="col-lg-8 col-sm-12">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-titled">
                                        <h5 class="card-title"><a class = "link-primary text-dark" href="{{route('public.view',['id' =>$draft->slug_name])}}">{{$draft->Title}}</a></h5>
                                        <label class = 'mt-2'>Category: <a href = "{{route('search.category', ['searchstring' => $draft->producttype->description])}}" class = "link text-primary">{{$draft->producttype->description}}</a> / <a href = "{{route('search.subcategory', ['searchstring' => $draft->kind->description])}}" class = "link text-primary">{{$draft->kind->description}}</a></span></label>
                                        
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="header-title">
                                            <i data-star="{{$draft->ratings->avg('star_rating')}}"></i> {{$draft->ratings->sum('star_rating')}} ratings
                                            </div>

                                            <div class="card-action">
                                                
                                                <a href = "#" class = "text-danger" data-share = "{{$app->make('url')->to('/').'/share/product/'.$draft->slug_name}}"  data-bs-toggle="modal" data-bs-target="#modalshare">
                                                    <i class = 'fa fa-share-alt'></i>
                                                </a>

                                                @if (auth()->check() && auth()->user()->user_type == "buyer")
                                                    @if (empty($draft->fav))
                                                    <a href = "#" pid = "{{$aes->encrypt($draft->id, auth()->user()->secretkey)}}" class = "fav"><i class = 'far fa-heart text-success'></i></a>
                                                    @else
                                                    <a href = "#" pid = "{{$aes->encrypt($draft->id, auth()->user()->secretkey)}}" class = "fav"><i class = 'fas fa-heart text-danger'></i></a>
                                                    @endif
                                                
                                                @else
                                                    @if (auth()->check() && auth()->user()->user_type == "seller")   
                                                    @else
                                                    <a href = "#" class = ""  data-bs-toggle="modal" data-bs-target="#modallogin"><i class = 'fa fa-heart-o text-success'></i></a>
                                                    @endif
                                                @endif

                                                @if (auth()->check() && auth()->user()->user_type == "buyer")
                                                    <a href = "/chatify/{{$global->base64encode($draft->user2->id)}}" class = "badge bg-warning text-white"><i class = 'fa fa-send' style = "margin-right: 5px"></i> chat the seller</a>
                                                @else
                                                    @if (auth()->check() && auth()->user()->user_type == "seller")   
                                                    @else
                                                    <a href = "#" class = "badge bg-warning text-white"  data-bs-toggle="modal" data-bs-target="#modallogin"><i class = 'fa fa-send' style = "margin-right: 5px"></i> chat the seller</a>
                                                    @endif
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div><span class = 'h2 text-warning'>₱ {{number_format(str_replace(',','',$draft->Amount),2,'.',',')}} </span> /{{$draft->unit->UnitName}}</div>
                                    <div class = ''>
                                        @if ($draft->StockAvailable == 1)
                                            <span class = 'text-success'>Stocks are available</span><br>
                                            <span class = 'text-dark'>Remaining: {{$draft->Stocks . ' ' . $draft->unit->UnitName}}</span>
                                        @else
                                            <span class = 'text-danger'>Stocks will be available on {{date('F, Y', strtotime($draft->AvailableDate))}}</span><br>
                                            <span class = 'text-dark'>Target yield: {{$draft->Stocks . ' ' . $draft->unit->UnitName}}</span>
                                        @endif
                                        <div class = "mt-2"><i class = "fas fa-store"></i> <a href = "{{route('search.seller', ['searchstring' => $aes->encrypt($draft->SellerID), 'store' => $aes->encrypt($draft->user2->name)])}}" class = "link text-primary">{{$draft->user2->name}}</a></div>
                                        <div style = "margin-left: 3px"><i class = "fas fa-map-marker-alt"></i>&nbsp;
                                        <a href = "{{route('search.barangay', ['searchstring' => $aes->encrypt($draft->seller->barangay), 'area' => $aes->encrypt(ucwords(strtolower($draft->seller->Barangay->brgyDesc)))])}}" class = "link text-primary">{{ucwords(strtolower($draft->seller->Barangay->brgyDesc))}}</a>, 
                                        <a href = "{{route('search.municipality', ['searchstring' => $aes->encrypt($draft->seller->municipality), 'area' => $aes->encrypt(ucwords(strtolower($draft->seller->Municipality->citymunDesc)))])}}" class = "link text-primary">{{ucwords(strtolower($draft->seller->Municipality->citymunDesc))}}</a>, 
                                        <a href = "{{route('search.province', ['searchstring' => $aes->encrypt($draft->seller->province), 'area' => $aes->encrypt(ucwords(strtolower($draft->seller->Province->provDesc)))])}}" class = "link text-primary">{{ucwords(strtolower($draft->seller->Province->provDesc))}}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <h6 class = "mb-2">Product description of {{$draft->Title}}</h6>

                                <div class="d-flex justify-content-between">
                                    <div class="header-title">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($draft->Description), 100) !!}
                                    </div>
                                    <div class="card-action">
                                        
                                        <a href="{{route('public.view',['id' =>$draft->slug_name])}}" class="btn btn-info btn-sm">Read More</a>
                                        
                                    </div>
                                </div>

                            
                            
                            </div>
                        </div>
                    </aside>
                    <br>
                @endforeach
                {{$posteds->links()}}

            @endif
        </div>
        <div class="col-1"></div>
    </div>
</x-app-layout>
