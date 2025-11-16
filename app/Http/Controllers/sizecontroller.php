<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\sizetbl;
use Illuminate\Http\Request;

class sizecontroller extends Controller
{
    public function insertSize(Request $request)
    {
        $validatedData = $request->validate([
            'size' => 'required|string|max:255',
        ]);

        $size = new sizetbl();
        $size->size = $request->size;
        $size->save();

        return redirect()->back()->with('success', 'Size added successfully');
    }

    public function showSizeAdmin()
    {
        $sizes = sizetbl::all();
        return view('Admin.WebSection.show-size', compact('sizes'));
    }

    public function editSize($id)
    {
        $size = sizetbl::findOrFail($id);
        return view('Admin.WebSection.edit-size', ['size' => $size]);
    }

    public function updateSize(Request $request, $id)
{
    $size = sizetbl::findOrFail($id);

    $validatedData = $request->validate([
        'size' => 'required|string|max:255',
    ]);

    $size->size = $request->size;
    $size->save();

    return redirect()->route('show-size')->with('success', 'Size updated successfully');
}


    public function deleteSize($id)
    {
        $size = sizetbl::findOrFail($id);
        $size->delete();

        return redirect()->back()->with('success', 'Size deleted successfully');
    }
}
