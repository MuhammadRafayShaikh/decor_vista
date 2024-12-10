@extends('admin.master')
@section('content')
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

        </div>
        <a href="{{ route('userpdf') }}" class="btn btn-warning mt-3 mb-2 m-2">Download PDF</a>

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-dark text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Total Users</h6>
                </div>

                <div class="table-responsive">

                    <table class="table  text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-light">
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody id="user_table">
                            @foreach ($users as $user)
                                <tr class="text-light">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->
    </div>
@endsection
