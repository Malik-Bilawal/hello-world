<?php

namespace App\Http\Controllers;

use Log;
use App\Models\chart;
use App\Models\dealtbl;
use App\Models\sizetbl;
use App\Models\producttbl;
use App\Models\categorytbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
    public function showassetsinform()
    {
        $categories = categorytbl::all();
        $sizes = sizetbl::all();
        $charts = chart::all();
        return view('Admin.add-product', compact('categories', 'sizes', 'charts'));
    }

    public function insertproduct(Request $request)
    {
        $validatedData = $request->validate([
            'product_images' => 'required|array|min:1|max:3',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proname' => 'required|string',
            'proprice' => 'required|numeric',
            'prodiscountprice' => 'nullable|numeric',
            'prodescription' => 'required|string',
            'category_id' => 'required|exists:categorytbls,id',
            'sizechart_id' => 'nullable|exists:charts,id',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string'
        ]);

        $product = new producttbl();
        $imagePaths = [];

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/productassets', $imageName);
                $imagePaths[] = $imageName;
            }
        }

        $product->product_name = $request->proname;
        $product->product_price = $request->proprice;
        $product->product_discount_price = $request->prodiscountprice;
        $product->product_description = $request->prodescription;
        $product->product_images = json_encode($imagePaths);
        $product->category_id = $request->category_id;
        $product->sizechart_id = $request->sizechart_id ?: null;
        $product->sizes = json_encode($request->sizes) ?: null;
        $product->save();

        return redirect('/show-products');
    }

    public function editProduct($id)
    {
        $product = producttbl::findOrFail($id);
        $categories = categorytbl::all();
        $sizes = sizetbl::all();
        $charts = chart::all();
        $productSizes = json_decode($product->sizes, true);

        return view('Admin.edit-product', compact('product', 'categories', 'sizes', 'charts', 'productSizes'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = producttbl::findOrFail($id);

        $validatedData = $request->validate([
            'product_images' => 'nullable|array|min:1|max:3',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proname' => 'required|string',
            'proprice' => 'required|numeric',
            'prodiscountprice' => 'nullable|numeric',
            'prodescription' => 'required|string',
            'category_id' => 'required|exists:categorytbls,id',
            'sizechart_id' => 'nullable|exists:charts,id',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string'
        ]);

        $imagePaths = json_decode($product->product_images, true);

        if ($request->hasFile('product_images')) {
            foreach ($imagePaths as $imagePath) {
                Storage::delete('public/productassets/' . $imagePath);
            }

            $imagePaths = [];
            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/productassets', $imageName);
                $imagePaths[] = $imageName;
            }
        }

        $product->product_name = $request->input('proname');
        $product->product_price = $request->input('proprice');
        $product->product_discount_price = $request->input('prodiscountprice');
        $product->product_description = $request->input('prodescription');
        $product->product_images = json_encode($imagePaths);
        $product->category_id = $request->input('category_id');
        $product->sizechart_id = $request->input('sizechart_id') ?: null;
        $product->sizes = json_encode($request->sizes) ?: null;
        $product->save();

        return redirect('/show-products')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = producttbl::findOrFail($id);
        $product->delete();

        return redirect('/show-products')->with('success', 'Product deleted successfully.');
    }

    public function showProducts()
    {
        $products = producttbl::all();

        foreach ($products as $product) {
            $product->product_images = json_decode($product->product_images, true);
        }

        return view('Admin.show-product', compact('products'));
    }
// old one
// public function addToCartProduct(Request $request, $productId)
// {
//     $product = producttbl::findOrFail($productId);

//     // Validate that the size is selected
//     $size = $request->input('size');
//     if (empty($size)) {
//         // Changed: Return JSON response for AJAX error handling
//         if ($request->ajax()) {
//             return response()->json(['success' => false, 'message' => 'Please select a size before adding to cart']);
//         }
//         return redirect()->back()->with('error', 'Please select a size before adding to cart');
//     }

//     $cart = session()->get('cart', ['products' => [], 'deals' => []]);
//     $cartKey = $productId . '-' . $size;

//     if (isset($cart['products'][$cartKey])) {
//         // Increment quantity if the product with the same size exists
//         $cart['products'][$cartKey]['quantity'] += $request->input('quantity', 1);
//     } else {
//         // Add new product entry to the cart
//         $cart['products'][$cartKey] = [
//             'id' => $productId,
//             'name' => $product->product_name,
//             'price' => $product->product_price,
//             'quantity' => $request->input('quantity', 1),
//             'size' => $size,
//             'images' => json_decode($product->product_images, true)
//         ];
//     }

//     // Update the cart session
//     session()->put('cart', $cart);

//     // Changed: Return JSON response for successful AJAX requests
//     if ($request->ajax()) {
//         return response()->json(['success' => true, 'message' => 'Product added to cart']);
//     }

//     return redirect()->back()->with('success', 'Product added to cart');
// }







// public function addToCartDeal(Request $request, $dealId)
// {
//     $deal = dealtbl::findOrFail($dealId);
//     // $size = $request->input('size');
//      // Validate that the size is selected
//     $size = $request->input('size');
//     if (empty($size)) {
//         return redirect()->back()->with('error', 'Please select a size before adding to cart');
//     }
//     $cart = session()->get('cart', ['products' => [], 'deals' => []]);

//     $cartKey = $dealId . '-' . $size;

//     if (isset($cart['deals'][$cartKey])) {
//         // Increment quantity if the deal with the same size exists
//         $cart['deals'][$cartKey]['quantity'] += $request->input('quantity', 1);
//         return redirect()->back()->with('success', 'Deal quantity updated in cart');
//     } else {
//         // Add new deal entry
//         $cart['deals'][$cartKey] = [
//             'id' => $dealId,
//             'name' => $deal->deal_name,
//             'price' => $deal->deal_discount_price,
//             'quantity' => $request->input('quantity', 1),
//             'size' => $size,
//             'images' => json_decode($deal->deal_images, true)
//         ];
//     }

//     session()->put('cart', $cart);
//     return redirect()->back()->with('success', 'Deal added to cart');
// }



public function addToCartProduct(Request $request, $productId)
{
    $product = producttbl::findOrFail($productId);

    // Validate that the size is selected
    $size = $request->input('size');
    if (empty($size)) {
        // Changed: Return JSON response for AJAX error handling
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Please select a size before adding to cart']);
        }
        return redirect()->back()->with('error', 'Please select a size before adding to cart');
    }

    $cart = session()->get('cart', ['products' => [], 'deals' => []]);
    $cartKey = $productId . '-' . $size;

    if (isset($cart['products'][$cartKey])) {
        // Increment quantity if the product with the same size exists
        $cart['products'][$cartKey]['quantity'] += $request->input('quantity', 1);
    } else {
        // Add new product entry to the cart
        $cart['products'][$cartKey] = [
            'id' => $productId,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->input('quantity', 1),
            'size' => $size,
            'images' => json_decode($product->product_images, true)
        ];
    }

    // Update the cart session
    session()->put('cart', $cart);

    // Check if the request is for "Buy Now" action (added condition)
    if ($request->input('buy_now')) {
        // Changed: Redirect to the payment page
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart for immediate purchase',
            'redirect' => route('payment') // Replace with your actual payment route
        ]);
    }

    // Changed: Return JSON response for successful AJAX requests
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    return redirect()->back()->with('success', 'Product added to cart');
}




