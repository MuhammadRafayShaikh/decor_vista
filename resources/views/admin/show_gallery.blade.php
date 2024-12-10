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
    <h1>Show Gallery Here..</h1>
    <a href="{{url('admin/add_img')}}" class="btn btn-secondary float-end mb-2">Add Image</a>
    <table class="table">
        <thead class="text-light">
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-light" id="gallery_table">
            @foreach ($gallery as $gall)
            <tr>
                <td>{{$gall->id}}</td>
                <td>{{$gall->category->c_name}}</td>
                <td><img src="{{ asset('gallery/' . $gall->g_image) }}" height="100px" width="100px"></td>
                <td><a href="{{url('admin/edit_img',$gall->id)}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{url('admin/delete_img',$gall->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
