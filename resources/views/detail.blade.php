@extends('master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .cartdiv {
        margin-top: 50px !important;
    }

    .reviewcontainer {
        margin-top: 50px !important;
    }

    .review {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .rating .fa-star {
        color: #FFD700;
    }

    .checked {
        color: #FFD700;
    }

    .review-body {
        margin-top: 10px;
        font-style: italic;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .average-rating {
        margin-top: 50px;
        font-size: 20px;
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .average-rating .fa-star {
        font-size: 24px;
        color: #FFD700;
    }

    textarea.form-control {
        resize: none;
    }

    .submit-review {
        margin-top: 20px;
    }

    .delete-btn {
        background: none;
        border: none;
        color: #ff5c5c;
        font-size: 16px;
        cursor: pointer;
        margin-left: 10px;
        transition: color 0.3s ease;
    }

    .delete-btn:hover {
        color: #ff1a1a;
    }

    .delete-review-form {
        display: inline;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .rating {
        display: flex;
        align-items: center;
    }

    .rating .fa-star {
        color: #FFD700;
        /* Gold color for stars */
        margin-right: 2px;
        /* Space between stars */
    }

    .delete-btn {
        background: none;
        border: none;
        color: #ff5c5c;
        font-size: 16px;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .delete-btn:hover {
        color: #ff1a1a;
    }
</style>
<section id="center" class="centre_o  pt-5 pb-5">
    <div class="container-xl">
        <div class="row centre_o1">
            <h1 class="mb-0 text-white"> Products Detail
                <span class="pull-right fs-6 fw-normal d-inline-block mt-3 col_light"><a class="text-white"
                        href="#">HOME</a> <span class="mx-1 text-white-50">/</span> PRODUCTS DETAIL</span>
            </h1>
        </div>
    </div>
</section>
</div>
</div>
@if (session('success'))
<script>
    alert('Success: {{ session('success') }}');
</script>
@endif
@if (session('error'))
<script>
    alert('error: {{ session('error') }}');
</script>
@endif
@if (session('review'))
<script>
    alert('Success: {{ session('review') }}');
</script>
@endif

<section id="shop_dt" class="p_3">
    <div class="container-xl">
        <div class="shop_dt1 row">
            <div class="col-md-6">
                <div class="shop_dt1l">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('product/' . $product['p_image']) }}" class="d-block w-100"
                                    alt="abc">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shop_dt1r">
                    @if ($products->quantity > 0)
                    <label class="flaot-left badge bg-success text-white" style="height: 20px;width:12%;">In stock
                    </label>
                    <label class="float-right p-2"><span>Average Rating: </span>
                        @php
                        $avgRating = $reviews->avg('rating');
                        $fullStars = floor($avgRating); // Count of full stars
                        $halfStars = $avgRating - $fullStars >= 0.5 ? 1 : 0; // Determine if there's a half star
                        $emptyStars = 5 - ($fullStars + $halfStars); // Count of empty stars
                        @endphp

                        @for ($i = 1; $i <= $fullStars; $i++)
                            <span class="fa fa-star checked"></span>
                            @endfor

                            @for ($i = 1; $i <= $halfStars; $i++)
                                <span class="fa fa-star-half-alt checked"></span>
                                <!-- Use fa-star-half-alt for half star -->
                                @endfor

                                @for ($i = 1; $i <= $emptyStars; $i++)
                                    <span class="fa fa-star"></span>
                                    @endfor

                                    <span> ({{ round($avgRating, 1) }} )
                                        @endif
                                        <h5 class="mt-4 text-muted">Categories: <a href="#">{{ $products->category->c_name }}</a>
                                        </h5>
                                        <h1>{{ $products->p_name }}</h1>
                                        <div class="m-1" title="Product Views">
                                            <i class="fa-solid fa-eye"></i>
                                            <span style="font-size: 25px;">{{ $products->views }}</span>
                                        </div>
                                        <div title="Total Sales Of This Product">
                                            <b><small>Total Sales</small> <span style="font-size: 25px; margin-left: 5px;">{{ $pTotalpurchase }}</span></b>
                                        </div>

                                        <hr>
                                        <h4 class="col_brow">Price {{ $products->p_price }} </h4>
                                        <h4 class="col_brow">Stock {{ $products->quantity }}</h4>
                                        
                                        <p class="mt-3">High-Quality Materials: Made from premium stainless steel, these knives offer
                                            exceptional durability and sharpness, ensuring they stay sharper for longer and resist rust and
                                            corrosion.

                                            Ergonomic Design: The comfortable, non-slip handles provide a secure grip, reducing hand fatigue
                                            and allowing for extended use during meal prep.</p>
                                        <hr>


                                        <ul class="mt-3">
                                            <li class="bg-dark d-inline-block rounded-circle"></li>
                                            <li class="bg_brow d-inline-block rounded-circle mx-1"></li>
                                            <li class="bg-light d-inline-block rounded-circle"></li>
                                        </ul>



                                        @if ($products->quantity > 0)
                                        <h6 class="mb-0 mt-3"><a class="button_1" href="{{ route('cart.store', $products->id) }}">ADD TO
                                                CART </a></h6>
                                        @else
                                        <h6 class="mb-0 mt-3"><button disabled style="cursor: no-drop" class="button_1"
                                                href="">out of stock </button></h6>
                                        @endif
                                        <h6 class="mt-4">
                                            <form action="{{ route('wishlist.store', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    style="background: none; border: none; color: inherit; cursor: pointer;">
                                                    <i class="fa fa-heart-o me-1"></i> Add To Wishlist
                                                </button>
                                            </form>
                                        </h6>
                </div>
            </div>
        </div>


        <div class="container-fluid reviewcontainer">
            <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <h4 class="text-center">Customer Reviews</h4>
                    <hr>
                    <div class="reviews">
                        @if ($reviews->count() > 0)
                        @foreach ($reviews as $review)
                        <div class="review">
                            <div class="review-header">
                                <strong>{{ $review->user->name }}</strong>
                                <div class="rating-starss">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                        class="fa fa-star {{ $i <= $review->rating ? 'checked' : '' }}"></span>
                                        @endfor
                                        @if ($review->user_id == Auth::id() && $deleteReview > 0)
                                        <button class="delete-btn" title="Update Review" type="button"
                                            data-bs-toggle="modal" data-bs-target="#updateStatusModal">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateStatusModal" tabindex="-1"
                                            aria-labelledby="updateStatusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-dark text-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateStatusModalLabel">
                                                            Update
                                                            Comment</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('updateReview', $updateReview->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <!-- Star Rating -->
                                                            <input type="hidden" name="rating"
                                                                id="rating" value="">

                                                            <!-- Feedback -->
                                                            <label for="feedback" class="form-label mt-3">Your
                                                                Comment:</label>
                                                            <textarea name="comment" id="feedback" class="form-control bg-dark text-light" rows="4"
                                                                placeholder="Enter your feedback here..." required>{{ $updateReview->comment }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="btn btn-success">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form
                                            action="{{ route('review.destroy', [$review->id, $review->product_id]) }}"
                                            method="POST" class="delete-review-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete Review?')"
                                                class="delete-btn" title="Delete Review">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        @endif
                                </div>
                            </div>
                            <div class="review-body">
                                <p>{{ $review->comment }}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        @auth
                        <p class="text-center">No reviews yet. Be the first to review!</p>
                        @else
                        <p class="text-center">No reviews yet</p>
                        @endauth
                        @endif
                    </div>
                    <hr>

                    @if ($hasCompletedOrder && !$hasSubmittedReview)
                    <h5>Submit Your Review</h5>
                    <form action="{{ route('review.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="rating-stars" style="cursor: pointer; color: gray;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star" data-value="{{ $i }}"></span>
                                    @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Your Review:</label>
                            <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning submit-review">Submit Review</button>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const stars = document.querySelectorAll('.rating-stars .fa-star');
                            const ratingInput = document.getElementById('rating');

                            stars.forEach(star => {
                                star.addEventListener('click', function() {
                                    const rating = this.getAttribute('data-value');
                                    ratingInput.value = rating; // Set the rating in the hidden input

                                    // Remove 'checked' class from all stars and set the checked class for selected stars
                                    stars.forEach(s => s.classList.remove('checked'));
                                    for (let i = 0; i < rating; i++) {
                                        stars[i].classList.add('checked');
                                    }
                                });
                            });
                        });

                        // Add CSS for the 'checked' class
                        const style = document.createElement('style');
                        style.innerHTML = `
                                    .rating-stars .fa-star.checked {
                                        color: #FFD700; /* Gold color for stars */
                                    }
                                `;
                        document.head.appendChild(style);
                    </script>
                    @elseif ($hasSubmittedReview)
                    <p class="text-center">You have already submitted the review!</p>
                    @elseif ($hasPendingOrder)
                    <p class="text-center">Your Order is Pending!</p>
                    @else
                    @auth
                    <p class="text-center">You have to purchase to leave the comment!</p>
                    @else
                    <p class="text-center">You need to login to leave a comment <a
                            href="{{ route('login') }}"><b>Click Here to Login</b></a></p>
                    @endauth
                    @endif
                </div>

            </div>
        </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating-stars .fa-star');
        const ratingInput = document.getElementById('rating');

        // Function to set stars based on the rating value
        function setStars(rating) {
            stars.forEach((star, index) => {
                star.classList.toggle('checked', index < rating);
            });
        }

        // Click event for rating stars
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating; // Set the rating in the hidden input
                setStars(rating); // Update star display
            });
        });

        // Check if there is an existing rating and set the stars accordingly
        const existingRating = ratingInput.value; // This should contain the existing rating if any
        if (existingRating) {
            setStars(existingRating);
        }

        // Read more functionality
        const readMoreLink = document.querySelector('.read-more');
        const shortDescription = document.querySelector('.short-description');
        const fullDescription = document.querySelector('.full-description');

        readMoreLink.addEventListener('click', function() {
            const isExpanded = fullDescription.style.display === 'inline';
            fullDescription.style.display = isExpanded ? 'none' : 'inline';
            shortDescription.style.display = isExpanded ? 'inline' : 'none';
            this.textContent = isExpanded ? 'Read more' : 'Show less';
        });
    });
</script>
@endsection