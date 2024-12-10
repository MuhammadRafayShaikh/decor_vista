<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Decorvista Admin Dashboard</title>

    <!-- Favicon -->
    <link href="{{ asset('admin/img/favicon.ico') }}" rel="shortcut icon">
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
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}" type="image/x-icon">

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
            <div class="spinner-border " style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-dark navbar-dark">
                <a href="{{ url('admin/index') }}" class="navbar-brand mx-4 mb-3">
                    <h3>DECORVISTA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-dark rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-light">{{ Auth::user()->name }}</h6>
                        <span class="text-secondary">Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('admin/index') }}"
                        class="nav-item nav-link {{ request()->is('admin/index') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a href="{{ url('admin/show_cat') }}"
                        class="nav-item nav-link {{ request()->is('admin/show_cat') ? 'active' : '' }}">
                        <i class="fa fa-list me-2"></i>Category
                    </a>
                    <a href="{{ url('admin/show_prod') }}"
                        class="nav-item nav-link {{ request()->is('admin/show_prod') ? 'active' : '' }}">
                        <i class="fa fa-home me-2"></i>Products
                    </a>
                    <a href="{{ url('admin/user') }}"
                        class="nav-item nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                        <i class="fa fa-th me-2"></i>All Users
                    </a>
                    <a href="{{ url('admin/designer') }}"
                        class="nav-item nav-link {{ request()->is('admin/designer') ? 'active' : '' }}">
                        <i class="fa fa-people-carry me-2"></i>All Designers
                    </a>
                    <a href="{{ url('admin/orders') }}"
                        class="nav-item nav-link {{ request()->is('admin/orders') ? 'active' : '' }}">
                        <i class="fa fa-keyboard me-2"></i>Orders
                    </a>
                    <a href="{{ url('admin/showbooking') }}"
                        class="nav-item nav-link {{ request()->is('admin/showbooking') ? 'active' : '' }}">
                        <i class="fa fa-home me-2"></i>Bookings
                    </a>
                    <a href="{{ url('admin/show_img') }}"
                        class="nav-item nav-link {{ request()->is('admin/show_img') ? 'active' : '' }}">
                        <i class="fa fa-image me-2"></i>Gallery
                    </a>
                    <a href="{{ url('admin/review') }}"
                        class="nav-item nav-link {{ request()->is('admin/review') ? 'active' : '' }}">
                        <i class="fa fa-star me-2"></i>All Reviews
                    </a>
                    <a href="{{ url('admin/designerReview') }}"
                        class="nav-item nav-link {{ request()->is('admin/designerReview') ? 'active' : '' }}">
                        <i class="fa fa-star me-2"></i>Designer Reviews
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-dark navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <input type="text" placeholder="Search Here..." id="search">
                <style>
                    #search::placeholder {
                        color: black !important;
                    }
                </style>


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
                                    <input type="submit" value="logout" class="btn1 btn">
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
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg  btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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
    body {
        background-color: black;
    }

    thead,
    tbody,
    tr,
    th,
    td {
        color: white !important;
    }

    input::placeholder {
        color: white;
        /* Placeholder ka rang white */
    }
</style>

