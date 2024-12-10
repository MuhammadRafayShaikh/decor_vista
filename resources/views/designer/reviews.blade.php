@extends('designer.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <h1>Users Reviews...</h1>
        <a href="{{ route('designerReviewpdf2') }}" class="btn btn-warning mt-3 mb-3">Download PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Date</th>

                </tr>
            </thead>
            <tbody>
                @if ($reviews->count() > 0)
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->user->email }}</td>
                            <td>{{ $review->rating }} stars</td>
                            <td>{{ $review->comment }}</td>
                            <td>{{ $review->created_at }}</td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" class="text-center mt-4 mb-4">No Reviews</td>
                    </tr>
                @endif

            </tbody>

        </table>
    </div>

    <style>
        * {
            color: white;
        }
    </style>
@endsection
