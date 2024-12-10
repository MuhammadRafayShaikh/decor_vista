@extends('master')
@section('content')
    <div class="shadow-sm bg-warning border-top py-3 mb-4">
        <div class="container">
            <a href="{{ url('/') }}" style="color:white;font-size:20px;margin-right:30px;"> Home / </a>
            <a href="{{ url('/cart') }}" style="color:white;font-size:20px;"> My Orders / </a>
        </div>
    </div>
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
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Appointment Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Designer Name </th>
                                    <th> Designer Category </th>
                                    <th> Booking Date </th>
                                    <th> Phone </th>
                                    <th> Status </th>
                                    <th> View </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ $booking->designer->fname . ' ' . $booking->designer->lname }}</td>
                                        <td>{{ $booking->category->c_name }}</td>
                                        <td>{{ $booking->time->date }}</td>
                                        <td>{{ Auth::user()->phone }}</td>
                                        <td>{{ $booking->status == '0' ? 'Pending' : 'Confirmed' }}</td>
                                        <td>
                                            <a href="{{ url('view_book/' . $booking->id) }}"
                                                class="btn btn-warning">View</a>
                                        </td>
                                        <td>
                                            <!-- Cancel Appointment Button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#cancelModal{{ $booking->id }}">
                                                Cancel Appointment
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Cancel Appointment -->
                                    <div class="modal fade" id="cancelModal{{ $booking->id }}" tabindex="-1"
                                        aria-labelledby="cancelModalLabel{{ $booking->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-dark text-light">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cancelModalLabel{{ $booking->id }}">Cancel
                                                        Appointment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <label for="reason" class="form-label">Reason for
                                                            Cancellation:</label>
                                                        <textarea name="cancel_reason" id="reason" class="form-control bg-dark text-light" rows="4" required
                                                            placeholder="Enter your reason..."></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Confirm
                                                            Cancellation</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>


                        </table>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Cancel Appointment Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Designer Name </th>
                                    <th> Designer Category </th>
                                    <th> Booking Date & Time</th>
                                    <th> Cancel Date & Time </th>
                                    <th>Cancel Reason</th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cancelbookings as $cancelbooking)
                                    <tr>
                                        <td>{{ $cancelbooking->id }}</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ $cancelbooking->designer->fname . ' ' . $cancelbooking->designer->lname }}
                                        </td>
                                        <td>{{ $cancelbooking->category->c_name }}</td>
                                        <td>{{ $cancelbooking->time->date }}
                                            <small>{{ $cancelbooking->time->time_in . '-' . $cancelbooking->time->time_out }}</small>
                                        </td>
                                        <td>{{ $cancelbooking->created_at }}</td>
                                        <td><b><i>{{ $cancelbooking->cancel_reason }}</i></b></td>
                                        <td>
                                            @if ($cancelbooking->uc != 0)
                                                {{ 'You Cancelled' }}
                                            @else
                                                {{ 'Designer Cancelled' }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Complete Appointment Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Designer Name </th>
                                    <th> Designer Category </th>
                                    <th> Booking Date & Time</th>
                                    <th> Confirm Date & Time</th>
                                    <th> Feedback </th>
                                    <th> Status </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($confirmbookings as $confirmbooking)
                                    <tr>
                                        <td>{{ $confirmbooking->id }}</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ $confirmbooking->designer->fname . ' ' . $confirmbooking->designer->lname }}
                                        </td>
                                        <td>{{ $confirmbooking->category->c_name }}</td>
                                        <td>{{ $confirmbooking->time->date }}
                                            <small>{{ $confirmbooking->time->time_in . '-' . $confirmbooking->time->time_out }}</small>
                                        </td>
                                        <td>{{ $confirmbooking->created_at }}</td>
                                        <td><b><i>{{ $confirmbooking->feedback }}</i></b></td>
                                        <td>✔</td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