<script>
    $(document).ready(function() {
        $("#search").on('keydown', function() {
            var search = $("#search").val();
            var url = window.location.pathname;
            // alert(url);
            if (search.trim() !== '') {
                $.ajax({
                    url: `{{ route('searching') }}`,
                    type: "GET",
                    data: {
                        search: search,
                        url: url
                    },
                    success: function(response) {
                        console.log(response);
                        if (url == "/admin/show_prod") {
                            $("#product_table").empty();

                            $.each(response, function(key, value) {
                                const action = `/admin/edit_prod/${value.id}`;
                                const action2 = `/admin/delete_prod/${value.id}`;
                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.category.c_name}</td>
                                        <td>${value.p_name}</td>
                                        <td>${value.p_price}</td>
                                        <td><img src="/product/${value.p_image}" height="100px" width="100px"></td>
                                        <td><a href="${action}" class="btn btn-warning">Edit</a></td>
                                        <td><a href="${action2}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    `
                                $("#product_table").append(output)
                            })
                        } else if (url == "/admin/show_cat") {
                            $("#category_table").empty();

                            $.each(response, function(key, value) {
                                const action = `/admin/edit_cat/${value.id}`;
                                const action2 = `/admin/delete_cat/${value.id}`;
                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.c_name}</td>
                                        <td><img src="/category/${value.c_image}" height="100px" width="100px"></td>
                                        <td><a href="${action}" class="btn btn-warning">Edit</a></td>
                                        <td><a href="${action2}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    `
                                $("#category_table").append(output);
                            })
                        } else if (url == "/admin/user") {
                            $("#user_table").empty();

                            $.each(response, function(key, value) {
                                var output =
                                    `
                                    <tr class="text-light">
                                        <td>${value.id}</td>
                                        <td>${value.name}</td>
                                        <td>${value.email}</td>
                                        <td>${value.address}</td>
                                    </tr>
                                    `
                                $("#user_table").append(output)
                            })
                        } else if (url == "/admin/designer") {
                            $("#designer_table").empty();

                            $.each(response, function(key, value) {
                                var output =
                                    `
                                    <tr class="text-light">
                                        <td>${value.id}</td>
                                        <td>${value.name}</td>
                                        <td>${value.email}</td>
                                        <td>${value.address}</td>
                                    </tr>
                                    `
                                $("#designer_table").append(output)
                            })
                        } else if (url == "/admin/orders") {
                            $("#orders_table").empty();

                            $.each(response, function(key, value) {

                                const action = `/admin/view_order/${value.id}`
                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.user.name}</td>
                                        <td>${value.created_at}</td>
                                        <td>${value.price}</td>
                                        <td>${value.status}</td>
                                        <td>
                                            <a href="${action}" class="btn btn1">View<i
                                                    class="fas fa-eye "></i></a>
                                        </td>
                                    </tr>
                                    `

                                $("#orders_table").append(output)
                            })
                        } else if (url == "/admin/order_history") {
                            $("#com_orders_table").empty();

                            $.each(response, function(key, value) {
                                const action = `/admin/view_order/${value.id}`
                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.user.name}</td>
                                        <td>${value.created_at}</td>
                                        <td>${value.price}</td>
                                        <td>${value.status}</td>
                                        <td>
                                            <a href="${action}" class="btn btn1">View<i
                                                    class="fas fa-eye "></i></a>
                                        </td>
                                    </tr>
                                    `

                                $("#com_orders_table").append(output)
                            })
                        } else if (url == "/admin/showbooking") {
                            $("#bookings_table").empty();
                            if (response.status == 1) {
                                status = "completed"
                            } else {
                                status = "pending"
                            }

                            $.each(response, function(key, value) {
                                var output =
                                    `
                                    <tr>
                                        <td>${value.user.id}</td>
                                        <td>${value.user.name}</td>
                                        <td>${value.designer.user.id}</td>
                                        <td>${value.designer.user.name}</td>
                                        <td>${value.time.date}
                                            <small>${value.time.time_in + 'to' +  value.time.time_out}</small>
                                        </td>
                                        <td>${status}</td>
                                        <td>${value.created_at}</td>
                                    </tr>
                                    `
                                $("#bookings_table").append(output);
                            })
                        } else if (url == "/admin/show_img") {
                            $("#gallery_table").empty();

                            $.each(response, function(key, value) {
                                const action = `admin/edit_img/${value.id}`
                                const action2 = `admin/delete_img/${value.id}`

                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.category.c_name}</td>
                                        <td><img src="/gallery/${value.g_image}" height="100px" width="100px"></td>
                                        <td><a href="${action}" class="btn btn-warning">Edit</a></td>
                                        <td><a href="${action2}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    `
                                $("#gallery_table").append(output);

                            })


                        } else if (url == "/admin/review") {
                            $("#reviews_table").empty();


                            $.each(response, function(key, value) {
                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.user.name}</td>
                                        <td>${value.product.p_name}</td>
                                        <td>${value.rating}</td>
                                        <td>${value.comment}</td>

                                    </tr>
                                    `
                                $("#reviews_table").append(output);
                            })
                        } else if (url == "/admin/designerReview") {
                            $("#designer_reviews_table").empty();


                            $.each(response, function(key, value) {
                                var output =
                                    `
                                    <tr>
                                        <td>${value.id}</td>
                                        <td>${value.user.name}</td>
                                        <td>${value.user.email}</td>
                                        <td>${value.designer.user.name}</td>
                                        <td>${value.designer.user.email}</td>
                                        <td>${value.rating} stars</td>
                                        <td>${value.comment}</td>
                                        <td>${value.created_at}</td>
                                    </tr>
                                    `
                                $("#designer_reviews_table").append(output);
                            })
                        }
                    }
                })
            }

        })
    })
</script>

</html>