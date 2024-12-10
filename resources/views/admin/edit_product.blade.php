@extends('admin.master')
@section('content')
@if(session('error'))
<script>
    alert('Error: {{ session('error') }}');
</script>
@endif

@if(session('success'))
<script>
    alert('Success: {{ session('success') }}');
</script>
@endif
<div class="container">
    <h1>Update Products details here...</h1><br>
    <form action="{{ url('admin/update_prod', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <br>

        <select class="form-select" aria-label="Default select example" name="category_id" required>
            <option value="" selected disabled>Select Category</option>
            @foreach ($category as $cat)
                <option @if($product->category_id == $cat->id)
                    {{ "selected" }}
                    @else
                    {{ "" }}
                    @endif value="{{ $cat->id }}">{{ $cat->c_name }}</option>
            @endforeach
        </select><br>

        <input type="text" name="p_name" value="{{ $product->p_name }}" placeholder="Enter your product name:" class="form-control"><br>
        <input type="text" name="p_price" value="{{ $product->p_price }}" placeholder="Enter your product price:" class="form-control"><br>
        <input type="text" name="quantity" value="{{ $product->quantity }}" placeholder="Enter your product quantity:" class="form-control"><br>
        <input type="file" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" name="p_image" placeholder="Enter your product image:" class="form-control"><br><br>

        <img height="100px" width="100px" src="{{ asset('product/' . $product->p_image) }}" id="image" alt="">
        <br><br>

        <input type="submit" value="Update Product" class="btn btn-dark">
    </form>
</div>
@endsection
