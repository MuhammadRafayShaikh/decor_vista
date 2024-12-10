<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Designer;
use Illuminate\Http\Request;
use App\Models\Cancelbooking;
use App\Models\Designerreview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\userremovebooking;

class BookingController extends Controller
{
    public function booking($id)
    {
        $designer = Designer::join('categories', 'designers.category_id', '=', 'categories.id')
            ->where('designers.id', $id)
            ->select('designers.*', 'categories.c_name as category_name') // Select desired fields
            ->first();

        $time = Time::where(['designer_id' => $id, 'is_booked' => 0])->get();

        return view('bookingform', compact('designer', 'time'));
    }
    public function fetch_time(Request $request)
    {
        $time = Time::where(['designer_id' => $request->designer_id, 'date' => $request->date])->get();
        // return $time;

        return response()->json($time);
    }
    // public function getTimes(Request $request)
    // {
    //     $dateId = $request->input('date_id');
    //     // Fetch time slots based on dateId
    //     $times = Time::where('date', $dateId)->get();

    //     return response()->json($times);
    // }


    // New method to fetch categories based on designer ID
    public function getCategoriesByDesigner($designerId)
    {
        $categories = Designer::find($designerId)->categories; // Get categories for the selected designer
        return response()->json($categories);
    }

    public function book(Request $request)
    {
        // return $request;
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:11',
            'designer_id' => 'required|exists:designers,id',
            'category_id' => 'required|exists:categories,id',
            'b_date' => 'required|date',
            'time_id' => 'required|exists:times,id',
            'special_requests' => 'nullable|string|max:255',
        ]);

        // \Log::info('Booking data:', $request->all());

        $user = Auth::user();
        $designer = Designer::findOrFail($request->designer_id);

        $category = Category::findOrFail($request->category_id);

        $time = Time::findOrFail($request->time_id);

        $bookingDate = $request->b_date;

        $timeZone = 'America/New_York';
        $currentDateTime = new \DateTime('now', new \DateTimeZone($timeZone));

        $bookingDateTime = new \DateTime($bookingDate . ' ' . $time->time_in, new \DateTimeZone($timeZone));


        if ($bookingDateTime < $currentDateTime) {
            return redirect()->route('team')->with('error', 'You cannot book a time in the past.');
        }


        $booking = Booking::create([
            'user_id' => Auth::id(),
            'designer_id' => $request->designer_id,
            'category_id' => $request->category_id,
            'time_id' => $request->time_id,
            'address' => $request->address,
            'special_requests' => $request->special_requests,
        ]);

        $time = Time::where(['designer_id' => $request->designer_id, 'date' => $request->b_date])->update([
            'is_booked' => 1
        ]);

        if ($time && $booking) {
            return redirect('my_bookings')->with('success', 'Booking placed successfully!');
        }
    }
    public function showbooking()
    {
        $bookings = Booking::all();
        return view('designer.showbooking', compact('bookings'));
    }
    public function destroy(Request $request, string $id)
    {
        // return $request;
        $booking = Booking::with('user', 'designer')->find($id);
        // return $booking->designer->user->email;
        Mail::to($booking->designer->user->email)->send(new userremovebooking($booking->designer->name, $request->cancel_reason));

        if ($booking) {

            $cancelbooking = Cancelbooking::create([
                'user_id' => $booking->user_id,
                'designer_id' => $booking->designer_id,
                'category_id' => $booking->category_id,
                'time_id' => $booking->time_id,
                'address' => $booking->address,
                'special_requests' => $booking->special_requests,
                'dc' => 0,
                'uc' => 1,
                'cancel_reason' => $request->cancel_reason
            ]);

            if ($cancelbooking) {
                $time = Time::findOrFail($booking->time_id)->update([
                    'is_booked' => 0
                ]);
                $booking->delete();
            }
        }
        return redirect('my_bookings')->with('success', 'Booking Delete successfully! & Mail Sent To The Designer');
    }


    public function designerReviews(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $review = Designerreview::create([
            'user_id' => Auth::id(),
            'designer_id' => $request->designer_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        if ($review) {
            return back()->with('designerreview', 'Review Added Successfully');
        }
    }

    public function updateDesignerReview(Request $request, string $id)
    {

        $review = Designerreview::findOrFail($id);

        $review->update([
            'comment' => $request->comment
        ]);

        if ($review) {
            return back()->with('designerreview', 'Review Updated Successfully');
        }
    }

    public function deleteDesignerReview(string $id)
    {
        $review = Designerreview::findOrFail($id);

        $review->delete();

        return back()->with('designerreview', 'Review Deleted Successfully');
    }
}
