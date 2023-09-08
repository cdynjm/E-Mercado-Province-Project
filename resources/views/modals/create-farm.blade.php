<!-- The Modal -->
<div class="modal fade" id="createfarmModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-farm'></div>
                    <div class="alert alert-success" style="display: none;" id="status-farm"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="farmdescription" class="form-label">Farm Description <span class="text-danger">*</span></label>
                                    <input id="farmdescription" class="form-control" type="text" placeholder="" required>
                                </div>
                            </div>

                            <input type='hidden' id="updateid"  name="updateid" value="" class="form-control">

                            <div class="d-flex justify-content-center">
                                <button type="submit" id='registerfarm' class="btn btn-success">Create Farm</button>
                                <button type="submit" id='updatefarm' class="btn btn-success">Update Farm</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> 