@extends('designer.master')
@section('content')
    <!-- Sale & Revenue Start -->

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Total Time Slots</p>
                        <h6 class="mb-0 text-light">{{ session()->get('designer_id') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x "></i>
                    <div class="ms-3 ">
                        <p class="mb-2 text-light">Total Bookings</p>
                        <h6 class="mb-0 text-light">{{ $bookings }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Done Bookings</p>
                        <h6 class="mb-0 text-light">{{ $completebookings }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x "></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Total Reviews</p>
                        <h6 class="mb-0 text-light">{{ $reviews }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->
@endsection
