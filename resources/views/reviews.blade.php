

<h2>Reviews</h2>
@foreach ($products->reviews as $review) <!-- Added $ before product -->

    <div>
        <strong>{{ $review->user->name }}</strong> (Rating: {{ $review->rating }})
        <p>{{ $review->comment }}</p>
    </div>
@endforeach

<h3>Submit a Review</h3>
<form action="{{ route('reviews.store', $products->id) }}" method="POST">
    @csrf
    <div>
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" min="1" max="5" required>
    </div>
    <div>
        <label for="comment">Comment:</label>
        <textarea name="comment" rows="4"></textarea>
    </div>
    <button type="submit">Submit Review</button>
</form>
