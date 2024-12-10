@extends('master')
@section('content')
<link href="{{url('assets/css/cart.css')}}" rel="stylesheet">
<section id="center" class="centre_o pt-5 pb-5">
    <div class="container-xl">
        <div class="row centre_o1">
            <h1 class="mb-0 text-white">Shopping Cart
                <span class="pull-right fs-6 fw-normal d-inline-block mt-3 col_light text-uppercase">
                    <a class="text-white" href="#">HOME</a>
                    <span class="mx-1 text-white-50">/</span> Shopping Cart
                </span>
            </h1>
        </div>
    </div>
</section>

@if(session('success'))
<script>
    toastr.success('{{ session('success') }}');
</script>
@endif
@if(session('error'))
<script>
    toastr.success('{{ session('error') }}');
</script>
@endif
<table class="table container">
        @if($cart->count() > 0)
        <thead>
        <tr>
            <th>PRODUCT IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>UPDATE QUANTITY</th>
            <th>PRICE</th>
            <th>TOTAL PRICE</th>
            <th>REMOVE</th>
        </tr>
    </thead>
    <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($cart as $item)
                <tr>
                    <td><img src="{{ asset('product/'.$item->product->p_image) }}" alt="" height="60px" width="60px"></td>
                    <td>{{ $item->product->p_name }}</td>
                    <td>
                        <input type="number" min="1" data-cart-id="{{ $item->id }}"
                               data-available-quantity="{{ $item->product->quantity }}"
                               class="quantity-input form-control"
                               value="{{ $item->quantity }}">
                    </td>
                    <td>{{ $item->product->p_price }}</td>

                    <td>{{ (int) ($item->quantity ?? 0) * (float) ($item->product->p_price ?? 0) }}</td>
                    <td>
    <a href="{{ route('cart.destroy', $item->id) }}" class="btn button_2 delete-cart-item"
       onclick="return confirmRemove();">
        <i class="fa fa-trash"></i> Remove
    </a>
</td>
                </tr>
                @php $grandTotal += (float) ($item->product->p_price ?? 0) * (int) ($item->quantity ?? 0); @endphp
            @endforeach
            <tr>
                <td colspan="6"><h1>Total Price: {{ $grandTotal }}</h1></td>
            </tr>

            </tbody>
</table>
<div class="container mb-5">
    <a href="{{ route('create.order')}}" class="btn button_2 ">Proceed To Checkout</a>
</div>
        @else
        <div class="container mb-5">
            <div class="row">
                <div class="col-4 ">
                    <a href="{{ url('products') }}" class="btn button_2 float-end">Continue Shopping</a>
                </div>
                <div class="col-4 card-body text-center">
                        <h2>Your <i class="fa fa-shopping-cart"></i> Cart is Empty</h2>
                </div>
            </div>
        </div>
        @endif


<script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
<script>
    $('input.quantity-input').change(function (e) {
        e.preventDefault();
        var quantity = $(this).val();
        var cartId = $(this).data('cart-id');
        var availableQuantity = $(this).data('available-quantity');

        if (quantity > availableQuantity) {
            alert('Quantity exceeds available stock. Maximum allowed quantity is ' + availableQuantity);
            $(this).val(availableQuantity); // Set to maximum available quantity
            quantity = availableQuantity; // Adjust quantity to match available
        }

        $.ajax({
            type: "POST",
            url: "/cart/update/" + cartId,
            data: {
                quantity: quantity,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function (response) {
                window.location.reload();
            },
            error: function (response) {
                console.error('Error:', response);
                alert(response.responseJSON.message);
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
<script>
    $('input.quantity-input').change(function (e) {
        e.preventDefault();
        var quantity = $(this).val();
        var cartId = $(this).data('cart-id');
        var availableQuantity = $(this).data('available-quantity');

        if (quantity > availableQuantity) {
            alert('Quantity exceeds available stock. Maximum allowed quantity is ' + availableQuantity);
            $(this).val(availableQuantity); // Set to maximum available quantity
            quantity = availableQuantity; // Adjust quantity to match available
        }

        $.ajax({
            type: "POST",
            url: "/cart/update/" + cartId,
            data: {
                quantity: quantity,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function (response) {
                window.location.reload();
            },
            error: function (response) {
                console.error('Error:', response);
                alert(response.responseJSON.message);
            }
        });
    });

    function confirmRemove() {
        if (confirm("Product removed. Are you sure you want to remove this item from your cart?")) {
            alert("Product removed.");
            return true; // Proceed with the removal
        }
        return false; // Cancel the removal
    }
</script>

@endsection
