<?php

namespace App\Http\Controllers;

use App\Models\bannertbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;





class bannercontroller extends Controller
{

public function insertbanner(Request $request)
{
    $validatedData = $request->validate([
        'bannerimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $banner = new bannertbl();

    if ($request->hasFile('bannerimage')) {
        $image = $request->file('bannerimage');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/bannerassets', $imageName);
        $banner->bannerimage = $imageName;
    }

    $banner->save();

    return redirect()->back()->with('success', 'Banner inserted successfully');
}
public function editbanner($id)
{
    $banner = bannertbl::findOrFail($id);

    return view('Admin.WebSection.edit-banner', ['banner' => $banner]);
}

public function updatebanner(Request $request, $id)
{
    $banner = bannertbl::findOrFail($id);

    $validatedData = $request->validate([
        'bannerimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('bannerimage')) {
        // Delete old image if it exists
        if ($banner->bannerimage) {
            Storage::delete('public/bannerassets/' . $banner->bannerimage);
        }

        // Process new image
        $image = $request->file('bannerimage');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/bannerassets', $imageName);

        $banner->bannerimage = $imageName;
    }

    // Only save if there's an update to apply
    $banner->save();

    return redirect()->back()->with('success', 'Banner updated successfully');
}


public function showbanneradmin()
{
    $banners = bannertbl::all(); // Fetch all banner images
    return view('Admin.WebSection.show-banner', compact('banners')); // Pass the banners to the view
}
public function deletebanner($id)
{
    $banner = bannertbl::findOrFail($id);

    if ($banner->bannerimage) {
        Storage::delete('public/bannerassets/' . $banner->bannerimage);
    }

    $banner->delete();

    return redirect()->back()->with('success', 'Banner deleted successfully');
}














}



