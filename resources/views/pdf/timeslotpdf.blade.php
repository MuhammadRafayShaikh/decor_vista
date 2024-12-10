<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designer Time Slots Report</title>
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
            <h1>Designer Time Slots Report</h1>
            <p>Generated on {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Time_in</th>
                    <th>Time_out</th>
                    <th>Is Booked</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($times as $time)
                    <tr>
                        <td>{{ $time->id }}</td>
                        <td>{{ $time->time_in }}</td>
                        <td>{{ $time->time_out }}</td>
                        <td>
                            @if ($time->is_booked == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </td>
                        <td>{{ $time->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Total Designer Time Slots: {{ $times->count() }}</p>
        </div>
    </div>
</body>

</html>
