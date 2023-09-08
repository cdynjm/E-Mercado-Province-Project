<div class="modal fade" id="modallogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Welcome! Please Login to continue.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" method = "post">
                <form id = "frmModalLogin">
                    @csrf
                    <div class="row m-1">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label for="email" class="form-label">Username</label>
                            <input id="email" type="text" name="username"  value="{{old('username')}}"   class="form-control"  placeholder="Username" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" placeholder="Password"  name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-6">
                            <a href="{{route('auth.recoverpw')}}"  class="float-end">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id = "btnModalLogin" type="submit" class="btn btn-success">{{ __('Sign In') }}</button>
                    </div>
                    
                    <p class="mt-3 text-center">
                        Don’t have an account? <a href = '{{route("buyer.signup")}}' id="register" class="text-underline">BUYER</a> | <a href = '{{route("seller.signup")}}' id="register" class="text-underline">SELLER</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>