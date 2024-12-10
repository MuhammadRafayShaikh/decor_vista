<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.add_category');
    }
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'c_name' => 'required|string|max:255',
            'c_image' => 'required|image|mimes:jpg,jpeg,png,webp,avif|max:2048', // Adjust max size as needed
        ]);

        // Check if category already exists
        $existingCategory = Category::where('c_name', $request->c_name)->first();
        if ($existingCategory) {
            return redirect('admin/add_cat')->with('error', 'Category name already exists. Please choose a different name.');
        }

        // Create new category
        $category = new Category();
        $category->c_name = $request->c_name;

        // Handle image upload
        if ($request->hasFile('c_image')) {
            $c_image = $request->c_image;
            $filename = time() . '.' . $c_image->getClientOriginalExtension();
            $c_image->move('category', $filename);
            $category->c_image = $filename;
        } else {
            return redirect('admin/add_cat')->with('error', 'Image upload failed.');
        }

        // Save the new category
        $category->save();

        return redirect('admin/show_cat')->with('success', 'Category added successfully.');
    }


    public function show()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.show_category', compact('category'));
    }
    public function destroy($id)
    {
        Category::destroy(array('id', $id));
        return redirect('admin/show_cat')->with('success', 'Category deleted successfully.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->c_name = $request->c_name;
        if ($request->hasFile('c_image')) {
            $path = 'category' . $category->c_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $c_image = $request->c_image;
            $filename = time() . '.' . $c_image->getClientOriginalExtension();
            $c_image->move('category', $filename);
            $category->c_image = $filename;
        }
        $category->save();
        return redirect('admin/show_cat')->with('success', 'Category updated successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('name', 'LIKE', '%' . $query . '%')->get();
        return view('categories.index', compact('categories'));
    }
}
