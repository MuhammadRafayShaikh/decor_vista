<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Designer;
use App\Models\View;
use App\Mail\welcomemail;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Cancelbooking;
use App\Models\Confirmbooking;
use App\Models\Designerreview;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Svg\Tag\Rect;

class HomeController extends Controller
{
    public function index()
    {

        $product = Product::orderBy('id', 'DESC')->paginate(8);
        $category = Category::all();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return view('index', compact('product', 'category', 'cartCount'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $sortBy = $request->input('sort_by');

        $query = Product::query();

        // Apply search filter
        if ($search) {
            $query->where('p_name', 'LIKE', '%' . $search . '%');
        }

        // Apply category filter
        if ($category) {
            $query->where('category_id', $category); // Adjust based on your actual category relationship
        }

        // Apply sorting
        if ($sortBy === 'highest_price') {
            $query->orderBy('p_price', 'desc');
        } elseif ($sortBy === 'lowest_price') {
            $query->orderBy('p_price', 'asc');
        }

        // Fetch products
        $products = $query->get();

        return response()->json(['products' => $products]);
    }
    public function products()
    {
        $product = Product::all();
        $category = Category::all();
        return view('products', compact('product', 'category'));
    }
    // public function view($id)
    // {
    //     $deleteReview = Review::where(['product_id' => $id, 'user_id' => Auth::id()])->count();
    //     $order = OrderItem::with('order')->orderBy('id', 'DESC')->withWhereHas('order', function ($sql) {
    //         $sql->where(['user_id' => Auth::id(), 'status' => 0]);
    //     })->where(['product_id' => $id])->count();
    //     // return $order;
    //     $reviews = Review::with('product', 'user')->where('product_id', $id)->orderBy('id', 'DESC')->limit(4)->get();
    //     $checkReview = Review::with('product', 'user')->where(['product_id' => $id, 'user_id' => Auth::id()]);
    //     $product = Product::with('category')->findOrFail($id);
    //     $products = Product::find($id);
    //     return view('detail', compact('product', 'products', 'reviews', 'order', 'deleteReview', 'checkReview'));
    // }
    public function view($id)
    {
        $pTotaluser = OrderItem::where('product_id', $id)->count();
        $pTotalpurchase = OrderItem::where('product_id', $id)->sum('quantity');

        $deleteReview = Review::where(['product_id' => $id, 'user_id' => Auth::id()])->count();


        $hasCompletedOrder = OrderItem::with('order')
            ->whereHas('order', function ($query) {
                $query->where(['user_id' => Auth::id(), 'status' => 1]);
            })->where('product_id', $id)->exists();


        $hasPendingOrder = OrderItem::with('order')
            ->whereHas('order', function ($query) {
                $query->where(['user_id' => Auth::id(), 'status' => 0]);
            })->where('product_id', $id)->exists();
        if (Auth::check()) {

            $viewConfirm = View::where(['product_id' => $id, 'user_id' => Auth::id()])->count();

            if ($viewConfirm === 0) {
                View::create([
                    'product_id' => $id,
                    'user_id' => Auth::id()
                ]);

                $product = Product::find($id);
                if ($product) {
                    $product->increment('views');
                }
            }
        }


        $allReviews = Review::with('product', 'user')->where('product_id', $id)->orderBy('id', 'DESC')->get();

        $userReview = $allReviews->where('user_id', Auth::id())->first();

        $otherReviews = $allReviews->where('user_id', '!=', Auth::id());

        $reviews = $userReview ? $otherReviews->prepend($userReview) : $otherReviews;


        $hasSubmittedReview = Review::where(['product_id' => $id, 'user_id' => Auth::id()])->exists();

        $updateReview = Review::where(['product_id' => $id, 'user_id' => Auth::id()])->first();

        $product = Product::with('category')->findOrFail($id);

        $products = Product::find($id);

        return view('detail', compact('products', 'product', 'reviews', 'hasPendingOrder', 'hasCompletedOrder', 'hasSubmittedReview', 'deleteReview', 'updateReview', 'pTotalpurchase', 'pTotaluser'));
    }



    public function profile($id)
    {
        // $designerId = $id;

        $review = Confirmbooking::where(['user_id' => Auth::id(), 'designer_id' => $id]);

        $waitReview = Booking::where(['user_id' => Auth::id(), 'designer_id' => $id]);

        // return $waitReview;

        $designer = Designer::join('categories', 'categories.id', '=', 'designers.category_id')
            ->where('designers.id', $id) // Specify the column to filter
            ->select('designers.*', 'categories.c_name as category_name') // Select necessary fields
            ->first(); // Use first() to get a single record
        // return $designer;

        $designerReview = Designerreview::with('user', 'designer')->where(['designer_id' => $id])->orderBy('id', 'DESC')->limit(4)->get();


        $checkReview = Designerreview::with('user', 'designer')->where(['designer_id' => $id, 'user_id' => Auth::id()])->get();


        // return $designerReview->count();


        return view('profile', compact('designer', 'review', 'waitReview', 'designerReview', 'checkReview'));
    }

    public function login()
    {
        // dd(Auth::user()->role);die();
        if (Auth::user()->role == "admin") {

            $user = User::where('role', "user")->count();
            $contact = Contact::with('user')->get();
            $designer = User::where('role', "designer")->count();
            $product = User::count();
            $users = User::where('role', "user")->get();
            return redirect('admin/index')->with(compact('users', 'user', 'designer', 'product', 'contact'));
        } else if (Auth::user()->role == "designer") {
            return redirect('designer/index');
        } else {
            return redirect('/');
        }
    }
    public function about()
    {
        return view('about');
    }
    public function myproduct()
    {
        return view('myproduct');
    }
    public function blogdetail()
    {
        return view('blogdetail');
    }
    public function blog()
    {
        return view('blogs');
    }
    public function cart()
    {
        return view('cart');
    }
    public function checkout()
    {
        $id = Auth::user()->id;
        $cart = Cart::with('product')->where('user_id', $id)->get();
        return view('checkout', compact('cart'));
    }
    public function contact()
    {
        $user = Auth::user();
        return view('contact', compact('user'));
    }
    public function detail()
    {
        return view('detail');
    }
    public function pricing()
    {
        return view('pricing');
    }
    public function shop()
    {
        return view('shop');
    }
    public function team()
    {
        // $designers = Designer::all();
        $designers = Designer::join('categories', 'categories.id', '=', 'designers.category_id')->select('designers.*', 'categories.c_name as category_name') // Select necessary fields
            ->where('available',1)->get();
        return view('team', compact('designers'));
    }
    public function view_orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('orders', compact('orders'));
    }

    public function view_bookings()
    {
        // $bookings = Booking::where('bookings.user_id', Auth::id())
        //     ->select('bookings.*','designers.fname','designers.lname')
        //     ->join('designers', 'bookings.designer_id', '=', 'designers.id')
        //     ->get();

        $bookings = Booking::with('designer', 'time', 'category')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        $cancelbookings = Cancelbooking::with('designer', 'time', 'category')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        $confirmbookings = Confirmbooking::with('designer', 'time', 'category')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        // return $bookings;
        // return $confirmbookings;

        return view('bookings', compact('bookings', 'cancelbookings', 'confirmbookings'));
    }


    public function vieworder($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        // return $orders->orderitem->first()->products->p_name;
        return view('view_orders', compact('orders'));
    }
    public function viewbook($id)
    {

        // $bookings = Booking::where('id', $id)->where('user_id', Auth::id())->first();

        // $bookings = Booking::with('designer', 'time', 'category')->where(['id' => $id, 'user_id' => Auth::id()])->first();

        $bookings = Booking::with('designer.user', 'time', 'category')
            ->where(['id' => $id, 'user_id' => Auth::id()])
            ->first();


        // return $bookings;
        if (!$bookings) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        return view('view_booking', compact('bookings'));
    }


    public function viewcategory($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id); // Use find for cleaner code
            $products = Product::where('category_id', $category->id)->get(); // Fetch products

            return view('view_category', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', '***Slug Not Exists***');
        }
    }

