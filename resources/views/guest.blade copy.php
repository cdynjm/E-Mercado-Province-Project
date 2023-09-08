<x-app-layout layout="simple" :assets="$assets ?? []">
    <span class="uisheet screen-darken"></span>
    <div class="header" style="background: url({{asset('images/emercado/guest-bg.jpg')}}); background-size: cover; background-repeat: no-repeat; height: 100vh;position: relative;">
        <div class="main-img">
            <div class="container">
                <img src="{{asset('e-mercado-logo.png')}}" style="width: 300px; height: 230px;" alt="">
                <h1 class="my-4">
                    <span style="text-shadow: 2px 4px 4px rgba(40, 54, 80, 0.663);">{{ env('APP_NAME')}}</span>
                </h1>
                <h5 class="text-white mb-5 shadow p-3" style="text-shadow: 2px 4px 4px rgba(40, 54, 80, 0.663);"><p style="text-shadow: 5px 2px 4px rgba(6, 13, 25, 0.663);">An E-commerce platform that builds livelihood by
                    helping buyers and sellers to attain their goals</p></h5>
                <div class="d-flex justify-content-center align-items-center">
                    
                </div>

            </div>

        </div>
        <div class="container">
            <nav class="nav navbar navbar-expand-lg navbar-light top-1 rounded">
                <div class="container-fluid">
                    <a class="navbar-brand mx-2" href="#">
                        <img src="{{asset('e-mercado-logo.png')}}" style="width: 50px; height: 40px;" alt="">
                        <h5 class="logo-title">{{env('APP_NAME')}}</h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-2" aria-controls="navbar-2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-2">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-start">
                            
                            <li class="nav-item me-3">
                                <a class="btn btn-warning" aria-current="page" id="register" data-bs-target = "#registerModal" data-bs-toggle = "modal">
                                    <i class="fa-solid fa-address-card"></i>
                                    Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" aria-current="page" href="{{ route('auth.signin') }}">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class=" body-class-1 container">
        <aside class="mobile-offcanvas bd-aside card iq-document-card sticky-xl-top text-muted align-self-start mb-5 mt-n5" id="left-side-bar">
            <div class="offcanvas-header p-0">
                <button class="btn-close float-end"></button>
            </div>
            <h2 class="h6 pb-2 border-bottom">Categories</h2>
            <nav class="small" id="elements-section">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $cat)
                    <li class="mt-2">
                       <a href = "#">{{$cat->description}}</a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </aside>
    </div>

    <div class=" body-class-1 container">
        <aside class="mobile-offcanvas bd-aside card iq-document-card sticky-xl-top text-muted align-self-start mb-5 mt-n5" id="left-side-bar">
            <div class="offcanvas-header p-0">
                <button class="btn-close float-end"></button>
            </div>
            <h2 class="h6 pb-2 border-bottom">Categories</h2>
            <nav class="small" id="elements-section">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $cat)
                    <li class="mt-2">
                       <a href = "#">{{$cat->description}}</a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </aside>
    </div>
</x-app-layout>
