<!-- The Modal -->
<div class="modal fade" id="createaidModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-aid'></div>
                    <div class="alert alert-success" style="display: none;" id="status-aid"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="aiddescription" class="form-label">Aid Description <span class="text-danger">*</span></label>
                                    <input id="aiddescription" class="form-control" type="text" placeholder="" required>
                                </div>
                            </div>

                            <input type='hidden' id="updateid"  name="updateid" value="" class="form-control">

                            <div class="d-flex justify-content-center">
                                <button type="submit" id='registeraid' class="btn btn-success"> Add Aid</button>
                                <button type="submit" id='updateaid' class="btn btn-success"> Update Aid</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> 