<!DOCTYPE html>
<html>

<head>
    <title>Your Order Details</title>
</head>

<body>
    <h1>Thank you for your order!</h1>
    <p>Dear {{ $orders->user->name }},</p>
    <p>Here are the details of the products you purchased:</p>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders->orderitem as $item)
                <tr>
                    <td>{{ $item->products->p_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->products->p_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h3>Grand Total: {{ $orders->price }}</h3>
    <p>We appreciate your business!</p>
</body>

</html>
