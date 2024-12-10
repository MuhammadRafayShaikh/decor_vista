@extends('master')
@section('content')

<div class="shadow-sm bg-warning border-top py-3 mb-4">
    <div class="container">
        <a href="{{ url('/') }}" style="color:white;font-size:20px;margin-right:30px;"> Home / </a>
        <a href="{{ url('/cart') }}" style="color:white;font-size:20px;"> My Orders / </a>
    </div>
</div>

<div class="container-fluid p-3 mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orders Details</h4>
                </div>
                @if ($orders->count() > 0)
                <div class="card-body">
                    <a href="{{ route('userorderpdf') }}" class="btn btn-warning btn-sm mt-3 mb-3">Download PDF</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Order Id </th>
                                <th> User Name </th>
                                <th> Price </th>
                                <th> Date </th>
                                <th> Payment Status </th>
                                <th> Action </th>
                                <th> Deleivery Status </th>
                                <th> View </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $Item)
                            <tr>
                                <td>{{ $Item->id }}</td>
                                <td>{{ $Item->user->name }}</td>
                                <td>{{ $Item->price }}</td>
                                <td>{{ $Item->created_at }}</td>
                                <td>
                                    @if ($Item->status == 0)
                                    <span class="text-warning p-1 text-bold">Pending</span>
                                    @elseif($Item->status == 1)
                                    <span class="text-success p-1 text-bold">Confirmed</span>
                                    @elseif($Item->status == 2)
                                    <span class="text-danger p-1 text-bold">Cancelled</span>
                                    @else
                                    Unknown Status
                                    @endif
                                </td>
                                <td>
                                    @if ($Item->status == 0)
                                    <form action="{{ route('cancel.order', $Item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Confirm Cancel?')" class="btn btn-danger">Cancel Order</button>
                                    </form>
                                    @elseif($Item->status == 1)
                                    <span class="text-success p-1 text-bold">Your payment has been
                                        completed</span>
                                    @elseif($Item->status == 2)
                                    <span class="text-danger p-1 text-bold">You have canceled your
                                        order</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($Item->delivery == 0)
                                    <span class="text-warning p-1 text-bold">Pending</span>
                                    @elseif($Item->delivery == 1)
                                    <span class="text-success p-1 text-bold">Completed</span>
                                    @elseif($Item->delivery == 2)
                                    <span class="text-danger p-1 text-bold">Cancelled</span>
                                    @else
                                    Unknown Status
                                    @endif
                                </td>
                                <td>
                                    
                                    <a href="{{ url('view_orders/' . $Item->id) }}"
                                        class="btn btn-info">View</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                @else
                <h2 class="text-center mt-4 mb-4">You Have No Orders!</h2>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection