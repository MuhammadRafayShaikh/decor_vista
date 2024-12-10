@extends('master')

@section('content')
<link href="{{ url('assets/css/cart.css') }}" rel="stylesheet">

<section id="center" class="centre_o pt-5 pb-5">
    <div class="container-xl">
        <div class="row centre_o1">
            <h1 class="mb-0 text-white">Wishlist
                <span class="pull-right fs-6 fw-normal d-inline-block mt-3 col_light text-uppercase">
                    <a class="text-white" href="#">HOME</a>
                    <span class="mx-1 text-white-50">/</span> Wishlist
                </span>
            </h1>
        </div>
    </div>
</section>

<table class="table container">
        @if($wishlist->count() > 0)
        <thead>
        <tr>
            <th>PRODUCT IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>PRICE</th>
            <th>REMOVE</th>
            <th>MOVE TO CART</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($wishlist as $item)
                <tr>
                    <td><img src="{{ asset('product/' . $item->product->p_image) }}" alt="" height="60" width="60"></td>
                    <td>{{ $item->product->p_name }}</td>
                    <td>{{ $item->product->p_price }}</td>
                    <td>
                        <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirmRemove();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn button_2 delete-wishlist-item">
                                <i class="fa fa-trash"></i> Remove
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('wishlist.moveToCart', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirmMove();">
                            @csrf
                            <button type="submit" class="btn button_2">Move to Cart</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
</table>
<div class="container mb-5">
    <a href="{{ url('/products') }}" class="btn button_2">Continue Shopping</a>
</div>
        @else
        <div class="container mb-5">
            <div class="row">
                <div class="col-4"><a href="{{ url('/products') }}" class="btn button_2">Continue Shopping</a></div>
                <div class="col-4"><h2>Your <i class="fa fa-heart"></i> Wishlist is Empty</h2></div>
            </div>
        </div>
        @endif
<script>
    function confirmRemove() {
        if (confirm('Are you sure you want to remove this item from your wishlist?')) {
            alert('Product removed from wishlist.');
            return true; 
        }
        return false; 
    }

    function confirmMove() {
        if (confirm('Are you sure you want to move this item to your cart?')) {
            alert('Product moved to cart.');
            return true; 
        }
        return false; 
    }
</script>

@endsection
