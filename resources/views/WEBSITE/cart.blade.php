@extends('WEBSITE.Components')

@section('web-components')
<link rel="stylesheet" href="{{ asset('css/WEBSITE/cart.css') }}">

<div class="cart-container">
    <!-- Cart Items Section -->
    <div class="cart-items-section">
        <h1 id="cartheading">My Cart</h1>

        <div class="container-fluid product-tablediv">
            @php $total = 0; @endphp <!-- Initialize total variable -->

            @if(empty($cart['products']) && empty($cart['deals']))
                <p>Your cart is currently empty. <a href="/">Continue shopping</a>.</p>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ITEM NAME</th>
                            <th style="display: none">SIZE</th>
                            <th>ITEM IMAGE</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Products Section -->
                        @if(!empty($cart['products']))
                            @foreach($cart['products'] as $id => $product)
                                @php
                                    $subtotal = $product['price'] * $product['quantity'];
                                    $total += $subtotal;
                                    $firstImage = $product['images'][0] ?? 'default.jpg';
                                @endphp
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td style="display: none">{{ $product['size'] }}</td>
                                    <td id="imgtd">
                                        <img src="{{ asset('storage/app/public/productassets/' . $firstImage) }}" alt="{{ $product['name'] }}" width="50">
                                    </td>
                                    <td>Rs {{ $product['price'] }}</td>
                                    <td id="quantitytd">
                                        <button class="btn btn-secondary btn-sm btn-decrement" data-id="{{ $id }}" data-type="products" onclick="location.reload(true)">-</button>
                                        <input type="text" class="quantity" value="{{ $product['quantity'] }}" readonly style="width: 30px; text-align: center;">
                                        <button class="btn btn-secondary btn-sm btn-increment" data-id="{{ $id }}" data-type="products" onclick="location.reload()">+</button>
                                    </td>
                                    <td>Rs {{ number_format($subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        @endif

                        <!-- Deals Section -->
                        @if(!empty($cart['deals']))
                            @foreach($cart['deals'] as $id => $deal)
                                @php
                                    $subtotal = $deal['price'] * $deal['quantity'];
                                    $total += $subtotal;
                                    $firstDealImage = $deal['images'][0] ?? 'default.jpg';
                                @endphp
                                <tr>
                                    <td>{{ $deal['name'] }}</td>
                                    <td style="display: none">{{ $deal['size'] ?? '-' }}</td>
                                    <td id="imgtd">
                                        <img src="{{ asset('storage/app/public/dealassets/' . $firstDealImage) }}" alt="{{ $deal['name'] }}" width="50">
                                    </td>
                                    <td>Rs {{ $deal['price'] }}</td>
                                    <td id="quantitytd">
                                        <button type="button" class="btn btn-secondary btn-sm btn-decrement" data-id="{{ $id }}" data-type="deals" onclick="location.reload(true)">-</button>
                                        <input type="text" class="quantity" value="{{ $deal['quantity'] }}" readonly style="width: 30px; text-align: center;">
                                        <button class="btn btn-secondary btn-sm btn-increment" data-id="{{ $id }}" data-type="deals" onclick="location.reload()">+</button>
                                    </td>
                                    <td>Rs {{ number_format($subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endif
        </div>
       @if(!empty($cart['products']) || !empty($cart['deals']))
            <form action="{{ route('clearcart') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-warning">Clear Cart</button>
            </form>
        @endif
    </div>

    <!-- Summary Section -->
    <div class="cart-summary-section">
        <h2>Summary</h2>
      @php
    $discount = $total * 0.05;         // 5% discount
    $totalAfterDiscount = $total - $discount;

    $tax = $totalAfterDiscount * 0.04; // 4% tax on discounted price

    $delivery = 200;

    $grandTotal = $totalAfterDiscount + $tax + $delivery;
@endphp

<div class="summary-details">
    <p>Items: {{ count($cart['products'] ?? []) + count($cart['deals'] ?? []) }}</p>
    <p>Subtotal: Rs {{ number_format($total, 2) }}</p>
    <p>Discount (5%): -Rs {{ number_format($discount, 2) }}</p>
    <p>Tax (4%): Rs {{ number_format($tax, 2) }}</p>
    <p>Shipping: Standard Delivery - Rs {{ $delivery }}</p>
    <hr>
    <p><strong>Grand Total: Rs {{ number_format($grandTotal, 2) }}</strong></p>

    <a href="/" class="btn-checkout">Continue Shopping</a>

    @if(!empty($cart['products']) || !empty($cart['deals']))
        <a href="{{ route('payment') }}" class="btn-checkout">Checkout</a>
    @endif
</div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-increment, .btn-decrement').on('click', function() {
        var button = $(this);
        var id = button.data('id');
        var type = button.data('type');
        var action = button.hasClass('btn-increment') ? 'increment' : 'decrement';

        $.ajax({
            url: '{{ route('update.cart.ajax') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                type: type,
                action: action
            },
            success: function(response) {
                if (response.success) {
                    var quantityInput = button.siblings('.quantity');
                    var newQuantity = parseInt(quantityInput.val()) + (action === 'increment' ? 1 : -1);
                    quantityInput.val(newQuantity);
                } else {
                    alert(response.message);
                }
            }
        });
    });
});
</script>

@endsection
