@extends('designer.master')
@section('content')
@if (session('success'))
        <script>
            alert('Success: {{ session('success') }}');
        </script>
    @endif
@if ($designer)
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Designer Details
                    </div>
                    <div class="card-body">
                        <div>
                            <strong>Image:</strong><br>
                            <img src="{{ asset('upload/' . $designer->image) }}" alt="Image" height="250px" width="100%">
                        </div>
                        <h5 class="card-title p-2 text-light">{{ $designer->fname }} {{ $designer->lname }}</h5>
                        <p class="card-text"><strong>Phone:</strong> {{ $designer->phone }}</p>
                        <p class="card-text"><strong>Experience:</strong> {{ $designer->exp }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $designer->descript }}</p>
                    </div>
                    <div class="card-footer" style="display: flex;">
                        <a href="{{ route('edit.designer', $designer->id) }}" class="btn btn-warning m-1">Edit</a>
                        <form action="{{ route('delete.designer',$designer->id) }}" class="m-1" method="POST">
                            @csrf
                            @method("PUT")
                            @if($designer->available == 0)
                            <button type="submit" onclick="return confirm('Are You Sure To Enable Your Account?')" class="btn btn-danger">Enable Account</button>
                            @else
                            <button type="submit" onclick="return confirm('Are You Sure To Disable Your Account?')" class="btn btn-danger">Disable Account</button>
                            @endif
                        </form>
                        <!-- <a href="{{ route('delete.designer', $designer->id) }}" onclick="return confirm('Are You Sure To Disable Your Account?')" class="btn btn-danger">Disable</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <strong>Portfolio:</strong><br>
                    <img src="{{ asset('portfolio/' . $designer->portfolio) }}" alt="Portfolio" height="900px" width="100%">
                </div>
            </div>
        </div>
    </div>
@else
    <p>No designer data available.</p>
@endif
<style>
    *{
        color: white;
    }
</style>

@endsection
