@extends('admin.master')
@section('content')

@if(session('error'))
<script>
    alert('Error: {{ session('
        error ') }}');
</script>
@endif

@if(session('success'))
<script>
    alert('Success: {{ session('
        success ') }}');
</script>
@endif

<div class="container">
    <h1>Add category details here...</h1><br>
    <a href="{{ url('admin/show_cat') }}" class="btn btn-secondary float-end mb-2">Show Category</a>
    <form id="productForm" action="{{ url('admin/store_cat') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="c_name" placeholder="Enter your category name:" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="form-control">
        <br>
        <input type="file" name="c_image" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" id="c_image" placeholder="Enter your category image:" class="form-control"><br>
        <img id="image" src="" alt=""
            width="100px" />
            <br>
        <input type="submit" value="Add Category" class="btn btn-light text-dark">
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('productForm').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('c_image');
            const filePath = fileInput.value;

            // Allowed extensions
            const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp|\.avif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file format. Please upload an image file (jpg, jpeg, png, webp).');
                fileInput.value = '';
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

@endsection