<div class="header" style="background: url({{asset('images/emercado/guest-bg.jpg')}}); background-size: cover; background-repeat: no-repeat; height: 100vh;position: relative;">
        <div class="main-img">
            <div class="container">
                @if ($global->isMobile())
                    <img src="{{asset('e-mercado-logo.png?id=1')}}" style="width: 150px;" alt="">
                @else
                    <img src="{{asset('e-mercado-logo.png?id=1')}}" style="width: 300px;" alt="">
                @endif
                
                <h1 class="my-1">
                    <span style="text-shadow: 1px 1px 1px rgba(40, 54, 80, 0.663);">{{ env('APP_NAME')}}</span>
                </h1>
                <h5 class="text-dark mb-5 shadow " style="text-transform: uppercase; text-shadow: 2px 4px 4px rgba(40, 54, 80, 0.663);">
                    <p style="text-shadow: 5px 2px 4px rgba(255, 255, 255, 1);">
                        e-Mercado is an electronic marketplace or an online platform for<br>buying ang selling agro-fishery products of Southern Leyteños
                    </p>
                </h5>
                <div class="d-flex justify-content-center align-items-center">
                    
                </div>

            </div>

        </div>
        <div class="container">
            <nav class="nav navbar navbar-expand-lg navbar-light top-1 rounded">
                <div class="container-fluid">
                    <a class="navbar-brand mx-2" href="/">
                        <img src="{{asset('e-mercado-logo.png?id=1')}}" style="height: 40px;" alt="">
                        <h5 class="logo-title">{{env('APP_NAME')}}</h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-2" aria-controls="navbar-2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-2">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-start">
                        @if (auth()->check())
                            <li class="nav-item me-3">

                                <a class="text-danger" href = "{{route('logout')}}">
                                    <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.89535 11.23C9.45785 11.23 9.11192 11.57 9.11192 12C9.11192 12.42 9.45785 12.77 9.89535 12.77H16V17.55C16 20 13.9753 22 11.4724 22H6.51744C4.02471 22 2 20.01 2 17.56V6.45C2 3.99 4.03488 2 6.52762 2H11.4927C13.9753 2 16 3.99 16 6.44V11.23H9.89535ZM19.6302 8.5402L22.5502 11.4502C22.7002 11.6002 22.7802 11.7902 22.7802 12.0002C22.7802 12.2002 22.7002 12.4002 22.5502 12.5402L19.6302 15.4502C19.4802 15.6002 19.2802 15.6802 19.0902 15.6802C18.8902 15.6802 18.6902 15.6002 18.5402 15.4502C18.2402 15.1502 18.2402 14.6602 18.5402 14.3602L20.1402 12.7702H16.0002V11.2302H20.1402L18.5402 9.6402C18.2402 9.3402 18.2402 8.8502 18.5402 8.5502C18.8402 8.2402 19.3302 8.2402 19.6302 8.5402Z" fill="currentColor"></path>                            
                                    </svg>                        
                                </a>&nbsp;

                                <a style = "margin-right: 20px" href = "{{route('cart.view')}}" class = 'position-relative'>
                                    <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>                           
                                    </svg>    
                                    
                                    @if ($Badge > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{$Badge}}
                                    </span>
                                    @endif
                                </a>

                                <a class="text-success" href = "{{route('dashboard')}}">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </li>
                        @else
                        
                            
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
                        
                        @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>