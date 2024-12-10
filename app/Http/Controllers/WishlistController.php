<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class WishlistController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view your wishlist.');
        }

        $wishlist = Wishlist::where('user_id', Auth::id())->with('product')->get();
        return view('wishlist_index', compact('wishlist'));
    }


    public function store($id)
    {
        if (Auth::check()) {
            Wishlist::updateOrCreate(
                ['product_id' => $id, 'user_id' => Auth::user()->id]
            );
            return redirect()->route('wishlist.index')->with('success', 'Product added to wishlist!');
        } else {
            return redirect('login')->with('error', 'Please log in to add products to your wishlist.');
        }
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please log in to remove products from your wishlist.');
        }

        Wishlist::where('id', $id)->delete();
        return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist.');
    }

    public function moveToCart($id)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please log in to move products to the cart.');
        }

        $wishlistItem = Wishlist::find($id);

        if (!$wishlistItem) {
            return redirect()->back()->with('error', 'Product not found in wishlist.');
        }


        app(CartController::class)->store($wishlistItem->product_id);


        $wishlistItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product moved to cart!');
    }
}
