@extends('admin.master')
@section('content')
    @if (session('error'))
        <script>
            alert('Error: {{ session('error') }}');
        </script>
    @endif

    @if (session('success'))
        <script>
            alert('Success: {{ session('success') }}');
        </script>
    @endif

    <div class="container">
        <h1>Add Products details here...</h1>
        <a href="{{ url('admin/show_prod') }}" class="btn btn-secondary float-end mb-2">Show Product</a>
        <form action="{{ url('admin/store_prod') }}" method="post" enctype="multipart/form-data">
            @csrf
            <br>
            <select class="form-select" aria-label="Default select example" class="form-select" name="category_id" required>
                <option selected>Select Category</option>
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->c_name }}</option>
                @endforeach
            </select><br>
            <input type="text" name="p_name" placeholder="enter your product name:" class="form-control" required><br>
            <input type="number" min="1" name="p_price" placeholder="enter your product price:" class="form-control"
                required><br>
            <input type="number" min="1" name="quantity" placeholder="enter your product quntity:"
                class="form-control" required><br>
            <input type="file" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" name="p_image" placeholder="enter your product image:" class="form-control" required><br>
            <img id="image" src="" alt=""
            width="100px" /><br>
            <input type="submit" value="Add Product" class="btn btn-light">
        </form>
    </div>
@endsection
