@extends('WEBSITE.Components')

@section('web-components')

<link rel="stylesheet" href="{{ asset('css/WEBSITE/orders.css') }}">

<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
                @if($orders->isEmpty())
                    <div class="text-center my-5">
                        <h4>You don't have any orders yet.</h4>
                        <a href="/product" class="btn btn-primary mt-3">Browse Products</a>
                    </div>
                @else
                    <!-- Recent Order Section -->
                    <div class="card mb-4" style="border-radius: 10px; filter:invert(1);">
                        <div class="card-header px-4 py-5 text-center">
                            <h5 style="color: black; font-weight:900; font-size:35px;">RECENT ORDER</h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach($orders->take(1) as $order)
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold mb-0">Order Number: {{ $order->order_number }}</p>
                                            <p class="fw-bold mb-0">Order Date: {{ $order->created_at->format('d M, Y H:i') }}</p>
                                        </div>
                                        <p class="fw-bold mb-0">Customer Name: {{ $order->first_name }} {{ $order->last_name }}</p>
                                        <p class="fw-bold mb-0">Shipping Address: {{ $order->address }}, {{ $order->apartment }}, {{ $order->city }}, {{ $order->postal_code }}</p>
                                        <p class="fw-bold mb-0">Phone: {{ $order->phone }}</p>
                                        <p class="fw-bold mb-0">Payment Method: {{ strtoupper($order->payment_method) }}</p>

                                        <!-- Order Items List -->
                                        <hr>
                                        <h6>Order Items:</h6>
                                        @foreach($order->orderItems as $item)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="mb-0">{{ $item->deal_id ? 'Deal: ' : 'Product: ' }} {{ $item->product_name }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Size: {{ $item->size }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Qty: {{ $item->quantity }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Price: Rs {{ number_format($item->price, 2) }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Subtotal: Rs {{ number_format($item->subtotal, 2) }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                        <!-- Order Summary -->
                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0">Shipping Cost:</p>
                                            <p class="mb-0">Rs {{ number_format($order->shipping_cost, 2) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0">Total Amount:</p>
                                            <p class="mb-0">Rs {{ number_format($order->total_amount, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Past Orders Section -->
                    <div class="card" style="border-radius: 10px; filter:invert(1);">
                        <div class="card-header px-4 py-5 text-center">
                            <h5 style="color: black; font-weight:900; font-size:30px;">PAST ORDERS</h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach($orders->skip(1) as $order)
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold mb-0">Order Number: {{ $order->order_number }}</p>
                                            <p class="fw-bold mb-0">Order Date: {{ $order->created_at->format('d M, Y H:i') }}</p>
                                        </div>
                                        <p class="fw-bold mb-0">Customer Name: {{ $order->first_name }} {{ $order->last_name }}</p>
                                        <p class="fw-bold mb-0">Shipping Address: {{ $order->address }}, {{ $order->apartment }}, {{ $order->city }}, {{ $order->postal_code }}</p>
                                        <p class="fw-bold mb-0">Phone: {{ $order->phone }}</p>
                                        <p class="fw-bold mb-0">Payment Method: {{ strtoupper($order->payment_method) }}</p>

                                        <!-- Order Items List -->
                                        <hr>
                                        <h6>Order Items:</h6>
                                        @foreach($order->orderItems as $item)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="mb-0">{{ $item->deal_id ? 'Deal: ' : 'Product: ' }} {{ $item->product_name }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Size: {{ $item->size }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Qty: {{ $item->quantity }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Price: Rs {{ number_format($item->price, 2) }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="mb-0">Subtotal: Rs {{ number_format($item->subtotal, 2) }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                        <!-- Order Summary -->
                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0">Shipping Cost:</p>
                                            <p class="mb-0">Rs {{ number_format($order->shipping_cost, 2) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0">Total Amount:</p>
                                            <p class="mb-0">Rs {{ number_format($order->total_amount, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
