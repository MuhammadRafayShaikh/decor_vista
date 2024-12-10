@extends('admin.master')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Total Users</p>
                        <h6 class="mb-0 text-light">{{ $user }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Total Designer</p>
                        <h6 class="mb-0 text-light">{{ $designer }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Total Products</p>
                        <h6 class="mb-0 text-light">{{ $product }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Today Orders</p>
                        <h6 class="mb-0 text-light">{{ $order }}</h6>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Sale & Revenue End -->




    <div class="container">
        <h1>Show Contact Details Here..</h1>

        <table class="table">
            <thead class="text-light">
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody class="text-light">
                @foreach ($contact as $con)
                    <tr>
                        <td>{{ $con->id }}</td>
                        <td>{{ $con->user->name }}</td>
                        <td>{{ $con->user->email }}</td>
                        <td>{{ $con->subject }}</td>
                        <td>{{ $con->message }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
