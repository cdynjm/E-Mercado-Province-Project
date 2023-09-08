<?php
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
   //  $home = URL::to('/');
    $id = $id ?? null;
   // dd($data);
?>

@push('scripts')
   <script src = "{{asset('storage/js/list.js')}}"></script>
@endpush

<x-app-layout :assets="$assets ?? []">
   <div>
      
      @if(isset($id))
      {!! Form::model($data, ['route' => [$form.'.update', $id], 'method' => 'patch']) !!}
      <input type = "hidden" name = "hidID" value = "{{$id}}">
      @else
      {!! Form::open(['route' => [$form.'.store'], 'method' => 'post']) !!}
      @endif
      <div class="row">

         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$pageTitle}}</h4>
                  </div>
                  <div class="card-action">
                        {!! $headerAction !!}
                  </div>
               </div>
               <x-auth-validation-errors class="m-4" :errors="$errors" />
               <div class="card-body">
                  <div class="new-user-info">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="Title">Title: <span class="text-danger">*</span></label>
                                <input type = "text" id = "Title" value = "{{old('Title')}}" name = "Title" class = "form-control" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="Amount">Price per unit: <span class="text-danger">*</span></label>
                                <input type = "number" step=".01" id = "Amount" value = "{{old('Amount')}}" name = "Amount" class = "form-control">
                            </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 com-xs-6">
                                <label class="form-label" for="UOM">Unit: <span class="text-danger">*</span></label>
                                <select name="UOM" id="UOM" class="form-select">
                                    <option value = "0"></option>
                                    @foreach($uoms as $uom)
                                    <option value = "{{$aes->encrypt($uom->id)}}" <?=($aes->encrypt($uom->id)==old('UOM')?"Selected":"")?>>{{$uom->UnitName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                <label class="form-label" for="ProductType">Product Type: <span class="text-danger">*</span> <span id = "lblFarmType"></span></label>
                                <select name="ProductType" id="ProductType" class="form-select">
                                    <option value = ""></option>
                                    @foreach($farmtypes as $farmtype)
                                    <option value = "{{$aes->encrypt($farmtype->id)}}" <?=(old('ProductType')== $aes->encrypt($farmtype->id)?"Selected":"")?>>{{$farmtype->description}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                <label id = "outFarmType" class="form-label" for="ProductTypeSub">Product Kind: <span class="text-danger">*</span> <span id = "lblFarmTypeSub"></span></label>
                                <select name="ProductTypeSub" id="ProductTypeSub" class="form-select">
                                    @if (empty($farmsub))
                                    <option value = "">Select Product Type First</option>
                                    @else
                                    <option value = ""></option>
                                        @foreach($farmsub as $sub)
                                            <option value = "{{$aes->encrypt($sub->id)}}" <?=($aes->encrypt($sub->id)==old('ProductTypeSub')?"Selected":"")?>>{{$sub->description}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3 col-md-3 col-sm-6 com-xs-6">
                                <label class="form-label" for="Stocks">Stocks: <span class="text-danger">*</span></label>
                                <input type = "number" id = "Stocks" name = "Stocks" class = "form-control" value = "{{old('Stocks')}}">
                            </div>

                            

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 com-xs-6">
                                <div class="form-check form-switch form-check-inline mt-5">
                                    <input class="form-check-input" type="checkbox" value = "1" name = "switchstock" id="switchstock" <?=(old('switchstock')==1?"checked":"")?> />
                                    <label id = "lblSwitch" class="form-check-label pl-2" for="switchstock"><?=(old('switchstock')==1?"<span class = 'text-success'>Stocks are available</span>":"<span class = 'text-danger'>Products will be harvested soon!</span>")?></label> 
                                </div>
                            </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 com-xs-6" <?=(old('switchstock')==1?'style = "display:none"':"")?>  id = "divHarvestDate">
                                <label class="form-label" for="HarvestDate">Harvest Date: <span class="text-danger">*</span></label>
                                <input type = "month" id = "HarvestDate" name = "HarvestDate" class = "form-control">
                            </div>


                        </div>
                        <div class="row">
                           <div class="form-group col-md-12">
                              <label class="form-label" for="Description">Description: <span class="text-danger">*</span></label>
                              <textarea name = "Description" id = "Description" rows = "10" class = "form-control">{{old('Description')}}</textarea>
                           
                           </div>

                           <div class="form-group col-md-12">
                              <label class="form-label" for="remarks">Note:</label>
                              <textarea id = "remarks" name = "remarks" rows = "5" class = "form-control" placeholder = "Remarks" >{{old('remarks')}}</textarea>
                           </div>

                        

                           
                        </div>

                        <button type="submit" class="btn btn-primary">{{$buttonCaption }}</button>
                  </div>
               </div>
            </div>
         </div>
        </div>
        {!! Form::close() !!}
   </div>

@push('scripts')
    <script src="{{asset('storage/js/ckeditor5.js')}}"></script>
    <script>
        
        ClassicEditor
            .create(document.querySelector('#Description'),{
                toolbar: [
                    'heading', '|', 'bulletedList', 'numberedList', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
</x-app-layout>
