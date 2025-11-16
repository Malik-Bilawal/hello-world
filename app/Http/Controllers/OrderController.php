<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\OrderItem;
use App\Models\order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Display the payment form
public function showPaymentForm()
{
    $user = Auth::user();
    $subtotal = 0;

    if (session('cart')) {
        foreach (session('cart')['products'] as $product) {
            $subtotal += $product['price'] * $product['quantity'];
        }
        foreach (session('cart')['deals'] as $deal) {
            $subtotal += $deal['price'] * $deal['quantity'];
        }
    }

    $discount = $subtotal * 0.05;
    $afterDiscount = $subtotal - $discount;
    $tax = $afterDiscount * 0.04;
    $delivery = 200;

    $totalAmount = $afterDiscount + $tax + $delivery;

    return view('WEBSITE.paymentform', compact('user', 'totalAmount', 'subtotal', 'discount', 'tax', 'delivery'));
}


    // Handle checkout
    // Handle checkout
// Handle checkout
// Handle checkout
public function checkout(Request $request)
{
    // Validate the request
  // Validate the request
$validated = $request->validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'address' => 'required|string|max:255',
    'apartment' => 'required|string|max:255',
    'city' => 'required|string|max:255',
    'postal_code' => 'required|string|max:10',
    'phone' => 'required|string|max:20',
    'email' => 'required|email',
    'payment_method' => 'required|string',
    'subtotal' => 'required|numeric',
    'discount' => 'required|numeric',
    'tax' => 'required|numeric',
    'delivery' => 'required|numeric',
    'total_amount' => 'required|numeric',
    'payment_ss' => 'nullable|array|max:3',
    'payment_ss.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);


    // Log the validated data
    Log::info('Checkout process started with validated data:', $validated);

    // Create the order
   $order = orders::create([
    'user_id' => auth()->check() ? auth()->id() : null,
    'order_number' => strtoupper(uniqid('ORD-')),
    'subtotal' => $validated['subtotal'],
    'discount' => $validated['discount'],
    'tax' => $validated['tax'],
    'shipping_cost' => $validated['delivery'],
    'total_amount' => $validated['total_amount'],
    'status' => 'pending',
    'address' => $validated['address'],
    'city' => $validated['city'],
    'apartment' => $validated['apartment'],
    'postal_code' => $validated['postal_code'],
    'phone' => $validated['phone'],
    'first_name' => $validated['first_name'],
    'last_name' => $validated['last_name'],
    'payment_method' => $validated['payment_method'],
    'payment_ss' => $validated['payment_method'] === 'ot' ? json_encode($this->storePaymentSnapshots($request->file('payment_ss'))) : null,
]);


    // Handle products in the cart
    foreach (session('cart.products', []) as $product) {
        order_items::create([
    'user_id' => auth()->check() ? auth()->id() : null,
            'order_id' => $order->id,
            'product_id' => $product['id'],
            'deal_id' => null, // It's a product, not a deal
            'product_name' => $product['name'],
            'size' => $product['size'], // Ensure 'size' is part of product session data
            'quantity' => $product['quantity'],
            'price' => $product['price'],
            'subtotal' => $product['price'] * $product['quantity'],
        ]);
    }

    // Handle deals in the cart
    foreach (session('cart.deals', []) as $deal) {
        order_items::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'order_id' => $order->id,
            'product_id' => null, // It's a deal, not a product
            'deal_id' => $deal['id'],
            'product_name' => $deal['name'], // Store deal name as product_name
            'size' => $deal['size'], // Ensure 'size' is part of deal session data
            'quantity' => $deal['quantity'],
            'price' => $deal['price'],
            'subtotal' => $deal['price'] * $deal['quantity'],
        ]);
    }

    // Clear the cart after successful order creation
    session()->forget('cart');

    return redirect()->route('orders')->with('success', 'Order placed successfully!');
}

// Helper method to store payment snapshots
protected function storePaymentSnapshots($files)
{
    $snapshotPaths = [];
    foreach ($files as $file) {
        $snapshotName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/paymentsnapshots', $snapshotName);
        $snapshotPaths[] = $snapshotName; // Store the path
    }
    return $snapshotPaths; // Return array of paths
}




 // Show orders
    // Show orders
// Show orders
public function showOrders()
{
    // Fetch orders with orderItems and details
    $orders = orders::with(['orderItems']) // Using 'orderItems' relationship
                    ->where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('WEBSITE.orders', compact('orders'));
}

public function showGuestOrders(Request $request)
{
    $validated = $request->validate([
        'phone' => 'required|string|max:20',
    ]);

    $orders = orders::with('orderItems')
                    ->whereNull('user_id') // Guests only
                    ->where('phone', $validated['phone'])
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('WEBSITE.guest-orders', compact('orders'));
}



public function showAdminOrders()
{

    // Fetch all orders with their related order items
    $orders = orders::with('items') // Ensure 'items' is the correct relationship name
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('Admin.order-list', compact('orders'));
}


// Method to accept an order
    public function acceptOrder($id)
    {
        $order = orders::findOrFail($id);
        if ($order->status == 'pending') {
            $order->status = 'Accepted';
            $order->save();
            return redirect()->back()->with('success', 'Order accepted successfully.');
        }

        return redirect()->back()->with('error', 'Order cannot be accepted.');
    }

    // Method to delete an order
    public function deleteOrder($id)
    {
        $order = orders::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }



}
