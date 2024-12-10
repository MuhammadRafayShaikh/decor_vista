<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Designer;
use Illuminate\Http\Request;
use App\Models\Cancelbooking;
use App\Models\Confirmbooking;
use App\Models\Designerreview;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\removebooking;
use App\Mail\donebooking;

class DesignerController extends Controller
{
    public function index()
    {
        // return session()->get('designer_id');
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();

        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();

        $checkDesigner = Designer::where('user_id', Auth::id())->count();

        // return $checkDesigner;
        // session()->put('designer_id', $checkDesigner->id);
        // return session()->get('designer_id');

        $times = Time::where('designer_id', session()->get('designer_id'))->count();
        $bookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        $completebookings = Confirmbooking::where('designer_id', session()->get('designer_id'))->count();
        $reviews = Designerreview::where('designer_id', session()->get('designer_id'))->count();

        return view('designer/index', compact('checkDesigner', 'time_check', 'times', 'bookings', 'completebookings', 'reviews', 'numberBookings'));
    }
    public function create()
    {
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();
        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        $checkDesigner = Designer::where('user_id', Auth::id())->count();
        // return $checkDesigner;
        $category = Category::all();
        $portfolio = Auth::user()->portfolio;
        // return $category;
        return view('designer.create', compact('portfolio', 'time_check', 'category', 'checkDesigner', 'numberBookings'));
    }
    public function store(Request $request)
    {
        $checkDesigner = Designer::where('user_id', Auth::id())->get();
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'required|string',
            'descript' => 'nullable|string',
            'exp' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'portfolio' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:2048',
        ]);

        if ($checkDesigner->count() > 0) {
            return redirect('designer/index');
        } else {

            $designer = new Designer();
            $designer->fname = $request->fname;
            $designer->lname = $request->lname;
            $designer->phone = $request->phone;
            $designer->descript = $request->descript;
            $designer->exp = $request->exp;
            $designer->category_id = $request->category_id;
            $designer->user_id = Auth::user()->id;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('upload', $filename);
                $designer->image = $filename; // Assign the filename to the image attribute
            }
            if ($request->hasFile('portfolio')) {
                $portfolio = $request->file('portfolio');
                $filename1 = time() . '.' . $portfolio->getClientOriginalExtension();
                $portfolio->move('portfolio', $filename1);
                $designer->portfolio = $filename1; // Assign the filename to the portfolio attribute
            }
            $designer->save();
            return redirect('designer/show');
        }
    }
    public function show(int $id)
    {
        $checkDesigner = Designer::where('user_id', Auth::id())->count();
        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        $designer = Designer::where('id', $id)->get();
        return view('designer.show', compact('designer', 'checkDesigner', 'numberBookings'));
    }
    public function dashboard()
    {
        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();
        $user = Auth::user();
        $checkDesigner = Designer::where('user_id', Auth::id())->count();

        $designer = Designer::where('user_id', $user->id)->first();


        if (!$designer) {

            return redirect()->route('designer.show')->with('error', 'Designer not found.'); // Redirect to a route of your
        }

        return view('designer.show', compact('designer', 'checkDesigner', 'time_check', 'numberBookings'));
    }

    public function destroy(Request $request, string $id)
    {
        // return $request;
        // Designer::destroy(array('id', $id));
        $designer = Designer::find($id);

        if ($designer->available == 1) {

            // dd($designer);
            // return $designer->available;
            // $designer->available = $request->available;

            $designer->update([
                'available' => 0
            ]);
            return back()->with('success', 'Successfully Disable Your Account');
        } else {
            $designer->update([
                'available' => 1

            ]);
            return back()->with('success', 'Successfully Enable Your Account');
        }


        return back()->with('success', 'Account Not Found');
    }
    public function edit($id)
    {
        $checkDesigner = Designer::where('user_id', Auth::id())->count();
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();
        $designer = Designer::find($id);
        $category = Category::all();
        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        return view('designer.edit', compact('designer', 'checkDesigner', 'time_check', 'category', 'numberBookings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'exp' => 'nullable|string',
            'descript' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        $designer = Designer::find($id);
        $designer->fname = $request->fname;
        $designer->lname = $request->lname;
        $designer->exp = $request->exp;
        $designer->descript = $request->descript;
        $designer->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $path = 'upload/' . $designer->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/', $filename);
            $designer->image = $filename;
        }
        if ($request->hasFile(key: 'portfolio')) {
            $path = 'portfolio/' . $designer->portfolio;
            if (File::exists($path)) {
                File::delete($path);
            }
            $portfolio = $request->portfolio;
            $filename1 = time() . '.' . $portfolio->getClientOriginalExtension();
            $portfolio->move('portfolio/', $filename1);
            $designer->portfolio = $filename1;
        }
        $designer->save();
        return redirect('designer/show');
    }
    public function showbooking()
    {
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();
        $checkDesigner = Designer::where('user_id', Auth::id())->count();
        $designers = Designer::where('user_id', Auth::user()->id)->first();
        // return $designers;
        // $bookings = Booking::where('designer_id', $designers->id)->get();

        $bookings = Booking::with('category', 'time', 'designer', 'user')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        $cancelbookings = Cancelbooking::with('category', 'time', 'designer', 'user')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        $confirmbookings = Confirmbooking::with('category', 'time', 'designer', 'user')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        // return $confirmbookings;
        // return session()->get('designer_id');
        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        // dd($confirmbookings);die();
        return view('designer.showbooking', compact('bookings', 'designers', 'checkDesigner', 'time_check', 'cancelbookings', 'confirmbookings', 'numberBookings'));
    }

    public function view_bookings($id)
    {
        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();
        // In your controller
        $checkDesigner = Designer::where('user_id', Auth::id())->count();

        $designers = Designer::where('user_id', Auth::user()->id)->first();
        $bookings = Booking::where('designer_id', $designers->id)->get();
        $bookings = Booking::find($id);
        // dd($bookings);

        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        return view('designer.view_bookings', compact('bookings', 'checkDesigner', 'time_check', 'numberBookings'));
    }


    public function update_bookings(Request $request, $id)
    {
        $booking = Booking::with('user', 'designer')->find($id);
        // $order->status = $request->input('order_status');
        // $order->update();
        Mail::to($booking->user->email)->send(new donebooking($booking->user->name, $booking->designer->name, $request->feedback));
        if ($booking) {

            $confirmbooking = Confirmbooking::create([
                'user_id' => $booking->user_id,
                'designer_id' => $booking->designer_id,
                'category_id' => $booking->category_id,
                'time_id' => $booking->time_id,
                'address' => $booking->address,
                'feedback' => $request->feedback,
            ]);

            if ($confirmbooking) {
                $booking->delete();
            }
        }

        return redirect('designer/showbooking')->with('status', 'Successfully Complete Appointment and Mail Sent To The Client');
    }

    public function delete(Request $request, string $id)
    {
        // return $request;
        $booking = Booking::with('user')->find($id);

        Mail::to($booking->user->email)->send(new removebooking($booking->user->name, $request->cancel_reason));
        // return $booking;
        // return Cancelbooking::all();
        $cancelbooking = Cancelbooking::create([
            'user_id' => $booking->user_id,
            'designer_id' => $booking->designer_id,
            'category_id' => $booking->category_id,
            'time_id' => $booking->time_id,
            'address' => $booking->address,
            'special_requests' => $booking->special_requests,
            'dc' => 1,
            'uc' => 0,
            'cancel_reason' => $request->cancel_reason
        ]);

        if ($cancelbooking) {
            $time = Time::findOrFail($booking->time_id)->update([
                'is_booked' => 0
            ]);
            $booking->delete();

            if ($booking && $cancelbooking && $time) {
                return redirect('designer/showbooking')->with('status', 'Booking Successfully Delete');
            }
        }
    }

    public function confirm_app(Request $request, string $id)
    {
        // return $request;
        $booking = Booking::findOrFail($id);
        // return $booking;

        $booking->update([
            'status' => 1
        ]);

        return response()->json('Successfully Confirm Appointment');
    }

    public function reviews()
    {
        $reviews = Designerreview::with('user')->where('designer_id', session()->get('designer_id'))->get();

        $time_check = Time::where('designer_id', '=', session()->get('designer_id'))->count();

        $checkDesigner = Designer::where('user_id', Auth::id())->count();

        $numberBookings = Booking::where('designer_id', session()->get('designer_id'))->count();
        return view('designer.reviews', compact('reviews', 'checkDesigner', 'time_check', 'numberBookings'));
    }


    public function timeslotpdf()
    {
        $times = Time::where('designer_id', session()->get('designer_id'))->get();

        $pdf = Pdf::loadView('pdf.timeslotpdf', compact('times'));

        return $pdf->download(Auth::user()->name . "'s_Available_Times.pdf");
    }

    public function desingerbookingpdf()
    {
        $bookings = Booking::with('user', 'designer', 'category', 'time')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.desingerbookingpdf', compact('bookings'));

        return $pdf->download(Auth::user()->name . "'s_Bookings.pdf");
    }

    public function cancelbookingpdf()
    {
        $cancelbookings = Cancelbooking::with('user', 'designer', 'category', 'time')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.cancelbookingpdf', compact('cancelbookings'));

        return $pdf->download(Auth::user()->name . "'s_Cancel_Bookings.pdf");
    }

    public function completebookingpdf()
    {
        $completebookings = Confirmbooking::with('user', 'designer', 'category', 'time')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.completebookingpdf', compact('completebookings'));

        return $pdf->download(Auth::user()->name . "'s_Complete_Bookings.pdf");
    }

    public function designerReviewpdf2()
    {
        $review = Designerreview::with('user', 'designer')->where('designer_id', session()->get('designer_id'))->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.designerReviewpdf2', compact('review'));

        return $pdf->download(Auth::user()->name . "'s_Reviews.pdf");
    }
}
