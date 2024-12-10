@extends('designer.master')
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
        <h1>Show Timing Here..</h1>
        <a href="{{ route('add_time') }}" class="btn btn-secondary float-end m-2 mb-2">Add Time</a>
        <a href="{{ route('timeslotpdf') }}" class="btn btn-warning float-end m-2 mb-2">Download PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Time_in</th>
                    <th>Time_out</th>
                    <th>Is Booked</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($time as $tim)
                    <tr>
                        <td>{{ $tim->id }}</td>
                        <td>{{ $tim->time_in }}</td>
                        <td>{{ $tim->time_out }}</td>
                        <td>
                            @if ($tim->is_booked == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </td>
                        <td>{{ $tim->date }}</td>
                        @if ($tim->is_booked == 0)
                            <td><a href="{{ route('edit_time', $tim->id) }}" class="btn btn-warning">Edit</a></td>
                            <td><a href="{{ route('delete_time', $tim->id) }}" class="btn btn-danger">Delete</a></td>
                        @else
                            <td colspan="2" class="">First You Have To Cancel The Appointment</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