// public function addToCartDeal(Request $request, $dealId)
// {
//     $deal = dealtbl::findOrFail($dealId);

//     // Validate size selection
//     $size = $request->input('size');
//     if (empty($size)) {
//         return redirect()->back()->with('error', 'Please select a size before adding to cart');
//     }

//     $cart = session()->get('cart', ['products' => [], 'deals' => []]);

//     // Create a unique key for the deal with the selected size
//     $cartKey = $dealId . '-' . $size;

//     if (isset($cart['deals'][$cartKey])) {
//         // Increment quantity if the deal with the same size exists
//         $cart['deals'][$cartKey]['quantity'] += $request->input('quantity', 1);
//         return redirect()->back()->with('success', 'Deal quantity updated in cart');
//     } else {
//         // Add new deal entry to the cart
//         $cart['deals'][$cartKey] = [
//             'id' => $dealId,
//             'name' => $deal->deal_name,
//             'price' => $deal->deal_price,
//             'quantity' => $request->input('quantity', 1),
//             'size' => $size,
//             'images' => json_decode($deal->deal_images, true)
//         ];
//     }

//     // Update the cart session
//     session()->put('cart', $cart);

//     // return response()->json(['success' => true, 'message' => 'Deal added to cart']);

//     return redirect()->back();
// }


