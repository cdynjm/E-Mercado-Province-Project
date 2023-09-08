<div id="loading">
    @include('partials.dashboard._body_loader')
</div>
@include('partials.dashboard._body_sidebar')
<main class="main-content">
    <div class="position-relative">
    @include('partials.dashboard._body_header')
    @include('partials.dashboard.sub-header')
    </div>
    
    <div class="conatiner-fluid content-inner mt-n5 py-0">
    {{ $slot }}
    </div>
    
    @include('partials.dashboard._body_footer')
</main>

<!-- @include('partials.components.setting-offcanvas') -->
@include('partials.dashboard._scripts')
@include('partials.dashboard._app_toast')
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="formTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="main_form"></div>
    </div>
    </div>
</div>
</div>
