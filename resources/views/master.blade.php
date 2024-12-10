<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Decorvista</title>
    <link href="{{asset('img/logo.jpg')}}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Add these in your layout file's <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* Toastr container adjustments */
        #toast-container {
            z-index: 9999;
            /* Ensures it appears above all content */
        }

        /* Top center position customization */
        #toast-container.toast-top-center {
            top: 100px;
            /* Increase spacing from top */
            margin: 0 auto;
        }

        /* Toast individual item adjustments */
        #toast-container .toast {
            font-size: 14px;
            /* Adjust font size for better readability */
            padding: 15px;
            /* More padding for a cleaner look */
            border-radius: 8px;
            /* Rounded corners for a modern look */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for better visibility */
        }

        #toast-container .toast-success .toast-icon {
            display: none;
        }
    </style>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "newestOnTop": true,
            "preventDuplicates": true,
        };

        // Example notification
        // toastr.success('Operation Successful!');
    </script>
</head>
<style>
    nav {
        background: black
    }

    #navbar_sticky {
        transition: background-color 0.3s;
        /* Smooth transition */
    }

    .navbar-default {
        background-color: rgba(255, 255, 255, 0.9);
        /* Change to your desired color */
    }

    .navbar-scrolled {
        background-color: rgba(255, 255, 255, 0.9);
        /* A
        /djust this color as needed */
    }

    .dropdown-item:hover {
        background: black;
    }

    .nav-item.active .nav-link {
        text-decoration: underline;
        text-decoration-thickness: 5px;
        text-decoration-color: goldenrod;
        text-underline-offset: 4px;
        /* Adjust this value for more or less space */
    }
</style>


