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
@if (session('success'))
<script>
    alert('Success: {{ session('success') }}');
</script>
@endif
<div class="shadow-sm bg-warning border-top py-3 mb-4">
    <div class="container">
        <a href="{{ url('/') }}" style="color:white;font-size:20px;margin-right:30px;"> Home </a>
        <span style="color:white;font-size:20px;"> / </span>
        <a href="{{ url('/cart') }}" style="color:white;font-size:20px;"> My Orders </a>
        <span style="color:white;font-size:20px;"> / </span>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="alert alert-warning">Appointment Details</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name:</label>
                            <div class="border p-2">{{ Auth::user()->name }}</div>
                            <label>Email:</label>
                            <div class="border p-2">{{ Auth::user()->email }}</div>
                            <label>Phone:</label>
                            <div class="border p-2">{{ Auth::user()->phone }}</div>
                            <label>Address 1:</label>
                            <div class="border p-2">{{ $bookings->address }}</div>
                            <label>Special Requests:</label>
                            @if ($bookings->special_requests != null)
                            <div class="border p-2">{{ $bookings->special_requests }}</div>
                            @else
                            <div class="border p-2">No Special Request</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Appointment Time</th>
                                        <th>Address</th>
                                        <th>Booking Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $bookings->designer->fname . ' ' . $bookings->designer->lname }}</td>
                                        <td>{{ $bookings->category->c_name }}</td>
                                        <td>{{ $bookings->time->time_in }} to {{ $bookings->time->time_out }}</td>
                                        <td>{{ $bookings->user->address }}</td>
                                        <td>{{ $bookings->time->date }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>

                            @if ($bookings->status == 1)
                            <button type="button" class="btn btn-dark total-value m-2" data-bs-toggle="modal"
                                data-bs-target="#updateStatusModal">
                                Send Mail To Designer
                            </button>

                            <a href="{{ url('chatify',$bookings->designer->user->id) }}" class="btn btn-success">Chat With Designer</a>

                            <!-- Modal -->
                            <div class="modal fade" id="updateStatusModal" tabindex="-1"
                                aria-labelledby="updateStatusModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-dark text-light">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateStatusModalLabel">Send Email
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('sendEmail') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="order_status" value="1">
                                                <input type="hidden" name="designer_email"
                                                    value="{{ $bookings->designer->user->email }}">
                                                <label for="feedback" class="form-label">Your Message:</label>
                                                <textarea name="message" id="message" class="form-control bg-dark text-light" rows="4"
                                                    placeholder="Enter your message here..." required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection