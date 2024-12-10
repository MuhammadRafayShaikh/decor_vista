@extends('designer.master')

@section('content')
<!-- Include Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Appointment Detail</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>User Name:</label>
                            <div class="border p-2">{{ $bookings->user->name }}</div>
                            <label>User Email:</label>
                            <div class="border p-2">{{ $bookings->user->email }}</div>
                            <label>User Phone:</label>
                            <div class="border p-2">{{ $bookings->user->phone }}</div>
                            <label>User Address :</label>
                            <div class="border p-2">{{ $bookings->user->address }}</div>
                            @if ($bookings->status == 1)
                            <a href="{{ url('chatify',$bookings->user->id) }}" class="float-end btn btn-success mt-4">
                                Chat With User
                            </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped">

                            </table>
                            <hr>
                            @if ($bookings->time->date <= date('Y-m-d'))
                                <!-- Update Status Button -->
                                <button type="button" class="btn btn-dark total-value m-2" data-bs-toggle="modal"
                                    data-bs-target="#updateStatusModal">
                                    Mark As Complete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="updateStatusModal" tabindex="-1"
                                    aria-labelledby="updateStatusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark text-light">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateStatusModalLabel">Mark as Complete
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('designer/update_bookings/' . $bookings->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="order_status" value="1">
                                                    <label for="feedback" class="form-label">Your Feedback:</label>
                                                    <textarea name="feedback" id="feedback" class="form-control bg-dark text-light" rows="4"
                                                        placeholder="Enter your feedback here..." required></textarea>
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
                                @else
                                @if ($bookings->status == 1)
                                <select class="form-select bg-dark text-light" aria-label="Order status">
                                    <option value="" selected disabled>When Appointment Date Has Passed Then
                                        Complete Option Will Open</option>
                                </select>
                                <button type="button" class="btn btn-success total-value m-2"
                                    data-bs-toggle="modal" data-bs-target="#mail">
                                    Send Mail To Client
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="mail" tabindex="-1"
                                    aria-labelledby="cancelModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark text-light">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cancelModalLabel">Send Mail
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('sendEmail2') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{ $bookings->user->email }}"
                                                        name="user_email">
                                                    <label for="cancel_reason" class="form-label">Sending
                                                        Email:</label>
                                                    <textarea name="cancel_reason" id="cancel_reason" class="form-control bg-dark text-light" rows="3"
                                                        placeholder="Enter Your Message" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <br>
                                @endif
                                <!-- Cancel Appointment Button -->
                                <button type="button" class="btn btn-danger total-value m-2" data-bs-toggle="modal"
                                    data-bs-target="#cancelModal">
                                    Cancel Appointment
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark text-light">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('delete_booking', $bookings->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <label for="cancel_reason" class="form-label">Reason for
                                                        Cancellation:</label>
                                                    <textarea name="cancel_reason" id="cancel_reason" class="form-control bg-dark text-light" rows="3"
                                                        placeholder="Enter your reason here..." required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Confirm
                                                        Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    * {
        color: white !important;
    }
</style>