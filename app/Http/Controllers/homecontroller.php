<?php

namespace App\Http\Controllers;

use App\Models\bannertbl;
use App\Models\producttbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\categorytbl;
use App\Models\dealtbl;

class homecontroller extends Controller
{
    public function showthings()
    {
        $banners = bannertbl::all();
        $deals = dealtbl::all();
        $products = producttbl::limit(3)->get();

        foreach ($products as $product) {
            $product->product_images = json_decode($product->product_images, true);
        }
        foreach ($deals as $deal) {
            $deal->deal_images = json_decode($deal->deal_images, true);
        }
        return view('WEBSITE.home', compact('banners', 'deals', 'products'));
    }


public function productdetails($id)
{
    $product = producttbl::with('chart')->findOrFail($id);
    $product->product_images = json_decode($product->product_images, true);
    $availableSizes = json_decode($product->sizes, true); // Decode sizes

    // Fetch the size chart image based on sizechart_id
    $sizeChartImage = $product->sizechart_id ? 'storage/chartassets/' . $product->chart->chart_image : 'storage/chartassets/default.jpeg';

    return view('WEBSITE.product-detail', compact('product', 'sizeChartImage', 'availableSizes'));
}


 public function dealdetails($id)
{
    $deal = dealtbl::with('chart')->findOrFail($id);

    // Check if deal_images is already an array, if not decode it
    if (is_string($deal->deal_images)) {
        $deal->deal_images = json_decode($deal->deal_images, true);
    }

    // Decode sizes for the detail view
    $availableSizes = json_decode($deal->sizes, true);

    // Fetch the size chart image based on sizechart_id
    $sizeChartImage = $deal->sizechart_id ? 'storage/chartassets/' . $deal->chart->chart_image : 'storage/chartassets/default.jpeg';

    return view('WEBSITE.deal-detail', compact('deal', 'sizeChartImage', 'availableSizes'));
}






public function showproductspage(Request $request)
{
    $categories = categorytbl::all();

    // 🔍 Get category from query string if available
    $categoryId = $request->query('category');

    // 🔁 Filter products if category is selected
    if ($categoryId) {
        $products = producttbl::where('category_id', $categoryId)->get();
    } else {
        $products = producttbl::all();
    }

    foreach ($products as $product) {
        $product->product_images = json_decode($product->product_images, true);
    }

    return view('WEBSITE.product', compact('products', 'categories', 'categoryId'));
}

}




