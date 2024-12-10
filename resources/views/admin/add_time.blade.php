@extends('designer.master')
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
    <div class="container">
        <h1>Add Timing details here...</h1><br>
        <form action="{{ route('store_time') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="time" name="start_time" class="form-control text-dark" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="time" name="end_time" class="form-control text-dark" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control text-dark" required>
            </div>
            <input type="submit" value="Add Timing" class="btn btn-dark">
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dateInput = document.querySelector('input[name="date"]');
            const today = new Date().toISOString().split("T")[0];
            dateInput.setAttribute('min', today);

            document.querySelector('form').addEventListener('submit', function(event) {
                const startTime = document.querySelector('input[name="start_time"]').value;
                const endTime = document.querySelector('input[name="end_time"]').value;

                if (startTime >= endTime) {
                    event.preventDefault();
                    alert('Start time must be before end time. Please correct the times.');
                }
            });
        });
    </script>
@endsection
