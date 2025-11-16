<?php

namespace App\Http\Controllers;

use App\Models\chart;
use App\Models\dealtbl;
use App\Models\sizetbl;
use App\Models\categorytbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dealcontroller extends Controller
{
    public function showAddForm()
    {
        $categories = categorytbl::all();
        $charts = chart::all();
          $sizes = sizetbl::all();
        return view('Admin.add-deal', compact('categories', 'charts','sizes'));
    }

    public function insertDeal(Request $request)
    {
        $validatedData = $request->validate([
            'deal_images' => 'required|array|min:1|max:3',
            'deal_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deal_name' => 'required|string',
            'deal_price' => 'required|numeric',
            'deal_discount_price' => 'required|numeric',
            'deal_description' => 'required|string',
            'category_id' => 'required|exists:categorytbls,id',
            'sizechart_id' => 'required|exists:charts,id',
            'sizes' => 'required|array', // Add validation for sizes
        ]);

        $deal = new dealtbl();
        $imagePaths = [];
        if ($request->hasFile('deal_images')) {
            foreach ($request->file('deal_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/dealassets', $imageName);
                $imagePaths[] = $imageName;
            }
        }

        $deal->deal_name = $request->deal_name;
        $deal->deal_price = $request->deal_price;
        $deal->deal_discount_price = $request->deal_discount_price;
        $deal->deal_description = $request->deal_description;
        $deal->deal_images = json_encode($imagePaths);
        $deal->category_id = $request->category_id;
        $deal->sizechart_id = $request->sizechart_id;
        $deal->sizes = json_encode($request->sizes); // Save sizes as JSON
        $deal->save();

        return redirect('/show-deals');
    }

    public function editDeal($id)
    {
        $deal = dealtbl::findOrFail($id);
        $categories = categorytbl::all();
        $charts = chart::all();
        $availableSizes = json_decode($deal->sizes, true); // Decode sizes for the edit form
  $sizes = sizetbl::all();
        return view('Admin.edit-deal', compact('deal', 'categories', 'charts', 'availableSizes' , 'sizes'));
    }

    public function updateDeal(Request $request, $id)
    {
        $deal = dealtbl::findOrFail($id);

        $validatedData = $request->validate([
            'deal_images' => 'nullable|array|min:1|max:3',
            'deal_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deal_name' => 'required|string',
            'deal_price' => 'required|numeric',
            'deal_discount_price' => 'nullable|numeric',
            'deal_description' => 'required|string',
            'category_id' => 'required|exists:categorytbls,id',
            'sizechart_id' => 'required|exists:charts,id',
            'sizes' => 'required|array', // Add validation for sizes
        ]);

        // Handle image uploads
        $imagePaths = json_decode($deal->deal_images, true);

        if ($request->hasFile('deal_images')) {
            // Delete old images
            foreach ($imagePaths as $imagePath) {
                Storage::delete('public/dealassets/' . $imagePath);
            }

            // Store new images
            $imagePaths = [];
            foreach ($request->file('deal_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/dealassets', $imageName);
                $imagePaths[] = $imageName;
            }
        }

        // Update deal attributes
        $deal->deal_name = $request->input('deal_name');
        $deal->deal_price = $request->input('deal_price');
        $deal->deal_discount_price = $request->input('deal_discount_price');
        $deal->deal_description = $request->input('deal_description');
        $deal->deal_images = json_encode($imagePaths);
        $deal->category_id = $request->input('category_id');
        $deal->sizechart_id = $request->input('sizechart_id');
        $deal->sizes = json_encode($request->input('sizes')); // Update sizes
        $deal->save();

        return redirect('/show-deals')->with('success', 'Deal updated successfully.');
    }

    public function deleteDeal($id)
    {
        $deal = dealtbl::findOrFail($id);

        foreach (json_decode($deal->deal_images, true) as $imagePath) {
            Storage::delete('public/dealassets/' . $imagePath);
        }

        $deal->delete();

        return redirect('/show-deals')->with('success', 'Deal deleted successfully.');
    }

    public function showDealsWebsite()
    {
        $deals = dealtbl::all();
        $categories = categorytbl::all();
        foreach ($deals as $deal) {
            if (is_string($deal->deal_images)) {
                $deal->deal_images = json_decode($deal->deal_images, true);
            }
        }

        return view('WEBSITE.deals_packs', compact('deals', 'categories'));
    }

    public function showDeals()
    {
        $deals = dealtbl::all();

        foreach ($deals as $deal) {
            $deal->deal_images = json_decode($deal->deal_images, true);
        }

        return view('Admin.show-deals-packs', compact('deals'));
    }
}
