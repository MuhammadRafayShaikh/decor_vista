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
        <h1>Show Products Here..</h1>
        <a href="{{ url('admin/add_prod') }}" class="btn btn-secondary float-end mb-2 m-2">Add Product</a>
        <a href="{{ route('productpdf') }}" class="btn btn-warning float-end mb-2 m-2">Download PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="product_table">
                @foreach ($product as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->category->c_name }}</td>
                        <td>{{ $prod->p_name }}</td>
                        <td>{{ $prod->p_price }}</td>
                        <td><img src="{{ asset('product/' . $prod->p_image) }}" height="100px" width="100px"></td>
                        <td><a href="{{ url('admin/edit_prod', $prod->id) }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ url('admin/delete_prod', $prod->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="searchResults"></div>

@endsection
