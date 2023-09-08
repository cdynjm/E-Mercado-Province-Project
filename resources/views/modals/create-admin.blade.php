<!-- The Modal -->
<div class="modal fade" id="createadminModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-municipal'></div>
                    <div class="alert alert-success" style="display: none;" id="status-municipal"></div>

                        <form id="createAdminForm" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="province" class="form-label">Province</label>
                                <input id="province"  name="province" value='Southern Leyte' class="form-control" type="text" placeholder=""  readonly >
                                </div>
                            </div> 

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="Municipality" class="form-label">Municipality <span class = "text-danger">*</span></label>
                                @if (empty($Municipalties))
                                    <div class = 'alert bg-rgba-danger'>No municipalities found!</div>
                                @else
                                        <select name="Municipality" id="Municipality" class="form-select" required>
                                            <option value = ""></option>
                                            @foreach($Municipalties as $mun)
                                                <option muncode = "{{$aes->encrypt($mun->citymunCode)}}" value = "{{$aes->encrypt($mun->citymunCode)}}" <?=(old('Municipality')==$aes->encrypt($mun->citymunCode)?"Selected":"")?>>{{ucwords(strtolower($mun->citymunDesc))}}</option>
                                            @endforeach
                                        </select>
                                @endif
                                
                                </div>
                            </div>

                            <input type='hidden' id="MunCode"  name="MunCode" value="{{old('MunCode')}}" class="form-control">
                            <input type='hidden' id="updateid"  name="updateid" value="" class="form-control">     

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input id="lastname" class="form-control" type="text" placeholder=" " name="lastname" value="{{old('lastname')}}" required>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input id="firstname" class="form-control" type="text" placeholder=" " name="firstname" value="{{old('firstname')}}" required>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input id="username" class="form-control" type="text" placeholder=" " name="username" value="{{old('username')}}" required>
                                    <center><small><label for="" class="form-label text-danger" id="verify-username-msg"></label></small></center>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password" id="password-text" class="form-label"> <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" placeholder=" " id="password" name="password" required autocomplete="new-password" >
                                    <center><small><label for="" class="form-label text-danger" id="verify-password-msg"></label></small></center>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="confirm_password" id="password-confirm-text" class="form-label"> <span class="text-danger">*</span></label>
                                    <input id="confirm_password" class="form-control" type="password" placeholder=" " name="password_confirmation" required >
                                </div>
                            </div>

                            <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="profile_photo" class="form-label">Upload Profile Picture <span class = "text-danger">*</span></label>
                                    <input id = "profile_photo"  name="profile_photo" value="{{old('profile_photo')}}" onchange="viewPhoto(this);" class="form-control" type="file" placeholder=" " accept=".jpg, .png, .webp, .jpeg" required  >
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <img id="profile-picture" style="width: 200px; height: 200px; border-radius: 5px;" src="https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" alt="" />
                                 </div>
                              </div> 

                            <div class="d-flex justify-content-center">
                                <button type="submit" id='registeradmin' class="btn btn-success">Register Account</button>
                                <button type="submit" id='updateadmin' class="btn btn-success">Update Account</button>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 