    public function mail()
    {
        Mail::to('aptechrafay2@gmail.com')->send(new welcomemail('Hello', 'How are you'));
    }

    public function userorderpdf()
    {
        $orders = Order::with('user')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('pdf.userorderpdf', compact('orders'));

        return $pdf->download(Auth::user()->name . "'s_Orders.pdf");
    }
    public function singleOrderpdf(string $id)
    {

        $orders = Order::with('orderitem')->findOrFail($id);

        $orderscount = DB::table('orders')
            ->select(
                'id as order_id',
                DB::raw('ROW_NUMBER() OVER (PARTITION BY user_id ORDER BY id ASC) as order_position')
            )
            ->where('user_id', Auth::id())
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->get();

        $specificOrder = $orderscount->firstWhere('order_id', $id);

        if ($specificOrder) {
            $positionWithSuffix = $this->addOrdinalSuffix($specificOrder->order_position);

            $pdf = Pdf::loadView('pdf.singleorderpdf', compact('orders'));

            return $pdf->download(Auth::user()->name . "'s_$positionWithSuffix " . "_Order.pdf");
        } else {
            return "Order not found or Order status is pending.";
        }
    }

    // Helper function to add ordinal suffix
    private function addOrdinalSuffix($number)
    {
        if (!in_array(($number % 100), [11, 12, 13])) {
            switch ($number % 10) {
                case 1:
                    return $number . 'st';
                case 2:
                    return $number . 'nd';
                case 3:
                    return $number . 'rd';
            }
        }
        return $number . 'th';
        // return $orders;


    }

    public function try()
    {
        $user = auth()->user();

        // URL me passed ID (users table me user_id hona chahiye)
        $targetUserId = 24;

        // Booking table se validate karein
        $booking = Booking::where('user_id', $user->id)
            ->where('status', 1)
            ->whereHas('designer', function ($query) use ($targetUserId) {
                $query->where('user_id', $targetUserId); // Designer ki user_id match karein
            })
            ->first();


        return $booking;
    }
}
