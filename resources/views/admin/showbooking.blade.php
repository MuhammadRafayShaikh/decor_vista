@extends('admin.master')
@section('content')
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
        <h1>Show Designers Booking Here..</h1>
        <a href="{{ route('bookingpdf') }}" class="btn btn-warning mt-3 mb-3">Download PDF</a>
        <table class="table">
            <thead class="text-light">
                <tr>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Designer Id</th>
                    <th>Designer Name</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody class="text-light" id="bookings_table">
                @foreach ($booking as $book)
                    <tr>
                        <td>{{ $book->user->id }}</td>
                        <td>{{ $book->user->name }}</td>
                        <td>{{ $book->designer->user->id }}</td>
                        <td>{{ $book->designer->user->name }}</td>
                        <td>{{ $book->time->date }}
                            <small>{{ $book->time->time_in . ' ' . 'to' . ' ' . $book->time->time_out }}</small>
                        </td>
                        <td>{{ $book->status == '0' ? 'pending' : 'completed' }}</td>
                        <td>{{ $book->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
