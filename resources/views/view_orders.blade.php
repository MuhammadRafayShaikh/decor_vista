@extends('master')
@section('content')
    <style>
        .total-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 16px;
        }

        .total-label {
            margin: 0;
        }

        .total-value {
            font-weight: bold;
        }
    </style>

    <div class="shadow-sm bg-warning border-top py-3 mb-4">
        <div class="container">
            <a href="{{ url('/') }}" style="color:white;font-size:20px;margin-right:30px;"> Home / </a>
            <a href="{{ url('/cart') }}" style="color:white;font-size:20px;"> My Orders / </a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Order View Details</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name:</label>
                                <div class="border p-2">{{ $orders->user->name }}</div>
                                <label for="">Email:</label>
                                <div class="border p-2">{{ $orders->user->email }}</div>
                                <label for="">Phone:</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label for="">Address 1:</label>
                                <div class="border p-2">{{ $orders->address }}</div>
                                <label for="">Address 2:</label>
                                <div class="border p-2">{{ $orders->user->address }}</div>
                                <a href="{{ route('singleOrderpdf', $orders->id) }}"
                                    class="btn btn-warning btn-sm mt-3 mb-3">Download PDF</a>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> Product Id </th>
                                            <th> Name </th>
                                            <th> Quantity </th>
                                            <th> Price </th>
                                            <th> Image </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitem as $Item)
                                            <tr>
                                                <td>{{ $Item->products->id }}</td>
                                                <td>{{ $Item->products->p_name }}</td>
                                                <td>{{ $Item->quantity }}</td>
                                                <td>{{ $Item->products->p_price }}</td>
                                                <td><img src="{{ asset('product/' . $Item->products->p_image) }}"
                                                        height="80px" width="100px;" class="image_set" alt="Image"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <hr>
                                <div class="total-container">
                                    <h2 class="total-label">Grand Total:</h2>
                                    <h2 class="total-value">{{ $orders->price }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
