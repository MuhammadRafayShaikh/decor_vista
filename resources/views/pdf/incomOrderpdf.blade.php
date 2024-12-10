<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders Report</title>
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
            <h1>Pending Orders Report</h1>
            <p>Generated on {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>
                            @foreach ($order->orderitem as $item)
                                <div>
                                    {{ $item->products->p_name }} - Quantity: {{ $item->quantity }} - Price:
                                    {{ $item->products->p_price }}
                                </div>
                            @endforeach
                        </td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Total Pending Orders: {{ $orders->count() }}</p>
        </div>
    </div>
</body>

</html>