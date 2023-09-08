<ul class="navbar-nav iq-main-menu"  id="sidebar">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/">
            <i class="icon">
            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                <path d="M9.13478 20.7733V17.7156C9.13478 16.9351 9.77217 16.3023 10.5584 16.3023H13.4326C13.8102 16.3023 14.1723 16.4512 14.4393 16.7163C14.7063 16.9813 14.8563 17.3408 14.8563 17.7156V20.7733C14.8539 21.0978 14.9821 21.4099 15.2124 21.6402C15.4427 21.8705 15.7561 22 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0008C21.1356 20.3588 21.5 19.487 21.5 18.5778V9.86686C21.5 9.13246 21.1721 8.43584 20.6046 7.96467L13.934 2.67587C12.7737 1.74856 11.1111 1.7785 9.98539 2.74698L3.46701 7.96467C2.87274 8.42195 2.51755 9.12064 2.5 9.86686V18.5689C2.5 20.4639 4.04738 22 5.95617 22H7.87229C8.55123 22 9.103 21.4562 9.10792 20.7822L9.13478 20.7733Z" fill="currentColor"></path>                            
            </svg>                        
            </i>
            <span class="item-name">Home</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('dashboard'))}}" aria-current="page" href="{{route('dashboard')}}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Dashboard</span>
        </a>
    </li>

    @if(auth()->check() && Auth::user()->user_type == 'provincial')
        
        <li class="nav-item">
            <a class="nav-link {{activeRoute(route('municipal.admin'))}}" aria-current="page" href="{{ route('municipal.admin') }}">
                <i class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                    </svg>
                </i>
                <span class="item-name">Municipal Admins</span>
            </a>
        </li>
    @endif

    @if(auth()->check()  && (Auth::user()->user_type == 'provincial' || Auth::user()->user_type == 'municipal'))
        <li class="nav-item">
        <a class="nav-link {{activeRoute(route('verified.sellers'))}}" aria-current="page" href="{{ route('verified.sellers') }}">
                <i class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    </svg>
                </i>
                <span class="item-name">Verified Sellers</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{activeRoute(route('pending.sellers'))}}" aria-current="page" href="{{ route('pending.sellers') }}">
                <i class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                        <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                    </svg>
                </i>
                <span class="item-name">Pending Sellers</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{activeRoute(route('admin.buyer'))}}" aria-current="page" href="{{ route('admin.buyer') }}">
                <i class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                    </svg>
                </i>
                <span class="item-name">Buyers</span>
            </a>
        </li>

        <li class="nav-item static-item">
            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                <span class="default-icon">More</span>
                <span class="mini-icon">-</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{activeRoute(route('farm.type'))}}" aria-current="page" href="{{ route('farm.type')}}">
                <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                    <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                </svg>
                </i>
                <span class="item-name">Farm Types</span>
            </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{activeRoute(route('farm.product'))}}" aria-current="page" href="{{ route('farm.product')}}">
                <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                </svg>
                </i>
                <span class="item-name">Farm Products</span>
            </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{activeRoute(route('farm.aid'))}}" aria-current="page" href="{{ route('farm.aid')}}">
            <i class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
              <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
            </svg>
            </i>
            <span class="item-name">Farm Aids</span>
        </a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link {{activeRoute(route('farm.program'))}}" aria-current="page" href="{{ route('farm.program')}}">
            <i class="icon">
           <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
            </svg>
            </i>
            <span class="item-name">Programs</span>
        </a>
        </li>
        @endif
    
    @if (auth()->check() && strtolower(auth()->user()->user_type) == "seller")
    <li><hr class="hr-horizontal"></li>
        <li class="nav-item static-item">
            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                <span class="default-icon">Control Panel</span>
                <span class="mini-icon">-</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " data-bs-toggle="collapse" href="#sidebar-post" role="button" aria-expanded="false" aria-controls="sidebar-fines">
                <i class="fa fa-shopping-basket" style = "margin-top: 4px"></i>
                <span class="item-name">Products</span>
                <i class="right-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </i>
            </a>
            <ul class="sub-nav collapse" id="sidebar-post" data-bs-parent="#sidebar">
                
                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('post.create'))}}" href="{{route('post.create')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> NA </i>
                        <span class="item-name">New</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('post.index'))}}" href="{{route('post.index')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> MP </i>
                        <span class="item-name">My Posts</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('post.drafts'))}}" href="{{route('post.drafts')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> DR </i>
                        <span class="item-name">Drafts</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link " data-bs-toggle="collapse" href="#sidebar-order" role="button" aria-expanded="false" aria-controls="sidebar-order">
                <i class="fa fa-shopping-cart" style = "margin-top: 4px"></i>
                <span class="item-name">Orders</span>
                <i class="right-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </i>
            </a>
            <ul class="sub-nav collapse" id="sidebar-order" data-bs-parent="#sidebar">

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('order.list'))}}" href="{{route('order.list')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> LI </i>
                        <span class="item-name">To Confirm</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('order.release'))}}" href="{{route('order.release')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> LI </i>
                        <span class="item-name">To Release</span>
                    </a>
                </li>

            </ul>
        </li>

    @elseif (auth()->check() && strtolower(auth()->user()->user_type) == "buyer")
        <li class="nav-item">
            <a class="nav-link " data-bs-toggle="collapse" href="#sidebar-order" role="button" aria-expanded="false" aria-controls="sidebar-order">
                <i class="fa fa-shopping-cart" style = "margin-top: 4px"></i>
                <span class="item-name">Orders</span>
                <i class="right-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </i>
            </a>
            <ul class="sub-nav collapse" id="sidebar-order" data-bs-parent="#sidebar">

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('order.view'))}}" href="{{route('order.view')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> MO </i>
                        <span class="item-name">My Orders</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('order.myconfirm'))}}" href="{{route('order.myconfirm')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> CO </i>
                        <span class="item-name">My Confirmed Orders</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('cancel.buyer'))}}" href="{{route('cancel.buyer')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> CO </i>
                        <span class="item-name">My Cancellations</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{activeRoute(route('order.review'))}}" href="{{route('order.review')}}">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                        </i>
                        <i class="sidenav-mini-icon"> FR </i>
                        <span class="item-name">For Review</span>
                    </a>
                </li>

            </ul>

        </li>
    @endif
</ul>
