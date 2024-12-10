@extends('designer.master')
@section('content')
    <div class="container">
        <br>
        <h1>Edit your Portfolio</h1>
        <form action="{{ route('update.designer', $designer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Enter Your First Name" name="fname"  value="{{ $designer->fname }}" class="form-control text-light bg-transparent mb-2">
            <input type="text" placeholder="Enter Your Last Name" name="lname" value="{{ $designer->lname }}" class="form-control text-light bg-transparent mb-2">
            <input type="text" placeholder="Enter Your Description" name="descript" value="{{ $designer->descript }}" class="form-control text-light bg-transparent mb-2">
            <input type="number" placeholder="Enter Your Contact Number" name="phone" value="{{ $designer->phone }}" class="form-control text-light bg-transparent mb-2">
            <input type="text" placeholder="Enter Your Year of Experience" name="exp" value="{{ $designer->exp }}" class="form-control text-light bg-transparent mb-4">
            <select class="form-select" aria-label="Default select example" name="category_id" required>
                <option value="" selected disabled>Select Category</option>
                @foreach ($category as $cat)
                    <option @if($designer->category_id == $cat->id)
                        {{ "selected" }}
                        @else
                        {{ "" }}
                        @endif value="{{ $cat->id }}">{{ $cat->c_name }}</option>
                @endforeach
            </select><br>
           <label class="mb-2">Select Portfolio</label> <br>
            <input type="file" onchange="document.querySelector('#image').src=window.URL.createObjectURL(this.files[0])" placeholder="Enter Your Portfolio" name="portfolio" class="form-control text-dark bg-transparent mb-2">
            <img src="{{ asset('portfolio/' . $designer->portfolio) }}" id="image" height="100px" width="100px" alt=""><br>
           <label class="mb-2">Select Designer Image</label><br>
            <input type="file" onchange="document.querySelector('#image2').src=window.URL.createObjectURL(this.files[0])" placeholder="Enter Your Image" name="image" class="form-control text-dark bg-transparent mb-2">
            <img src="{{ asset('upload/' . $designer->image) }}" id="image2" height="100px" width="100px" >
            <br><br>
            <input type="submit" value="Update Portfolio" class="btn btn-light text-dark">
        </form>
    </div>
@endsection

