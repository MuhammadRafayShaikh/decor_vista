<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function view($id)
    {
        $gallee = Category::with('gallery')->findOrFail($id);

        return view('view', compact('gallee'));

    }
    public function create()
    {
        $gallery = Gallery::all();
        $category = Category::all();
        return view('admin.add_gallery',compact('gallery','category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'g_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:255',
        ]);
        $gallery = new Gallery();
        $g_image = $request->g_image;
        $gallery->category_id = $request->category_id;

        $filename = time().'.'.$g_image->getClientOriginalExtension();
        $g_image->move('gallery',$filename);
        $gallery->g_image = $filename;

        $gallery->save();
       return redirect('admin/show_img');
    }
    public function show()
    {
        $gallery = Gallery::orderby('id', 'desc')->get();
        return view('admin.show_gallery',compact('gallery'));
    }
    public function destroy($id)
    {
        Gallery::destroy(array('id',$id));
        return redirect('admin/show_img');
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        $category = Category::all();
        return view('admin.edit_gallery',compact('gallery','category'));
    }
    public function update(Request $request ,$id)
    {
        $gallery = Gallery::find($id);
        $gallery->category_id = $request->category_id;

        if($request->hasFile('g_image'))
        {
            $path = 'gallery'.$gallery->g_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $g_image = $request->g_image;
            $filename = time().'.'.$g_image->getClientOriginalExtension();
            $g_image->move('gallery',$filename);
            $gallery->g_image = $filename;

        }
        $gallery->save();
        return redirect('admin/show_img');
    }
    public function gallery()
    {
        $gallery = Gallery::all();
        return view('gallery', compact('gallery'));
    }
}
