@extends('admin.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <h1>Designer Reviews...</h1>
        <a href="{{ route('designerreviewpdf') }}" class="btn btn-warning m-2 mb-2 mt-2">Download PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Designer Name</th>
                    <th>Designer Email</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Date</th>

                </tr>
            </thead>
            <tbody id="designer_reviews_table">
                @if ($designerReview->count() > 0)
                    @foreach ($designerReview as $designerReviews)
                        <tr>
                            <td>{{ $designerReviews->id }}</td>
                            <td>{{ $designerReviews->user->name }}</td>
                            <td>{{ $designerReviews->user->email }}</td>
                            <td>{{ $designerReviews->designer->user->name }}</td>
                            <td>{{ $designerReviews->designer->user->email }}</td>
                            <td>{{ $designerReviews->rating }} stars</td>
                            <td>{{ $designerReviews->comment }}</td>
                            <td>{{ $designerReviews->created_at }}</td>
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

@endsection
