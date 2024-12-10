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
    <h1>Show Users Reviews Here..</h1>
    <a href="{{ route('reviewpdf') }}" class="btn btn-warning m-2 mb-2 mt-2">Download PDF</a>
    <table class="table">
        <thead class="text-light">
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Rating</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody class="text-light" id="reviews_table">
            @foreach ($review as $rev)
            <tr>
                <td>{{$rev->id}}</td>
                <td>{{$rev->user->name}}</td>
                <td>{{$rev->product->p_name}}</td>
                <td>{{$rev->rating}}</td>
                <td>{{$rev->comment}}</td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
