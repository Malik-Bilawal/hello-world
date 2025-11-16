<?php

namespace App\Http\Controllers;

use App\Models\categorytbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class categorycontroller extends Controller
{
    public function insertcategory(Request $request)
    {
        // Validate the request data


        // Instantiate the category model
        $categories = new categorytbl();
        if ($request->hasFile('cateimage')) {
            $image = $request->file('cateimage');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/categoryassets', $imageName);
        }

        // Set the category name
        $categories->category_name = $request->categoryname;
        $categories->cateimage = $imageName;
        // Save the category to the database
        $categories->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category added successfully.');
    }



public function editcategory($id)
{

    $category = categorytbl::findOrFail($id);

    return view('Admin.WebSection.edit-category', ['category' => $category]);
}


public function updatecategory(Request $request, $id)
{
    // Find the existing product
    $category = categorytbl::findOrFail($id);


    // Handle image update logic here
    $imagePath = $category->cateimage; // Get the existing image path

    if ($request->hasFile('cateimage')) {
        // Delete old image
        Storage::delete('public/categoryassets/' . $imagePath);

        // Process new image
         if ($request->hasFile('cateimage')) {
        $image = $request->file('cateimage');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('public/categoryassets', $imageName);
   }

    // Update category data
    $category->cateimage = $imageName;
    $category->category_name = $request->input('categoryname');
    $category->save();

    return view('Admin.WebSection.add-categories');
}
}
public function deletecategory($id)
{
    $dele = categorytbl::findOrFail($id);
    $dele->delete();
    return redirect()->back()->with('success', 'Category added successfully.');
}

public function showcategoriesadmin()
{
    $category = categorytbl::all(); // Fetch all banner images
    return view('Admin.WebSection.show-categories', compact('category')); // Pass the banners to the view
}


















}
