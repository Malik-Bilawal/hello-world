@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="{{ asset('css/Adminpanel/table.css') }}">

<div class="table-responsive">
    <h2 class="order-list-headings"><span>ORDER</span> LIST</h2>
    <table id="customTable">
        <thead>
            <tr>
                <th>Order Number(ID)</th>
                <th>Customer Name</th>
                <th>city</th>
                <th>Order Current Address</th>
                <th>Products</th>
                <th>Quantity</th>
                <th>Shipping Price</th>
                <th>Order Price</th>
                <th>Total Price</th>
                <th>Phone</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Payment SS</th>
                {{-- <th>Transaction SMS</th> --}}
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $ord)
                <tr>
                    <td>{{ $ord->order_number }}</td>
                    <td>{{ $ord->first_name }} {{ $ord->last_name }}</td>
                    <td>{{ $ord->city }}, {{ $ord->country }}</td>
<td>Address: {{ $ord->address }} , apartment: {{ $ord->apartment }}</td>
                    <!-- Check if items exist to avoid null issues -->
                    <td>
                        @if($ord->items && count($ord->items) > 0)
                            @foreach($ord->items as $item)
                                {{ $item->product_name }} (Size: {{ $item->size }}) (qty: {{ $item->quantity }})<br>
                            @endforeach
                        @else
                            No items found
                        @endif
                    </td>

                    <!-- Safeguard against null items array -->
                    <td>{{ $ord->items ? $ord->items->sum('quantity') : 0 }}</td>
                    <td>{{ $ord->shipping_cost }}</td>
                    <td>{{ $ord->total_amount }}</td>
                    <td>{{ $ord->total_amount + $ord->shipping_cost }}</td>
                    <td>{{ $ord->phone }}</td>
                    <td>{{ $ord->created_at->format('Y-m-d') }}</td>
                    <td>{{ $ord->status }}</td>
                    <td>{{ $ord->payment_method }}</td>

                    <!-- Payment SS and Transaction SMS -->
                    <td>
                        @if($ord->payment_method === 'ot' && $ord->payment_ss)
                            @php
                                $paymentImages = json_decode($ord->payment_ss); // Assuming payment_ss is stored as JSON
                            @endphp
                            @if(is_array($paymentImages))
                                @foreach($paymentImages as $image)
                                    <div>
                                        <a href="{{ asset('storage/app/public/paymentsnapshots/' . $image) }}" target="_blank">
                                            <img src="{{ asset('storage/app/public/paymentsnapshots/' . $image) }}" alt="Payment Screenshot" style="max-width: 100px; max-height: 100px; margin: 5px;">
                                        </a>
                                        <a href="{{ asset('storage/app/public/paymentsnapshots/' . $image) }}" download class="btn btn-sm btn-secondary">Download</a>
                                    </div>
                                @endforeach
                            @else
                                <p>No payment snapshots available</p>
                            @endif
                        @else
                            N/A
                        @endif
                    </td>
                    {{-- <td>
                        @if($ord->payment_method === 'Online Transaction (OT)' && $ord->transaction_sms)
                            <p>{{ $ord->transaction_sms }}</p>
                        @else
                            N/A
                        @endif
                    </td> --}}

                    <!-- Actions for Accept and Delete -->
                    <td>
                        @if($ord->status == 'pending')
                            <form action="{{ route('admin.orders.accept', $ord->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.orders.delete', $ord->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{-- <div id="pagination">
        {{ $orders->links() }}
    </div> --}}
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection
