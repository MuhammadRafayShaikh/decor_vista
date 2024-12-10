@extends('designer.master')
@section('content')

<div class="container">
    <br>
    <h1>Create your Portfolio</h1>

    @if($portfolio)
    <div class="alert alert-warning">
        You have already created your portfolio. If you need to make changes, please contact support.
    </div>
    @else
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <input type="text" readonly placeholder="Enter Your First Name" value="{{Auth::user()->name}}" name="fname" class="form-control  text-light bg-dark">
        </div>
        <div class="form-group mb-3">
            <input type="text" placeholder="Enter Your Last Name" name="lname" class="form-control bg-dark text-light">
        </div>
        <div class="form-group mb-3">
            <input type="text" placeholder="Enter Your Description" name="descript" class="form-control text-light bg-dark">
        </div>
        <div class="form-group mb-3">
            <input type="number" placeholder="Enter Your Contact Number" name="phone" class="form-control text-light bg-dark">
        </div>
        <div class="form-group mb-3">
            <input type="number" placeholder="Enter Your Years of Experience" name="exp" class="form-control text-light bg-dark">
        </div>
        <select class="form-select" aria-label="Default select example" class="form-select" name="category_id" required>
            <option selected disabled>Select Category</option>
            @foreach ($category as $cat)
            <option value="{{$cat->id}}">{{$cat->c_name}}</option>
            @endforeach
        </select><br>
        <label class="mb-2">Select Image</label> <br>
        <div class="form-group mb-3">
            <input type="file" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" name="image" class="form-control bg-dark">
            <img id="image" src="" alt=""
                width="100px" />
        </div>
        <label class="mb-2">Select Portfolio</label> <br>
        <div class="form-group mb-3">
            <input type="file" onchange="document.querySelector('#image2').src=window.URL.createObjectURL(this.files[0])" name="portfolio" class="form-control bg-dark">
            <img id="image2" src="" alt=""
                width="100px" />
        </div>

        <div class="form-group">
            <input type="submit" value="Create Profile" class="btn btn-light text-dark">
        </div>
    </form>
    @endif
</div>
@endsection