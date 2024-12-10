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

        .rating-stars .fa-star.checked {
            color: #FFD700;
            /* Gold color */
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
    <section id="shop_dt" class="p_3">
        <div class="container mb-5 ">
            <div class="shop_dt1 row">
                <div class="col-md-8">
                    <div class="shop_dt1l">
                        <img src="{{ asset('portfolio/' . $designer->portfolio) }}" alt="" height="100%"
                            width="100%">
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="shop_dt1r">
                        <h1>{{ $designer->fname }}</h1>
                        <h6>


                            <hr>
                            <h4 class="col_brow">{{ $designer->category_name }} Specialist</h4>
                            <h4>Description </h4>
                            <p>{{ $designer->descript }}</p>
                            <p class="mt-3"></p>
                            <hr>
                            <a href="{{ url('/bookings/create', $designer->id) }}" class="btn button_2">Appoint Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Display average rating -->
    <div class="col-md-8 text-center">
        <div class="average-rating">
            <span>Average Rating: </span>
            @php
                $avgRating = $designerReview->avg('rating');
            @endphp
            @for ($i = 1; $i <= $avgRating; $i++)
                @if ($i <= $avgRating)
                    <span class="fa fa-star checked"></span>
                @else
                    <span class="fa fa-star"></span>
                @endif
            @endfor
            <span> ({{ round($avgRating, 1) }} / 5)</span>
        </div>
    </div>

    <div class="container reviewcontainer">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h4 class="text-center">Customer Reviews</h4>
                @if (session('designerreview'))
                    <h5 class="text-center text-success mt-3 mb-3">{{ session('designerreview') }}</h5>
                @endif
                <hr>
                <div class="reviews">

                    @if ($designerReview->count() > 0)
                        @foreach ($designerReview as $designerReviews)
                            <div class="review">
                                <div class="review-header">
                                    <strong>{{ $designerReviews->user->name }}</strong>
                                    <div class="rating-starss">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $designerReviews->rating)
                                                <span class="fa fa-star checked"></span>
                                            @else
                                                <span class="fa fa-star"></span>
                                            @endif
                                        @endfor
                                        @if ($designerReviews->user_id == Auth::id())
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
                                                            <h5 class="modal-title" id="updateStatusModalLabel">Update
                                                                Comment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('updateDesignerReview', $checkReview->first()->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <!-- Star Rating -->
                                                                <input type="hidden" name="rating" id="rating"
                                                                    value="{{ $designerReviews->rating }}">

                                                                <!-- Feedback -->
                                                                <label for="feedback" class="form-label mt-3">Your
                                                                    Comment:</label>
                                                                <textarea name="comment" id="feedback" class="form-control bg-dark text-light" rows="4"
                                                                    placeholder="Enter your feedback here..." required>{{ $checkReview->first()->comment }}</textarea>
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

                                            <form action="{{ route('deleteDesignerReview', $checkReview->first()->id) }}"
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
                                    <p>{{ $designerReviews->comment }}</p>
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

                @if ($review->count() > 0 && !$checkReview->count() > 0)
                    <h5>Submit Your Review</h5>
                    <form action="{{ route('designerReviews') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="rating-stars" style="cursor: pointer; color: gray;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star" data-value="{{ $i }}"></span>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating" required>
                            <input type="hidden" name="designer_id" id="designer_id" required
                                value="{{ $designer->id }}">
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
                @elseif ($checkReview->count() > 0)
                    <p class="text-center">You Have Already Submitted The Review</p>
                @else
                    @auth
                        @if (!$waitReview->count() > 0)
                            <p class="text-center">No Appointment Found For This Designer</p>
                        @else
                            @if ($waitReview->first()->status == 0)
                                <p class="text-center">Wait For Designer To Confirm The Appointment</p>
                            @else
                                <p class="text-center">When Desginer Complete The Appointment The Review Section Will Open!</p>
                            @endif
                        @endif
                    @else
                        <p class="text-center">You need to login to leave a comment <a href="{{ route('login') }}"><b>Click
                                    Here
                                    to Login</b></a></p>
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
