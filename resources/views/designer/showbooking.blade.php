@extends('designer.master')
@section('content')
@if(session('success'))
<script>
    alert('Success: {{ session('success') }}');
</script>
@endif
@if(session('status'))
<script>
    alert('Success: {{ session('status') }}');
</script>
@endif
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <h1>Users Booking...</h1>
    <a href="{{ route('desingerbookingpdf') }}" class="btn btn-warning btn-sm">Download PDF</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Designer Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @if ($bookings->count() > 0)
            @foreach ($bookings as $bookings)
            <tr>
                <td>{{ $bookings->id }}</td>
                <td>{{ $bookings->user->name }}</td>
                <td>{{ $bookings->user->email }}</td>
                <td>{{ $bookings->user->phone }}</td>
                <td>{{ $bookings->designer->fname }}</td>
                <td>{{ $bookings->time->date }}</td>
                <td><small>{{ $bookings->time->time_in }} to {{ $bookings->time->time_out }}</small></td>
                @if ($bookings->status == '0')
                <td><button class="btn btn1" id="pendingbtn">
                        <input type="hidden" id="booking_id" value="{{ $bookings->id }}">
                        {{ 'Pending' }}
                    </button></td>
                @else
                <td><button class="btn btn1" style="cursor: not-allowed">
                        {{ 'Confirmed' }}
                    </button></td>
                @endif
                <td><a href="{{ url('designer/view_bookings', $bookings->id) }}" class="btn1 btn"> View<i
                            class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="9" class="text-center mt-4 mb-4">No Appointment</td>
            </tr>
            @endif

        </tbody>

    </table>
</div>

<div class="container mt-5">
    <h1>❌Cancel Bookings...</h1>
    <a href="{{ route('cancelbookingpdf') }}" class="btn btn-warning btn-sm">Download PDF</a>
    <table class="table">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Designer Name</th>
                <th>Date & Time</th>
                <th>Cancel Date & Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($cancelbookings->count() > 0)
            @foreach ($cancelbookings as $cancelbooking)
            <tr>
                <td>{{ $cancelbooking->user->name }}</td>
                <td>{{ $cancelbooking->user->email }}</td>
                <td>{{ $cancelbooking->user->phone }}</td>
                <td>{{ $cancelbooking->designer->fname }}</td>
                <td>{{ $cancelbooking->time->date }} <small>{{ $cancelbooking->time->time_in }} to
                        {{ $cancelbooking->time->time_out }}</small></td>
                <td>{{ $cancelbooking->created_at }}</td>
                <td>
                    @if ($cancelbooking->dc == 1)
                    {{ 'You Cancelled' }}
                    @else
                    {{ 'User Cancelled' }}
                    @endif
                </td>


            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="9" class="text-center mt-4 mb-4">No Cancel Appointment</td>
            </tr>
            @endif

        </tbody>

    </table>
</div>

<div class="container mt-5">
    <h1>✔ Complete Bookings...</h1>
    <a href="{{ route('completebookingpdf') }}" class="btn btn-warning btn-sm">Download PDF</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Designer Name</th>
                <th>Date & Time</th>
                <th>Confirm Date & Time</th>
            </tr>
        </thead>
        <tbody>
            @if ($confirmbookings->count() > 0)
            @foreach ($confirmbookings as $confirmbooking)
            <tr>
                <td>{{ $confirmbooking->id }}</td>
                <td>{{ $confirmbooking->user->name }}</td>
                <td>{{ $confirmbooking->user->email }}</td>
                <td>{{ $confirmbooking->user->phone }}</td>
                <td>{{ $confirmbooking->designer->fname }}</td>
                <td>{{ $confirmbooking->time->date }} <small>{{ $confirmbooking->time->time_in }} to
                        {{ $confirmbooking->time->time_out }}</small></td>
                <td>{{ $confirmbooking->created_at }}</td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="9" class="text-center mt-4 mb-4">No Confirm Appointment</td>
            </tr>
            @endif

        </tbody>

    </table>
</div>
<style>
    * {
        color: white;
    }
</style>

<script>
    $(document).ready(function() {
        $("#pendingbtn").on('click', function() {

            var confirmation = confirm("Are you sure to confirm the appointment? Once Confirmed it will not be change")

            if (confirmation) {

                var booking_id = $("#booking_id").val();
                $.ajax({
                    url: `/designer/confirm_appointment/${booking_id}`,
                    type: 'POST',
                    data: {
                        booking_id: booking_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        alert(response)
                        window.location.href = '/designer/showbooking';
                    },
                    error(error) {
                        console.log(error);

                    }
                })

            }
        })
    })
</script>
@endsection