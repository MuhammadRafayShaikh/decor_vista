@extends('admin.master')
@section('content')
    @if (session('success'))
        <script>
            alert('Success: {{ session('success') }}');
        </script>
    @endif
    @if (session('error'))
        <script>
            alert('Error: {{ session('error') }}');
        </script>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="alert alert bg-dark text-center">
                <span><b>
                        <h3> Completed Orders!!!
                            <a href="{{ url('admin/show_orders') }}" class="btn btn-light"><b>Pending Order</b></a>
                            <a href="{{ route('completeOrderpdf') }}" class="btn btn-warning"><b>Download PDF</b></a>

                        </h3>
                    </b></span>
            </div>
        </div>
        <div class="card-body">
            <table class="table  table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th> Customer Name</th>
                        <th>Order date</th>
                        <th>Total Price </th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="com_orders_table">
                    <tr>
                        @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->status == '0' ? 'pending' : 'completed' }}</td>
                        <td>
                            <a href="{{ url('admin/view_order', $order->id) }}" class="btn btn1"> View<i
                                    class="fas fa-view"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
