<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;


Route::get('view/{id}', [HomeController::class, 'view'])->name('singleProduct');
Route::get('/detail', [HomeController::class, 'detail']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('profile/{id}', [HomeController::class, 'profile']);
Route::get('/', [HomeController::class, 'index'])->name('user.index');
Route::get('/search', [HomeController::class, 'searchpro']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/myproduct', [HomeController::class, 'myproduct']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('view_category/{id}', [HomeController::class, 'viewcategory']);
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
Route::post('/wishlist/move-to-cart/{id}', [WishlistController::class, 'moveToCart'])->name('wishlist.moveToCart');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('cart/index', [CartController::class, 'index'])->name('cart.index');
Route::get('/my_orders', [HomeController::class, 'view_orders']);
Route::get('/my_bookings', [HomeController::class, 'view_bookings']);
Route::get('/view_orders/{id}', [HomeController::class, 'vieworder']);
Route::get('/view_book/{id}', [HomeController::class, 'viewbook']);
Route::get('cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('create/order', [CartController::class, 'createOrder'])->name('create.order');
Route::post('store/order', [CartController::class, 'storeOrder'])->name('store.order');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/galleries', [GalleryController::class, 'gallery']);
Route::get('/try', [HomeController::class, 'try']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'clear.admin.cache'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('home', [HomeController::class, 'login']);
    Route::middleware('auth')->group(function () {
        Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
        Route::post('/sendEmail', [ContactController::class, 'sendEmail'])->name('sendEmail');
        Route::get('/bookings/create/{id}', [BookingController::class, 'booking']);
        Route::get('/fetch_time', [BookingController::class, 'fetch_time']);
        Route::post('/get-times', [BookingController::class, 'getTimes'])->name('get.times');
        Route::delete('deletebooking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
        Route::post('designerReviews', [BookingController::class, 'designerReviews'])->name('designerReviews');
        Route::put('updateDesignerReview/{id}', [BookingController::class, 'updateDesignerReview'])->name('updateDesignerReview');
        Route::delete('deleteDesignerReview/{id}', [BookingController::class, 'deleteDesignerReview'])->name('deleteDesignerReview');
        Route::get('review/{id}', [ReviewController::class, 'show']);
        Route::resource('review', ReviewController::class);

        Route::post('review/{id}', [ReviewController::class, 'store'])->name('review.store')->middleware('auth');

        Route::delete('review/{id}/{pid}', [ReviewController::class, 'destroy'])->name('review.destroy');

        Route::put('/updateReview/{id}', [ReviewController::class, 'updateReview'])->name('updateReview');

        Route::post('/booknow', [BookingController::class, 'book'])->name('book');

        Route::post('/cancel_order/{id}', [CartController::class, 'cancelOrder'])->name('cancel.order');
        Route::get('userorderpdf', [HomeController::class, 'userorderpdf'])->name('userorderpdf');
        Route::get('singleOrderpdf/{id}', [HomeController::class, 'singleOrderpdf'])->name('singleOrderpdf');
    });

    Route::group(['middleware' => ['designer', 'clear.admin.cache'], 'prefix' => 'designer'], function () {
        Route::get('index', [DesignerController::class, 'index']);
        Route::get('create', [DesignerController::class, 'create']);
        Route::post('store', [DesignerController::class, 'store'])->name('store');
        Route::get('show/', [DesignerController::class, 'dashboard'])->name('designer.show');
        Route::put('delete/{id}', [DesignerController::class, 'destroy'])->name('delete.designer');
        Route::get('edit/{id}', [DesignerController::class, 'edit'])->name('edit.designer');
        Route::post('update/{id}', [DesignerController::class, 'update'])->name('update.designer');
        Route::get('/showbooking', [DesignerController::class, 'showbooking']);
        Route::get('/view_bookings/{id}', [DesignerController::class, 'view_bookings']);
        Route::post('update_bookings/{id}', [DesignerController::class, 'update_bookings']);
        Route::post('/confirm_appointment/{id}', [DesignerController::class, 'confirm_app'])->name('confirm_app');
        Route::delete('delete_booking/{id}', [DesignerController::class, 'delete'])->name('delete_booking');
        Route::get('reviews', [DesignerController::class, 'reviews'])->name('reviews');
        Route::get('/add_tm', [TimeController::class, 'create'])->name('add_time');
        Route::post('store_tm', [TimeController::class, 'store'])->name('store_time');
        Route::get('show_tm', [TimeController::class, 'show'])->name('show_time');
        Route::get('delete_tm/{id}', [TimeController::class, 'destroy'])->name('delete_time');
        Route::get('edit_tm/{id}', [TimeController::class, 'edit'])->name('edit_time');
        Route::post('update_tm/{id}', [TimeController::class, 'update'])->name('update_time');
        Route::post('/sendEmail2', [ContactController::class, 'sendEmail2'])->name('sendEmail2');


        Route::get('timeslotpdf', [DesignerController::class, 'time
        slotpdf'])->name('timeslotpdf');
        Route::get('desingerbookingpdf', [DesignerController::class, 'desingerbookingpdf'])->name('desingerbookingpdf');
        Route::get('cancelbookingpdf', [DesignerController::class, 'cancelbookingpdf'])->name('cancelbookingpdf');
        Route::get('completebookingpdf', [DesignerController::class, 'completebookingpdf'])->name('completebookingpdf');
        Route::get('designerReviewpdf2', [DesignerController::class, 'designerReviewpdf2'])->name('designerReviewpdf2');
    });

    Route::group(['middleware' => ['admin', 'clear.admin.cache'], 'prefix' => 'admin'], function () {
        Route::get('index', [AdminController::class, 'index']);
        Route::get('user', [AdminController::class, 'user']);
        Route::get('view_order/{id}', [AdminController::class, 'view_orders']);
        Route::put('update_order/{id}', [AdminController::class, 'update_orders']);
        Route::get('order_history', [AdminController::class, 'history_orders']);
        Route::get('/show_orders', [AdminController::class, 'orders']);
        Route::get('orders', [AdminController::class, 'orders']);
        Route::get('designer', [AdminController::class, 'designer']);
        Route::get('products', [AdminController::class, 'products']);
        Route::get('add', [AdminController::class, 'add']);
        Route::post('store', [AdminController::class, 'store']);
        Route::get('/add_cat', [CategoryController::class, 'create']);
        Route::post('store_cat', [CategoryController::class, 'store']);
        Route::get('show_cat', [CategoryController::class, 'show']);
        Route::get('edit_cat/{id}', [CategoryController::class, 'edit']);
        Route::post('update_cat/{id}', [CategoryController::class, 'update']);
        Route::get('/delete_cat/{id}', [CategoryController::class, 'destroy']);
        Route::get('/add_prod', [ProductController::class, 'create']);
        Route::post('store_prod', [ProductController::class, 'store']);
        Route::get('show_prod', [ProductController::class, 'show']);
        Route::get('edit_prod/{id}', [ProductController::class, 'edit']);
        Route::post('update_prod/{id}', [ProductController::class, 'update']);
        Route::get('delete_prod/{id}', [ProductController::class, 'destroy']);

        Route::get('/add_img', [GalleryController::class, 'create']);
        Route::post('store_img', [GalleryController::class, 'store']);
        Route::get('show_img', [GalleryController::class, 'show']);
        Route::get('delete_img/{id}', [GalleryController::class, 'destroy']);
        Route::get('edit_img/{id}', [GalleryController::class, 'edit']);
        Route::post('update_img/{id}', [GalleryController::class, 'update']);
        Route::get('/showbooking', [AdminController::class, 'showbooking']);
        Route::get('review/', [AdminController::class, 'showreview']);
        Route::get('designerReview/', [AdminController::class, 'designerReview'])->name('designerReview');

        Route::get('categorypdf', [AdminController::class, 'categorypdf'])->name('categorypdf');
        Route::get('productpdf', [AdminController::class, 'productpdf'])->name('productpdf');
        Route::get('userpdf', [AdminController::class, 'userpdf'])->name('userpdf');
        Route::get('designerpdf', [AdminController::class, 'designerpdf'])->name('designerpdf');
        Route::get('incomOrderpdf', [AdminController::class, 'incomOrderpdf'])->name('incomOrderpdf');
        Route::get('completeOrderpdf', [AdminController::class, 'completeOrderpdf'])->name('completeOrderpdf');
        Route::get('reviewpdf', [AdminController::class, 'reviewpdf'])->name('reviewpdf');
        Route::get('designerreviewpdf', [AdminController::class, 'designerreviewpdf'])->name('designerreviewpdf');
        Route::get('bookingpdf', [AdminController::class, 'bookingpdf'])->name('bookingpdf');

        // web.php

        Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
        Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
        // Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search');
        // Route::get('/search', [GeneralController::class, 'search'])->name('general.search');


        // Route::post('/search', [AdminController::class, 'search'])->name('search');

        Route::get('search', [AdminController::class,'search'])->name('searching');
    });
});
