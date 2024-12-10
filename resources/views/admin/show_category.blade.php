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
        <h1>Show Category Here..</h1>
        <a href="{{ url('admin/add_cat') }}" class="btn btn-secondary float-end mb-2 m-2">Add Category</a>
        <a href="{{ route('categorypdf') }}" class="btn btn-warning float-end mb-2 m-2">Download PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="category_table">
                @foreach ($category as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->c_name }}</td>
                        <td><img src="{{ asset('category/' . $cat->c_image) }}" height="100px" width="100px"></td>
                        <td><a href="{{ url('admin/edit_cat', $cat->id) }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ url('admin/delete_cat', $cat->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
