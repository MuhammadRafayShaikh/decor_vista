@extends('admin.master')
@section('content')
<div class="container-fluid pt-4 px-4">
<form action="{{url('admin/store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Product Price</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="pprice">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Product Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="pimage">
  </div>
  <button type="submit" class="btn btn-primary">Add Product</button>

</form>
</div>
@endsection