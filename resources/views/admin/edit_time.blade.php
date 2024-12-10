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
        <h1>Update Timing details here...</h1><br>
        <form action="{{ route('update_time', $time->id) }}" method="post">
            <input type="time" name="time_in" value="{{ $time->time_in }}" placeholder="enter your timing name:"
                class="form-control text-dark">
            @csrf
            <br>
            <input type="time" value="{{ $time->time_out }}" name="time_out" placeholder="enter your timing image:"
                class="form-control text-dark" required><br>
            <input type="date" name="date" value="{{ $time->date }}" placeholder="enter your date:"
                class="form-control text-dark" required><br>
            <input type="submit" value="Update Timing" class="btn btn-dark">
        </form>
    </div>
@endsection
