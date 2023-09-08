<!-- The Modal -->
<div class="modal fade" id="createfarmtypeModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-farmproduct'></div>
                    <div class="alert alert-success" style="display: none;" id="status-farmproduct"></div>
                        <div class="row">
                           <div class="col-lg-12">
                                <div class="form-group">
                                <label for="farmtype" class="form-label">Select Farm <span class = "text-danger">*</span></label>
                                <select name="farmtype" id="farmtype" class="form-select" required>
                                        @foreach ($farmtypes as $ft)
                                        <option value = "{{$aes->encrypt($ft->id)}}">{{ $ft->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  

                            <input type='hidden' id="updateid"  name="updateid" value="" class="form-control">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="productdescription" class="form-label">Farm Product Description <span class="text-danger">*</span></label>
                                    <input id="productdescription" class="form-control" type="text" placeholder="" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" id='registerfarmproduct' class="btn btn-success"> Add Product</button>
                                <button type="submit" id='updatefarmproduct' class="btn btn-success"> Update Product</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> 