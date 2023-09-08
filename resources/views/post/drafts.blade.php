<?php
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
    $id = $id ?? null;
?>
<style>


/*
source
http://stackoverflow.com/a/23935891/3853728
*/

.img-wrapper {
  position: relative;
}

.img-responsive {
  width: 100%;
  height: auto;
}

.img-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  text-align: center;
}

.img-overlay:before {
  content: ' ';
  display: block;
  /* adjust 'height' to position overlay content vertically */
  height: 50%;
}

</style>
@push('scripts')
   <script src = "{{asset('storage/js/seller.js')}}"></script>
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
                    <hr>
                    <div class="card-body">
                        <div class="new-user-info">
                            @if (sizeof($drafts) <= 0)
                            No draft post found.
                            @else
                            @foreach($drafts as $draft)
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">

                                    @if (count($draft->images) <= 0)
                                        <div class = "img-wrapper">
                                            <div class="img-overlay">
                                                
                                            <a href = "#" class = "btn btn-success btn-sm addimage" data-value = "{{$aes->encrypt($draft->id)}}" data-bs-toggle="modal" data-bs-target="#modalUpload" ><i class = "fa fa-plus"></i> ADD IMAGE</a>
                                            </div>
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
                                                
                                                <div class="carousel-item {{$active}}">
                                                    <img src = "{{asset('storage/post/'.$draft->SellerID.'/size500/'.$img->FileName)}}">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5></h5>
                                                        <p></p>
                                                    </div>
                                                    <br><a href = "#"><i class = "fa fa-trash text-danger"></i> REMOVE IMAGE</a> | <a href = "#" class = "addimage" data-value = "{{$aes->encrypt($draft->id)}}" data-bs-toggle="modal" data-bs-target="#modalUpload" ><i class = "fa fa-plus text-success"></i> ADD IMAGE</a>
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
                                        <div class="header-title">
                                            <h5 class="card-title">{{$draft->Title}}</h5>
                                            <label class = 'mt-2'>Category: {!! '<a href = "#" class = "">'.$draft->producttype->description .'</a> / <a href = "#" class = "">' . $draft->kind->description .'</a>' !!}</span></label>
                                        </div>
                                        <div class="card-action">
                                            <i class = 'fa fa-trash text-danger'></i> <i class = 'fa fa-edit text-success mt-2'></i> 
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class = 'h2 text-warning'>₱ {{number_format(str_replace(',','',$draft->Amount),2,'.',',')}}</div>
                                        <div class = ''>
                                            @if ($draft->StockAvailable == 1)
                                                <span class = 'text-success'>Stocks are available</span><br>
                                                <span class = 'text-dark'>Remaining: {{$draft->Stocks . ' ' . $draft->unit->UnitName}}</span>
                                            @else
                                            <span class = 'text-danger'>Stocks will be available on {{date('F, Y', strtotime($draft->AvailableDate))}}</span><br>
                                                <span class = 'text-dark'>Target yield: {{$draft->Stocks . ' ' . $draft->unit->UnitName}}</span>
                                            @endif
                                        </div>

                                        <div class = "row mt-3">
                                            <div class="form-group">
                                                <a href = "#" pid = "{{$aes->encrypt($draft->id, auth()->user()->secretkey)}}" class = "btn btn-sm btn-warning postpublish"><i class = 'fa fa-globe'></i> publish</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <h6 class = "mb-2">Product description of {{$draft->Title}}</h6>
                                    {!! $draft->Description !!}
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
    </div>

    <div class="modal fade" id="modalUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Upload Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">

                    @csrf
                    <input type = "hidden" name = "hidID" id = "hidID">
                    <div class="row">
                        <div class="col-md-12">
                            <br/>
                            <input type="file" name="image" class="form-control image" accept = "image/png, image/jpeg">
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
            </div>
        </div>
    </div>

</x-app-layout>
