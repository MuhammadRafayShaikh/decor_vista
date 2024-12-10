<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designers Bookings</title>
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
            <h1>Designers Bookings</h1>
            <p>Generated on {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>
        <table>
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
            <tbody class="text-light">
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->designer->user->id }}</td>
                        <td>{{ $booking->designer->user->name }}</td>
                        <td>{{ $booking->time->date }}
                            <small>{{ $booking->time->time_in . ' ' . 'to' . ' ' . $booking->time->time_out }}</small>
                        </td>
                        <td>{{ $booking->status == '0' ? 'pending' : 'completed' }}</td>
                        <td>{{ $booking->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Designers Bookings: {{ $bookings->count() }}</p>
        </div>
    </div>
</body>

</html>
