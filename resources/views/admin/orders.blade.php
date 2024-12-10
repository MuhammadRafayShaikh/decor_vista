@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="alert alert bg-dark  text-center">
                <span><b>
                        <h3> New Orders!!!
                            <a href="{{ url('admin/order_history') }}" class="btn btn-light">Completed Order </a>
                            <a href="{{ route('incomOrderpdf') }}" class="btn btn-warning">Download PDF </a>
                        </h3>
                    </b></span>
            </div>
        </div>
        <div class="card-body ">
            <table class="table  table-hover">
                <thead class="text-light">
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Order date</th>

                        <th>Total Price </th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody class="text-light" id="orders_table">
                    <tr>
                        @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->status == '0' ? 'pending' : 'completed' }}</td>
                        <td>
                            <a href="{{ url('admin/view_order', $order->id) }}" class="btn btn1">View<i
                                    class="fas fa-eye "></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
