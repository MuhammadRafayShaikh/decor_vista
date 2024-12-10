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
    <h1>Edit Gallery details here...</h1><br>
    <form action="{{url('admin/update_img',$gallery->id)}}" method="post" enctype="multipart/form-data">

        @csrf
        <br>
        <select class="form-select" aria-label="Default select example" class="form-select" name="category_id" required>
        <option selected>Select Category</option>
            @foreach ($category as $cat)
            <option @if($cat->id == $gallery->category_id) {{ "selected" }} @else {{ "" }} @endif value="{{$cat->id}}">{{$cat->c_name}}</option>
            @endforeach
        </select><br>
        <input type="file" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" name="g_image" placeholder="enter your gallery image:" class="form-control" required><br>
        <img src="{{ asset('gallery/' . $gallery->g_image) }}" id="image" alt="" height="100px" width="100px">
        <br><br>
        <input type="submit" value="Update Gallery" class="btn btn-dark">
    </form>

@endsection
