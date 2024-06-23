<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('partials.add-category');
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'      => 'required',
            'slug'      => 'required|unique:category',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
               
                $image->move(public_path('images'), $imageName);
            } else {
                return back()->with('error', 'No image uploaded.');
            }
    
            // Save product details to the database
            $category = new Category();
            $category->title = $request ->title;
            $category->slug = $request ->slug;
            
            $category->image = $imageName;
            $category->save();
    
            return redirect()->back()->with('success', 'Category added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to add product.');
        }

       
    }
    public function show()
    {
        $categories = Category::all();
        return view('partials.add-category', compact('categories'));
    }
    public function force_delete(Request $request, $id)
{
    $category = Category::find($id);

    if (!is_null($category)) {
        $category->forceDelete();
        return redirect()->back()->with("success", "Category Deleted Permanently!!");
    } else {
        // Handle case where collection is not found
        return redirect()->back()->with("error", "Category not found!");
    }
}

}
