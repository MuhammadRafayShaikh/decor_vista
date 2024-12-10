<?php

namespace App\Http\Controllers;

use Auth;
use File;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Designer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Mail\OrderPlacedMail;
use App\Models\Designerreview;
use App\Models\Gallery;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $contact = Contact::with('user')->orderBy('id', 'DESC')->get();
        $user = User::where('role', "user")->count();
        $designer = User::where('role', "designer")->count();
        $product = Product::count();

        $order = Order::whereDate('created_at', now()->toDateString())->count();

        $users = User::where('role', "user")->get();

        return view('admin.index', compact('users', 'user', 'designer', 'product', 'contact', 'order'));
    }

    public function showreview()
    {

        $review = Review::orderBy('id', 'DESC')->get();
        return view('admin.show_review', compact('review'));
    }

    public function designerReview()
    {
        $designerReview = Designerreview::with('user', 'designer.user')->orderBy('id', 'DESC')->get();
        // return $designerReview;

        return view('admin.designerreview', compact('designerReview'));
    }
    public function user()
    {
        $contact = Contact::with('user')->get();
        $user = User::where('role', "user")->count();
        $designer = User::where('role', "designer")->count();
        $product = User::count();
        $users = User::where('role', "user")->orderBy('id', 'DESC')->get();
        return view('admin.user', compact('users', 'user', 'designer', 'product', 'contact'));
    }
    public function designer()
    {
        $contact = Contact::with('user')->get();
        $user = User::where('role', "user")->count();
        $designer = User::where('role', "designer")->count();
        $product = User::count();
        $users = User::where('role', "user")->get();
        $designers = User::where('role', "designer")->orderBy('id', 'DESC')->get();
        return view('admin.designer', compact('users', 'user', 'designer', 'product', 'designers', 'contact'));
    }
    public function orders()
    {
        $order = Order::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.orders', compact('order'));
    }
    public function view_orders($id)
    {
        $orders =  Order::findOrFail($id);
        // return $orders;
        return view('admin.view_order', compact('orders'));
    }
    public function update_orders(Request $request, $id)
    {
        if ($request->order_status == 1) {

            $order = Order::findOrFail($id);
            if ($order->status != 1) {
                Mail::to($order->user->email)->send(new OrderPlacedMail($order));
            }
            $order->status = $request->order_status;
            $order->delivery = $request->delivery_status;
            $order->save();

            // Send Email to the User


            return back()->with('success', 'Order status updated and email sent to the user.');
        } else {
            $order = Order::findOrFail($id);
            $order->status = $request->order_status;
            $order->delivery = $request->delivery_status;
            $order->save();

            return back()->with('success', 'Order status still pending');
        }
    }
    public function history_orders()
    {
        $order =  Order::where('status', '1')->orderBy('id', 'DESC')->get();
        return view('admin.order_history', compact('order'));
    }
    public function showbooking()
    {
        // $booking = Booking::join('designers', 'designers.id', '=', 'bookings.designer_id')->get();

        $booking = Booking::with('user', 'designer', 'time', 'category')->get();

        // return $booking;



        return view('admin.showbooking', compact('booking'));
    }

    public function categorypdf()
    {
        $categories = Category::orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.categorypdf', compact('categories'));

        return $pdf->download('All_Category.pdf');
    }

    public function productpdf()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.productpdf', compact('products'));

        return $pdf->download('All_Products.pdf');
    }

    public function userpdf()
    {
        $users = User::where('role', 'user')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.userpdf', compact('users'));

        return $pdf->download('All_Users.pdf');
    }

    public function designerpdf()
    {
        $designers = Designer::with('user', 'category')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.designerpdf', compact('designers'));

        return $pdf->download('All_Designers.pdf');
    }

    public function incomOrderpdf()
    {
        $orders = Order::with('user')->where('status', '0')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.incomOrderpdf', compact('orders'));

        return $pdf->download('Incomplete_Orders.pdf');
    }

    public function completeOrderpdf()
    {
        $orders = Order::with('user', 'orderitem')->where('status', '1')->orderBy('id', 'DESC')->get();


        $pdf = Pdf::loadView('pdf.comOrderpdf', compact('orders'));

        return $pdf->download('Complete_Orders.pdf');
    }

    public function reviewpdf()
    {
        $review = Review::with('user', 'product')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.reviewpdf', compact('review'));

        return $pdf->download('Products_Reviews.pdf');
    }

    public function designerreviewpdf()
    {
        $review = Designerreview::with('user', 'designer.user')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.designerreviewpdf', compact('review'));

        return $pdf->download('Designer_Reviews.pdf');
    }

    public function bookingpdf()
    {
        $bookings = Booking::with('user', 'designer.user', 'time', 'category')->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.bookingpdf', compact('bookings'));

        return $pdf->download('Designer_Bookings.pdf');
    }


    public function search(Request $request)
    {
        $search = $request->search;
        if ($request->url == "/admin/show_prod") {
            $products = Product::with('category')->where(function ($query) use ($search) {
                $query->where('p_name', 'like', '%' . $search . '%');
            })->orWhereHas('category', function ($sql) use ($search) {
                $sql->where('c_name', 'like', '%' . $search . '%');
            })->orderBy('id', 'DESC')
                ->get();
            return response()->json($products);
        } else if ($request->url == "/admin/show_cat") {
            $categories = Category::where('c_name', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->get();
            return response()->json($categories);
        } else if ($request->url == "/admin/user") {
            $users = User::where('role', 'user')->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->get();
            return response()->json($users);
        } else if ($request->url == "/admin/designer") {
            $designers = User::where('role', 'designer')->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->get();
            return response()->json($designers);
        } else if ($request->url == "/admin/orders") {
            $orders = Order::with('user')->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('user_id', 'like', '%' . $search . '%');
            })->orWhereHas('user', function ($sql) use ($search) {
                $sql->where('name', 'like', '%' . $search . '%');
            })->where('status', 0)->orderBy('id', 'DESC')
                ->get();
            return response()->json($orders);
        } else if ($request->url == "/admin/order_history") {
            $completeorders = Order::with('user')->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('user_id', 'like', '%' . $search . '%');
            })->orWhereHas('user', function ($sql) use ($search) {
                $sql->where('name', 'like', '%' . $search . '%');
            })->where('status', 1)->orderBy('id', 'DESC')
                ->get();
            return response()->json($completeorders);
        } else if ($request->url == "/admin/showbooking") {
            $bookings = Booking::with(['designer.user', 'time', 'category', 'user'])
                ->where(function ($query) use ($search) {
                    $query->whereHas('user', function ($sql) use ($search) {
                        $sql->where('name', 'like', '%' . $search . '%');
                    })->orWhereHas('designer.user', function ($sql) use ($search) {
                        $sql->where('name', 'like', '%' . $search . '%');
                    });
                })->orderBy('id', 'DESC')->get();
            return response()->json($bookings);
        } else if ($request->url == "/admin/show_img") {
            $gallery = Gallery::with('category')->withWhereHas('category', function ($sql) use ($search) {
                $sql->where('c_name', 'like', '%' . $search . '%');
            })->orderBy('id', 'DESC')->get();
            return response()->json($gallery);
        } else if ($request->url == "/admin/review") {
            $reviews = Review::with(['user', 'product'])
                ->where(function ($query) use ($search) {
                    $query->whereHas('user', function ($sql) use ($search) {
                        $sql->where('name', 'like', '%' . $search . '%');
                    })->orWhereHas('product', function ($sql) use ($search) {
                        $sql->where('p_name', 'like', '%' . $search . '%');
                    });
                })->orderBy('id', 'DESC')
                ->get();
            return response()->json($reviews);
        } else if ($request->url == "/admin/designerReview") {
            $designerreviews = Designerreview::with(['user', 'designer.user'])
                ->where(function ($query) use ($search) {
                    $query->whereHas('user', function ($sql) use ($search) {
                        $sql->where('name', 'like', '%' . $search . '%');
                    })->orWhereHas('designer.user', function ($sql) use ($search) {
                        $sql->where('name', 'like', '%' . $search . '%');
                    });
                })->orderBy('id', 'DESC')
                ->get();
            return response()->json($designerreviews);
        }
    }
}
