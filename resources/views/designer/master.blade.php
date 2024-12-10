<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Decorvista Designer Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('admin/img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('img/logo.jpg') }}" rel="shortcut icon" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <!-- Add these in your layout file's <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

<body>
    <div class="container-xxl position-relative bg-dark d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>


        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-dark navbar-dark">
                <a href="{{ url('designer/index') }}" class="navbar-brand mx-4 mb-3">
                    <h3></i>DECORVISTA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if(Auth::user()->profile_photo_path !== null)
                        <img class="rounded-circle" src="{{ asset('users/' . Auth::user()->profile_photo_path) }}" alt=""
                            style="width: 40px; height: 40px;">
                        @else
                        <img class="rounded-circle" src="{{ asset('users/7490237409237509237509237.png') }}" alt=""
                            style="width: 40px; height: 40px;">
                        @endif
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-light">{{ Auth::user()->name }}</h6>
                        <span class="text-secondary">Designer</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('designer/index') }}" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    @if ($checkDesigner == 0)
                    <a href="{{ url('designer/create') }}" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Create Portfolio</a>
                    @else
                    <a href="{{ url('designer/show/') }}" class="nav-item nav-link"><i
                            class="fa fa-keyboard me-2"></i>Show Portfolio</a>
                    <div class="navbar-nav w-100">
                        <a href="{{ route('show_time') }}" class="nav-item nav-link"><i
                                class="fa fa-keyboard me-2"></i>Time Slots</a>
                    </div>
                    @if ($time_check > 0)
                    <div class="navbar-nav w-100">
                        <a href="{{ url('designer/showbooking') }}" class="nav-item nav-link"><i
                                class="fa fa-keyboard me-2"></i>Show Booking {{ $numberBookings }}</a>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="{{ url('chatify') }}" class="nav-item nav-link"><i
                                class="fa fa-keyboard me-2"></i>Chat</a>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="{{ url('designer/reviews') }}" class="nav-item nav-link"><i
                                class="fa fa-keyboard me-2"></i>Show Reviews</a>
                    </div>
                    @endif

                </div>
                @endif

        </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-dark navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>

            <div class="navbar-nav align-items-center ms-auto">


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{ asset('admin/img/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-dark border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ url('user/profile') }}" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" class="btn1 btn" value="logout">
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        @yield('content')
        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-dark rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">DECORVISTA</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        Designed By <a href="">Unknown Person 🥺</a>
                        </br>
                        Distributed By <a class="border-bottom" href="" target="_blank">Decor Vista</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>



    <a href="#" class="btn btn-lg  btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <style>
        input {
            color: white !important;
        }
    </style>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>
<style>
    input::placeholder {
        color: white;
        /* Placeholder ka rang white */
    }
</style>

</html>