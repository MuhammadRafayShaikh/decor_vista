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
    <h1>Add Gallery details here...</h1><br>
    <a href="{{url('admin/show_img')}}" class="btn btn-secondary float-end mb-2">Show Gallery</a>
    <form action="{{url('admin/store_img')}}" method="post" enctype="multipart/form-data">

        @csrf
        <br>
        <select class="form-select" aria-label="Default select example" class="form-select" name="category_id">
        <option selected>Select Category</option>
            @foreach ($category as $cat)
            <option value="{{$cat->id}}">{{$cat->c_name}}</option>
            @endforeach
        </select><br>
        <input onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" type="file" name="g_image" placeholder="enter your gallery image:" class="form-control"><br>
        <img id="image" src="" alt=""
                        width="100px" /><br>
        <input type="submit" value="Add Gallery" class="btn btn-dark">
    </form>
</div>

@endsection
