@extends('admin.master')

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
    @if (session('error'))
        <script>
            alert('Error: {{ session('error') }}');
        </script>
    @endif

    @if (session('success'))
        <script>
            alert('Success: {{ session('success') }}');
        </script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="alert alert bg-dark">Complete Order Detail</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="text-light">First Name:</label>
                                <div class="border p-2">{{ $orders->user->name }}</div> <br>
                                <label for="" class="text-light">Email:</label>
                                <div class="border p-2">{{ $orders->user->email }}</div> <br>
                                <label for="" class="text-light">Phone:</label>
                                <div class="border p-2">{{ $orders->phone }}</div> <br>
                                <label for="" class="text-light">Address 1:</label>
                                <div class="border p-2">{{ $orders->address }}</div> <br>
                                <label for="" class="text-light">Address 2:</label>
                                <div class="border p-2">{{ $orders->user->address }}</div> <br>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-light">
                                            <th> Id </th>
                                            <th> Name </th>
                                            <th> Quantity </th>
                                            <th> Price </th>
                                            <th> Image </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitem as $Item)
                                            <tr>
                                                <td>{{ $Item->id }}</td>
                                                <td>{{ $Item->products->p_name }}</td>
                                                <td>{{ $Item->quantity }}</td>
                                                <td>{{ $Item->products->p_price }}</td>
                                                <td><img src="{{ asset('product/' . $Item->products->p_image) }}"
                                                        height="80;" width="100%;" class="image_set" alt="Image"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <hr>
                                <div class="total-container mb-3">
                                    <h2 class="total-label text-light">Grand Total:</h2>
                                    <h2 class="total-value">{{ $orders->total_price }}</h2>
                                </div>
                                <form action="{{ url('admin/update_order/' . $orders->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <label for="name">Select Status*</label>
                                    <select class="form-select bg-dark text-light" name="order_status"
                                        aria-label="Default select example" class="form-control">
                                        <option {{ $orders->status == '0' ? 'Selected' : '' }} value="0">Pending
                                        </option>
                                        <option {{ $orders->status == '1' ? 'Selected' : '' }} value="1">Completed
                                        </option>
                                    </select> <br>
                                    <label for="name">Select Delivery Status*</label>
                                    <select class="form-select bg-dark text-light" name="delivery_status"
                                        aria-label="Default select example" class="form-control">
                                        <option {{ $orders->delivery == '0' ? 'Selected' : '' }} value="0">Pending
                                        </option>
                                        <option {{ $orders->delivery == '1' ? 'Selected' : '' }} value="1">Completed
                                        </option>
                                    </select> <br>
                                    <button class="btn btn-dark total-value" type="submit">Update Status</button>
                            </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        * {
            color: white !important;
        }
    </style>
@endsection
