<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>XRay - Responsive Bootstrap 4 Admin Dashboard Template</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


    @yield('css')


    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>

    <div id="loading">
        <div id="loading-center">

        </div>
    </div>


    <div class="wrapper">

        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="index-2.html">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
                    <span>Bhola</span>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-more-fill"></i></div>
                            <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">

                <x-nav />

                <div class="p-3"></div>
            </div>
        </div>


        <div id="content-page" class="content-page">

            <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                    <div class="iq-sidebar-logo">
                        <div class="top-logo">
                            <a href="index-2.html" class="logo">
                                <img src="images/logo.png" class="img-fluid" alt="">
                                <span>Bhola</span>
                            </a>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="iq-search-bar">
                            <form action="#" class="searchbox">
                                <input type="text" class="text search-input" placeholder="Type here to search...">
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            </form>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="iq-menu-bt align-self-center">
                            <div class="wrapper-menu">
                                <div class="main-circle"><i class="ri-more-fill"></i></div>
                                <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list">

                                <li class="nav-item iq-full-screen">
                                    <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="search-toggle iq-waves-effect">
                                        <i class="ri-notification-3-fill"></i>
                                        <span class="bg-danger dots"></span>
                                    </a>
                                    <div class="iq-sub-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0 ">
                                                <div class="bg-primary p-3">
                                                    <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                                </div>

                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <div class="">
                                                            <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Emma Watson Bini</h6>
                                                            <small class="float-right font-size-12">Just Now</small>
                                                            <p class="mb-0">95 MB</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <div class="">
                                                            <img class="avatar-40 rounded" src="images/user/02.jpg" alt="">
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">New customer is join</h6>
                                                            <small class="float-right font-size-12">5 days ago</small>
                                                            <p class="mb-0">Jond Bini</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <div class="">
                                                            <img class="avatar-40 rounded" src="images/user/03.jpg" alt="">
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Two customer is left</h6>
                                                            <small class="float-right font-size-12">2 days ago</small>
                                                            <p class="mb-0">Jond Bini</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <div class="">
                                                            <img class="avatar-40 rounded" src="images/user/04.jpg" alt="">
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                            <small class="float-right font-size-12">3 days ago</small>
                                                            <p class="mb-0">Jond Bini</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{ route('bedstatus') }}" class="search-toggle iq-waves-effect">
                                        <i class="fa fa-bed cal15"></i>
                                        <span class="font-size-12">Bed Status</span>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <ul class="navbar-list">
                            <li>
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="images/user/1.jpg" class="img-fluid rounded mr-3" alt="user">
                                    <div class="caption">
                                        <h6 class="mb-0 line-height">Bini Jets</h6>
                                        <span class="font-size-12">Available</span>
                                    </div>
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white line-height">Hello Bini Jets</h5>
                                                <span class="text-white font-size-12">Available</span>
                                            </div>
                                            <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-file-user-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">My Profile</h6>
                                                        <p class="mb-0 font-size-12">View personal profile details.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-profile-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Edit Profile</h6>
                                                        <p class="mb-0 font-size-12">Modify your personal details.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-account-box-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Account settings</h6>
                                                        <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-lock-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Privacy Settings</h6>
                                                        <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="d-inline-block w-100 text-center p-3">

                                                <a class="bg-primary iq-sign-btn" role="button" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                    Sign out <i class="ri-login-box-line ml-2"></i>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>

            <div class="container-fluid">

                @yield('content')


            </div>

            <footer class="bg-white iq-footer mt-5">
                <div class="container-fluid">
                    <div class="row">

                        <div class="text-right">
                            Copyright 2020 <a href="#">Bhola Hospital</a> All Rights Reserved.
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>




    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/jquery.appear.js') }}"></script>

    {{-- <script src="{{ asset('js/countdown.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/waypoints.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/jquery.counterup.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/wow.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/apexcharts.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/slick.min.js') }}"></script> --}}

    <script src="{{ asset('js/select2.min.js') }}"></script>

    {{-- <script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}

    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>

    {{-- <script src="{{ asset('js/lottie.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/core.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/charts.js') }}"></script> --}}

    <script src="{{ asset('js/animated.js') }}"></script>

    {{-- <script src="{{ asset('js/kelly.js') }}"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

    <script src="{{ asset('js/chart-custom.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>


    @include('errors.jserror')

    @yield('js')
</body>


</html>