<body>
    <div class="main position-relative">
        <div class="main_1 position-absolute top-0 w-100">
            <section id="header">
                <nav class="navbar navbar-expand-md navbar-light  p-0 px-3" id="navbar_sticky">
                    <div class="container-fluid">
                        <a class="text-white p-0 navbar-brand fw-bold me-0" href="{{ url('/') }}"><i
                                class="fa fa-futbol-o me-1 col_light"></i> DECORVISTA</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-0 ms-auto">
                                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                                </li>
                                <li class="nav-item {{ Request::is('team') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/team') }}">Designers</a>
                                </li>
                                <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/products') }}">Products</a>
                                </li>
                                <li class="nav-item {{ Request::is('galleries') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/galleries') }}">Gallery</a>
                                </li>
                                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                                </li>
                                @auth
                                @if(Auth::user()->profile_photo_path !== null)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('users/' . Auth::user()->profile_photo_path) }}" style="border-radius: 50%;" height="30px" width="30px" data-lightbox="models" data-tital="Profile Picture">

                                        <img src="{{ asset('users/' . Auth::user()->profile_photo_path) }}" style="border-radius: 50%;" height="30px" width="30px" alt="">
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('users/7490237409237509237509237.png') }}" style="border-radius: 50%;" height="30px" width="30px" data-lightbox="models" data-tital="Profile Picture">

                                        <img src="{{ asset('users/7490237409237509237509237.png') }}" style="border-radius: 50%;" height="30px" width="30px" alt="">
                                    </a>
                                </li>
                                @endif

                                @endauth

                                <li class="nav-item dropdown {{ Request::is('user/profile') || Request::is('my_orders') || Request::is('my_bookings') || Request::is('wishlist') ? 'active' : '' }}">
                                    @auth
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="text-warning text-bold"> {{ Auth::user()->name }}</span></a>
                                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item text-light {{ Request::is('user/profile') ? 'active' : '' }}" href="{{ url('user/profile') }}">Profile</a></li>
                                        <li><a class="dropdown-item text-light {{ Request::is('my_orders') ? 'active' : '' }}" href="{{ url('my_orders') }}">Orders</a></li>
                                        <li><a class="dropdown-item text-light {{ Request::is('my_bookings') ? 'active' : '' }}" href="{{ url('my_bookings') }}"> Bookings</a></li>
                                        <li><a class="dropdown-item text-light {{ Request::is('chatify') ? 'active' : '' }}" href="{{ url('chatify') }}"> Chat </a></li>
                                        <li>
                                        <li><a class="dropdown-item text-light {{ Request::is('cart/index') ? 'active' : '' }}" href="{{ url('cart/index') }}"> Cart </a></li>
                                        <li><a class="dropdown-item text-light {{ Request::is('wishlist') ? 'active' : '' }}" href="{{ url('wishlist') }}"> Wishlist </a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <input type="submit" class="btn btn-warning m-2" value="Logout" name="logout">
                                            </form>
                                        </li>
                                    </ul>
                                    @else
                                    <div class="d-flex">
                                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </div>
                                    @endauth
                                </li>

                            </ul>

                        </div>
                    </div>
                </nav>
            </section>
        </div>
        @yield('content')

        <section id="footer">
            <div class="offer_m p_3 bg_backo">
                <div class="container-xl">
                    <div class="footer_1 row">
                        <div class="col-md-3">
                            <div class="footer_1i">
                                <h5 class="text-white">Decorvista</h5>
                                <hr class="line">
                                <p class="text-white-50">Seamlessly visualize quality intellectual ideal without
                                    collaboration superior montes soon maecenas capita idea listically</p>
                                <div class="input-group p-2 bg_dark border_1 border-start-0 border-end-0 border-top-0">
                                    <input type="text"
                                        class="form-control border-0 rounded-0 bg-transparent text-light"
                                        placeholder="Email Address...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary bg-transparent border-0" type="button">
                                            <i class="fa fa-long-arrow-right col_brow"></i> </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer_1i">
                                <h5 class="text-white">Categories</h5>
                                <hr class="line">
                                <div class="row footer_3ism">
                                    <h6 class="col-md-12 col-6"><a class="text-white-50" href="#"><i
                                                class="fa fa-chevron-right me-1 font_12 col_brow"></i> Rooms</a></h6>
                                    <h6 class="col-md-12 col-6 mt-2"><a class="text-white-50" href="#"><i
                                                class="fa fa-chevron-right me-1 font_12 col_brow"></i> Interior
                                            Work</a></h6>
                                    <h6 class="col-md-12 col-6 mt-2"><a class="text-white-50" href="#"><i
                                                class="fa fa-chevron-right me-1 font_12 col_brow"></i> Kitchen
                                            Design</a></h6>
                                    <h6 class="col-md-12 col-6 mt-2"><a class="text-white-50" href="#"><i
                                                class="fa fa-chevron-right me-1 font_12 col_brow"></i> Decoration
                                            Art</a></h6>
                                    <h6 class="col-md-12 col-6 mt-2"><a class="text-white-50" href="#"><i
                                                class="fa fa-chevron-right me-1 font_12 col_brow"></i> Renovation</a>
                                    </h6>
                                    <h6 class="col-md-12 col-6 mt-2 mb-0"><a class="text-white-50" href="#"><i
                                                class="fa fa-chevron-right me-1 font_12 col_brow"></i> Exterior
                                            Design</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer_1i">
                                <h5 class="text-white">Contact</h5>
                                <hr class="line">
                                <p class="text-white-50">30 Nora Dreek, Porta Quis, Old North Zales 2170, Pakistan</p>
                                <h6><a class="text-white-50" href="#"><i
                                            class="fa fa-phone me-1 fs-5 col_brow align-middle"></i> <a href="tel:+923153307757" class="text-white-50">0315 3307757</a></a></h6>
                                <h6 class="mt-3"><a class="text-white-50" href="#"><i
                                            class="fa fa-envelope me-1 fs-5 col_brow align-middle"></i>
                                        <a class="text-white-50" href="mailto:rafay6744@gmail.com">
                                            rafay6744@gmail.com
                                        </a></a></h6>
                                <h6 class="mt-3"><a class="text-white-50" href="#"><i
                                            class="fa fa-globe me-1 fs-5 col_brow align-middle"></i> <a class="text-white-50" href="mailto:rafay6744@gmail.com">decorvista123@gmail.com</a></a>
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer_1i">
                                <h3><a class="text-white" href="{{ url('/') }}"><i
                                            class="fa fa-futbol-o me-1 col_light"></i> DECORVISTA</a></h3>
                                <hr class="line">
                                <p class="text-white-50">There are many vari of pass but majority have suffered some
                                    injected of a humour</p>
                                <ul class="social-network social-circle mb-0">
                                    <li><a href="#" class="icoRss" title="Rss"><i
                                                class="fa fa-rss"></i></a></li>
                                    <li><a href="#" class="icoFacebook" title="Facebook"><i
                                                class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i
                                                class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer_2 row text-center mt-4 pt-4">
                        <div class="col-md-12">
                            <p class="mb-0 text-white-50">© Decorvista. All Rights Reserved | Design by <a
                                    class="col_brow fw-bold" href="">Unknown Person 🥺</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="lightbox-plus-jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>


</html>