public function addToCartDeal(Request $request, $dealId)
{
    $deal = dealtbl::findOrFail($dealId);

    // Validate size selection
    $size = $request->input('size');
    if (empty($size)) {
        // Changed: Return JSON response for AJAX error handling
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Please select a size before adding to cart']);
        }
        return redirect()->back()->with('error', 'Please select a size before adding to cart');
    }

    $cart = session()->get('cart', ['products' => [], 'deals' => []]);

    // Create a unique key for the deal with the selected size
    $cartKey = $dealId . '-' . $size;

    if (isset($cart['deals'][$cartKey])) {
        // Increment quantity if the deal with the same size exists
        $cart['deals'][$cartKey]['quantity'] += $request->input('quantity', 1);
    } else {
        // Add new deal entry to the cart
        $cart['deals'][$cartKey] = [
            'id' => $dealId,
            'name' => $deal->deal_name,
            'price' => $deal->deal_price,
            'quantity' => $request->input('quantity', 1),
            'size' => $size,
            'images' => json_decode($deal->deal_images, true)
        ];
    }

    // Update the cart session
    session()->put('cart', $cart);

    // Check if the request is for "Buy Now" action (added condition)
    if ($request->input('buy_now')) {
        // Changed: Redirect to the payment page
        return response()->json([
            'success' => true,
            'message' => 'Deal added to cart for immediate purchase',
            'redirect' => route('payment') // Replace with your actual payment route
        ]);
    }

    // Changed: Return JSON response for successful AJAX requests
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Deal added to cart']);
    }

    return redirect()->back()->with('success', 'Deal added to cart');
}



    public function cart()
    {
        $cart = session()->get('cart', ['products' => [], 'deals' => []]);
        return view('WEBSITE.cart', compact('cart'));
    }

public function clearCart()
{
    session()->forget('cart');
    return redirect()->back()->with('success', 'Cart cleared successfully!');
}


// public function removeFromCart($id, $type, $size = null)
// {
//     $cart = session()->get('cart', ['products' => [], 'deals' => []]);

//     $cartKey = $id . '-' . ($size ?? '');

//     if (isset($cart[$type][$cartKey])) {
//         unset($cart[$type][$cartKey]);
//         session()->put('cart', $cart);
//         return redirect()->back()->with('success', 'Item removed');
//     }

//     return redirect()->back()->with('error', 'Item not found');
// }


 public function updateCartAjax(Request $request)
{
    $cart = session()->get('cart', ['products' => [], 'deals' => []]);
    $id = $request->input('id');
    $type = $request->input('type');
    $action = $request->input('action');

    if ($type === 'products' && isset($cart['products'][$id])) {
        if ($action === 'increment') {
            $cart['products'][$id]['quantity']++;
        } elseif ($action === 'decrement' && $cart['products'][$id]['quantity'] > 1) {
            $cart['products'][$id]['quantity']--;
        }
    }

    if ($type === 'deals' && isset($cart['deals'][$id])) {
        if ($action === 'increment') {
            $cart['deals'][$id]['quantity']++;
        } elseif ($action === 'decrement' && $cart['deals'][$id]['quantity'] > 1) {
            $cart['deals'][$id]['quantity']--;
        }
    }

    session()->put('cart', $cart);

    return response()->json(['success' => true]);
}




}
