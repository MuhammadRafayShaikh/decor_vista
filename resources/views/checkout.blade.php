@extends('master')
@section('content')
<link href="{{ url('assets/css/checkout.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<section id="center" class="centre_o pt-5 pb-5">
    <div class="container-xl">
        <div class="row centre_o1">
            <h1 class="mb-0 text-white"> Checkout
                <span class="pull-right fs-6 fw-normal d-inline-block mt-3 col_light text-uppercase">
                    <a class="text-white" href="#">HOME</a>
                    <span class="mx-1 text-white-50">/</span> Checkout
                </span>
            </h1>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
</head>

<body>
    <style>
        .checkout-form label {
            font-size: 12px;
            font-weight: 700;
        }

        .checkout-form input {
            font-size: 12px;
            font-weight: 400;
            padding: 5px;
        }
    </style>
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container mt-4 my-4">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" placeorder="Enter First Name" value="{{ Auth::user()->name }}"
                                    name="name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" placeorder="Enter First Name" value="{{ Auth::user()->email }}"
                                    name="email" class="form-control" readonly>
                            </div>
                            <div class="col-md-6  mt-3">
                                <label for="name">Address 2</label>
                                <input type="text" placeorder="Enter Address2" value="{{ Auth::user()->address }}"
                                    name="address" required class="form-control" readonly>
                            </div>
                            <div class="col-md-6  mt-3">
                                <label for="name">Phone</label>
                                <input type="number" value="{{ Auth::user()->phone }}" readonly
                                    placeorder="Enter Address2" value="" name="phone" required
                                    class="form-control">
                            </div>
                            @if ($cart->count() > 0)
                            <div class="col-md-12  mt-3">
                                <label for="name">Payment Method</label>
                                <select name="" id="method" class="form-control" required>
                                    <option selected disabled>Select Method</option>
                                    <option value="1">Online</option>
                                    <option value="2">Cash On Deleivery (COD)</option>
                                </select>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4>Orders Details</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Quantity </th>
                                    <th> Price </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $grandTotal = 0;
                                @endphp
                                @foreach ($cart as $Item)
                                <tr>
                                    <td>{{ $Item->product->id }}</td>
                                    <td>{{ $Item->product->p_name }}</td>
                                    <td>{{ $Item->quantity }}</td>
                                    <td>{{ $Item->product->p_price }}</td>
                                    @php
                                    $itemTotal = $Item->product->p_price * $Item->quantity;
                                    $grandTotal += $itemTotal;
                                    @endphp
                                    @endforeach

                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b><i>Total Price: {{ $grandTotal }}</i></b></td>
                                </tr>
                                </tr>
                            </tbody>

                        </table>
                        <hr>
                        @if ($cart->count() > 0)
                        <button type="button" class="btn btn-success float-right" data-bs-toggle="modal"
                            data-bs-target="#cancelModal" style="display: none;" id="order_btn">
                            Place Order
                        </button>
                        <button type="button" class="btn btn-success float-right" style="display: none;" id="order_btn2">
                            Place Order
                        </button>
                        {{-- <button type="submit" class="btn button_2 rounded-sm text-white float-right">Place
                                    Order</button> --}}

                        <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark text-light">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cancelModalLabel">Cancel
                                            Appointment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>


                                    <div class="container mt-5">
                                        <h1 class="text-center">Stripe Payment</h1>
                                        <form id="payment-form" class="mt-4">
                                            <input type="hidden" id="name" name="name"
                                                value="{{ Auth::user()->name }}">
                                            <input type="hidden" id="email" name="email"
                                                value="{{ Auth::user()->email }}">
                                            <input type="hidden" id="address" name="address"
                                                value="{{ Auth::user()->address }}">
                                            <input type="hidden" id="phone" name="phone"
                                                value="{{ Auth::user()->phone }}">
                                            <input type="hidden" id="price" name="price"
                                                value="{{ $grandTotal }}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="card-number">Card Number</label>
                                                    <div id="card-number" class="form-control"
                                                        style="padding: 10px;">
                                                    </div>
                                                    <div id="card-errors" role="alert" class="text-danger">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group">
                                                        <label for="expiry">Expiry Date (MM/YY)</label>
                                                        <div id="expiry" class="form-control"
                                                            style="padding: 10px;"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cvv">CVV</label>
                                                        <div id="cvv" class="form-control"
                                                            style="padding: 10px;"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="zip">ZIP Code</label>
                                                    <input type="text" id="zip" class="form-control"
                                                        placeholder="ZIP Code" required>
                                                </div>

                                                <div id="payment-response" class="mt-3"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @else
                        <button type="button" title="Your Cart is empty" style="cursor: not-allowed"
                            class="btn btn-success float-right">
                            Place Order
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        $("#method").on('change', function() {
            if ($("#method").val() == 1) {
                $("#order_btn").show();
                $("#order_btn2").hide();
                const stripe = Stripe('pk_test_51QC2ODIe4idSW70t3KGivHvvWGDachFhshcM3FC3kUOGiog9iupBTWRzeSR622duJ94Vzpuk034kvUAHK9OdviY100JX1FOvsF');
                const elements = stripe.elements();

                const cardNumberElement = elements.create('cardNumber');
                cardNumberElement.mount('#card-number');

                const cardExpiryElement = elements.create('cardExpiry');
                cardExpiryElement.mount('#expiry');

                const cardCvcElement = elements.create('cardCvc');
                cardCvcElement.mount('#cvv');


                $('#payment-form').on('submit', function(event) {
                    event.preventDefault();

                    var name = $("#name").val();
                    var email = $("#email").val();
                    var address = $("#address").val();
                    var phone = $("#phone").val();
                    var price = $("#price").val();
                    var method = $("#method").val();

                    stripe.createPaymentMethod({
                        type: 'card',
                        card: cardNumberElement,
                        billing_details: {
                            address: {
                                postal_code: $('#zip').val(),
                            },
                        },
                    }).then(function(result) {
                        if (result.error) {
                            $('#card-errors').text(result.error.message);
                        } else {
                            $.ajax({
                                url: '/store/order',
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content'),
                                    'Content-Type': 'application/json'
                                },
                                data: JSON.stringify({
                                    stripeToken: result.paymentMethod.id,
                                    amount: price,
                                    name: name,
                                    email: email,
                                    address: address,
                                    phone: phone,
                                    method: method
                                }),
                                success: function(data) {
                                    console.log(data);
                                    alert(data.message);
                                    if (data.success === true) {

                                        $('#payment-response').text(data.success ?
                                            'Payment Successful!' : data.error);
                                        setTimeout(function() {
                                            window.location.href = '/my_orders'
                                        }, 1000);
                                    } else {
                                        $('#payment-response').text(data.success ?
                                            'Payment Successful!' : data.error);
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    $('#payment-response').text('An error occurred: ' +
                                        errorThrown);
                                }
                            });
                        }
                    });
                });

            } else {
                $("#order_btn2").show();
                $("#order_btn").hide();

                $("#order_btn2").on('click', function(e) {
                    e.preventDefault();
                    var confirmation = confirm("Confirm Order?")
                    if (confirmation) {

                        var name = $("#name").val();
                        var email = $("#email").val();
                        var address = $("#address").val();
                        var phone = $("#phone").val();
                        var price = $("#price").val();
                        var method = $("#method").val();

                        $.ajax({
                            url: '/store/order',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'),
                                'Content-Type': 'application/json'
                            },
                            data: JSON.stringify({
                                amount: price,
                                name: name,
                                email: email,
                                address: address,
                                phone: phone,
                                method: method
                            }),
                            success: function(data) {
                                console.log(data);
                                alert(data.message);
                                if (data.success === true) {

                                    $('#payment-response').text(data.success ?
                                        'Payment Successful!' : data.error);
                                    setTimeout(function() {
                                        window.location.href = '/my_orders'
                                    }, 1000);
                                } else {
                                    $('#payment-response').text(data.success ?
                                        'Payment Successful!' : data.error);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                $('#payment-response').text('An error occurred: ' +
                                    errorThrown);
                            }

                        })

                    }
                })

            }
        })
    })
</script>
@endsection