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
    <h1>Edit category details here...</h1><br>
    <form action="{{url('admin/update_cat',$category->id)}}" method="post" enctype="multipart/form-data">
        <input type="text" name="c_name" value="{{$category->c_name}}" placeholder="enter your category name:" class="form-control">
        @csrf
        <br>
        <input type="file" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])"  name="c_image" placeholder="enter your category image:" class="form-control"><br>
        <img src="{{ asset('category/' . $category->c_image) }}" id="image" height="100px" width="100px" alt="">
        <br><br>
        <input type="submit" value="Update Category" class="btn btn-dark">
    </form>

@endsection
