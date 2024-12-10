<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create()
    {
        $product = Product::all();
        $category = Category::all();
        return view('admin.add_product', compact('product', 'category'));
    }
    public function store(Request $request)
    {
        $product = new Product();
        $p_image = $request->p_image;
        $product->category_id = $request->category_id;
        $product->p_name = $request->p_name;
        $product->p_price = $request->p_price;
        $product->quantity = $request->quantity;
        $filename = time() . '.' . $p_image->getClientOriginalExtension();
        $p_image->move('product', $filename);
        $product->p_image = $filename;

        $product->save();
        return redirect('admin/show_prod')->with('success', 'Product added successfully.');;
    }
    public function show()
    {
        $product = Product::orderBy('id', 'desc')->get();
        return view('admin.show_product', compact('product'));
    }
    public function destroy($id)
    {
        Product::destroy(array('id', $id));
        return redirect('admin/show_prod')->with('success', 'Product deleted successfully.');;
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin/edit_product', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->p_name = $request->p_name;
        $product->p_price = $request->p_price;
        $product->quantity = $request->quantity;
        if ($request->hasFile('p_image')) {
            $path = 'product' . $product->p_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $p_image = $request->p_image;
            $filename = time() . '.' . $p_image->getClientOriginalExtension();
            $p_image->move('product', $filename);
            $product->p_image = $filename;
        }
        $product->save();
        return redirect('admin/show_prod')->with('success', 'Products edit successfully.');;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();
        return view('products.index', compact('products'));
    }
}
