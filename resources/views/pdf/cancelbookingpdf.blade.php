<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->name }} Cancel Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            width: 90%;
            max-width: 800px;
        }

        .header {
            text-align: center;
            padding-bottom: 15px;
            margin-bottom: 20px;
            border-bottom: 2px solid #dee2e6;
        }

        .header h1 {
            margin: 0;
            color: #343a40;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #6c757d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #343a40;
            color: #ffffff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ Auth::user()->name }} Cancel Bookings</h1>
            <p>Generated on {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Date & Time</th>
                    <th>Cancel Date & Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($cancelbookings->count() > 0)
                    @foreach ($cancelbookings as $cancelbooking)
                        <tr>
                            <td>{{ $cancelbooking->user->id }}</td>
                            <td>{{ $cancelbooking->user->name }}</td>
                            <td>{{ $cancelbooking->user->email }}</td>
                            <td>{{ $cancelbooking->user->phone }}</td>
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
        <div class="footer">
            <p>Total {{ Auth::user()->name }} Cancel Bookings: {{ $cancelbookings->count() }}</p>
        </div>
    </div>
</body>

</html>
