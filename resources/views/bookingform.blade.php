@extends('master')
@section('content')
    <style>
        form {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input,
        select,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            background-color: #df1529;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #df1529;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            width: auto;
            margin-right: 10px;
        }
    </style>
    <br><br><br><br><br>
    <h1 class="text-center">Book an Interior Design</h1>



    <form action="{{ route('book') }}" method="POST">

        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required readonly>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required readonly>

        <label for="number">Phone Number:</label>
        <input type="number" id="number" name="phone" value="{{ Auth::user()->phone }}" required readonly>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>


        <label for="designer">Select Interior Designer:</label>
        <select name="designer_id" id="designer_id" required>
            <option value="{{ $designer->id }}">
                {{ $designer->fname }}
            </option>

        </select>

        <label for="category">Select Category:</label>
        <select name="category_id" id="category" required>
            <option value="{{ $designer->category_id }}"
                {{ old('category_id') == $designer->category_id ? 'selected' : '' }}>
                {{ $designer->category_name }}
            </option>

        </select>

        <label for="date">Select Date</label>
        <select name="b_date" id="date" required>
            @if ($time->count() > 0)
                <option value="" disabled selected>Select a Date</option>
                @foreach ($time as $times)
                    <option value="{{ $times->date }}">{{ $times->date }}</option>
                @endforeach
            @else
                <option value="" disabled selected>No Time Slots Available</option>
            @endif
        </select>



        <label for="time">Select Time:</label>
        <select name="time_id" id="time" required>
            <option value="" disabled selected>Select a Time Slot</option>
        </select>
        <label for="special-requests">Special Requests/Instructions</label>
        <textarea id="special-requests" name="special_requests" rows="4"></textarea>

        <button type="submit" class="btn btn-warning">Book Now</button>
    </form>

    <br><br><br><br>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dateInput = document.querySelector('input[name="b_date"]');
            const today = new Date();

            // Set the date to tomorrow
            today.setDate(today.getDate() + 1);
            const tomorrow = today.toISOString().split("T")[0];

            dateInput.setAttribute('min', tomorrow);
        });

        document.querySelector('form').addEventListener('submit', function(event) {
            const startTimes = document.querySelectorAll('input[name="start_time[]"]');
            const endTimes = document.querySelectorAll('input[name="end_time[]"]');

            for (let i = 0; i < startTimes.length; i++) {
                let startTime = startTimes[i].value;
                let endTime = endTimes[i].value;

                if (startTime >= endTime) {
                    event.preventDefault();
                    alert('Start time must be before end time. Please correct the times.');
                    return false;
                }
            }
        });
    </script>



    <script>
        $(document).ready(function() {
            $("#date").on('change', function() {
                var designer_id = $("#designer_id").val();
                var date = $("#date").val();
                // alert(date)

                $.ajax({
                    url: '/fetch_time',
                    type: 'GET',
                    data: {
                        designer_id: designer_id,
                        date: date
                    },
                    success: function(response) {
                        console.log(response.date);

                        $("#time").empty();
                        $.each(response, function(key, value) {

                            var output = `
                        <option value="${value.id}" selected>${value.time_in + '-' + value.time_out}</option>
                        `
                            $("#time").append(output)

                        })
                    }
                })
            })
        })
    </script>
@endsection
