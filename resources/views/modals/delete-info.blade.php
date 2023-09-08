<!-- The Modal -->
<div class="modal fade" id="deleteinfoModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-delete'></div>
                    <div class="alert alert-success" style="display: none;" id="status-delete"></div>
                        <div class="row">
                            <input type='hidden' id="deleteid"  name="deleteid" value="" class="form-control">
                            <div id="delete-info" class="d-flex mb-4 fs-4"></div>
                            
                            <div class="col-lg-12">
                                <div class="form-group" id="form-password">
                                    <label for="delete-password" class="form-label fs-10"> Please enter your password to confirm account deletion <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" placeholder="Enter Password" id="delete-password" name="password" required autocomplete="new-password" >
                                    <center><small><label for="" class="form-label text-danger" id="verify-password-msg"></label></small></center>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" id='deleteadmin' class="btn btn-danger"> Delete</button>
                                <button type="submit" id='deletefarm' class="btn btn-danger"> Delete</button>
                                <button type="submit" id='deleteproduct' class="btn btn-danger"> Delete</button>
                                <button type="submit" id='deleteaid' class="btn btn-danger"> Delete</button>
                                <button type="submit" id='deletebuyer' class="btn btn-danger"> Delete</button>
                                <button type="submit" id='deleteseller' class="btn btn-danger"> Delete</button>
                                 <button type="submit" id='deleteprogram' class="btn btn-danger"> Delete</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> 