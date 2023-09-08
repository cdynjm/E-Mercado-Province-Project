<!-- The Modal -->
<div class="modal fade" id="createprogramModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-program'></div>
                    <div class="alert alert-success" style="display: none;" id="status-program"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="programname" class="form-label">Program Name <span class="text-danger">*</span></label>
                                    <input id="programname" class="form-control" type="text" placeholder="" required>
                                </div>
                            </div>

                            <input type='hidden' id="updateid"  name="updateid" value="" class="form-control">

                            <div class="d-flex justify-content-center">
                                <button type="submit" id='registerprogram' class="btn btn-success"> Add Program</button>
                                <button type="submit" id='updateprogram' class="btn btn-success"> Update Program</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> 