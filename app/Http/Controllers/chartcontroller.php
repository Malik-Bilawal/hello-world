<?php

namespace App\Http\Controllers;

use App\Models\chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class chartcontroller extends Controller
{

public function insertchart(Request $request)
{
    $validatedData = $request->validate([
        'chartimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'charttitle' => 'required|string|max:255',
    ]);

    $chart = new chart();

    if ($request->hasFile('chartimage')) {
        $image = $request->file('chartimage');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/chartassets', $imageName);
        $chart->chart_image = $imageName;
    }
    $chart->chart_title = $request->charttitle;
    $chart->save();

    return redirect()->back()->with('success', 'Banner inserted successfully');
}


public function showchartadmin()
{
    $charts = chart::all(); // Fetch all banner images
    return view('Admin.WebSection.show-chart', compact('charts')); // Pass the banners to the view
}

public function deletechart($id)
{
    $charts = chart::findOrFail($id);

    if ($charts->chart_image) {
        Storage::delete('public/chartassets/' . $charts->chart_image);
    }

    $charts->delete();

    return redirect()->back()->with('success', 'Banner deleted successfully');
}


public function editchart($id)
{
    $chart = chart::findOrFail($id);
    return view('Admin.WebSection.edit-chart', ['chart' => $chart]);
}

public function updatechart(Request $request, $id)
{
    $chart = chart::findOrFail($id);

    $validatedData = $request->validate([
        'chartimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'charttitle' => 'required|string|max:255',
    ]);

    if ($request->hasFile('chartimage')) {
        // Delete old image if exists
        if ($chart->chart_image) {
            Storage::delete('public/chartassets/' . $chart->chart_image);
        }

        // Process new image
        $image = $request->file('chartimage');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/chartassets', $imageName);

        $chart->chart_image = $imageName;
    }

    $chart->chart_title = $request->charttitle;
    $chart->save();

    return redirect('/show-chart')->with('success', 'Chart updated successfully');
}


}
