<?php

namespace App\Http\Controllers;

use App\Models\Confirmbooking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function store(Request $request, string $id)
    {
        // Validate incoming request
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|max:100'
        ]);

        // Check if the user has already reviewed this product
        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($existingReview) {
            return redirect()->route('singleProduct', $id)
                ->with('error', 'You have already reviewed this product.');
        }

        // Create a new review
        $review = Review::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('singleProduct', $id)->with('review', 'Review Added Successfully');
    }

    public function updateReview(Request $request, string $id)
    {
        $review = Review::findOrFail($id);

        $review->update([
            'comment' => $request->comment
        ]);

        if ($review) {
            return back()->with('review', 'Review Updated Successfully');
        }
    }

    public function destroy(string $id, string $pid)
    {
        $review = Review::find($id);
        // return $review;
        // return $review->product_id;

        $review->delete();

        return redirect()->route('singleProduct', $pid)->with('review', 'Review Deleted Successfully');
    }
}
