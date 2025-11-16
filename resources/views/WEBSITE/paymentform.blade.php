@extends('WEBSITE.Components')

@section('web-components')
<link rel="stylesheet" href="css/WEBSITE/checkout.css">
<link rel="stylesheet" href="styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Century+Gothic:wght@400;600&display=swap" rel="stylesheet">

{{-- @if (auth()->user()) --}}
    <title>Checkout</title>
    <div class="checkout-container">

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="checkoutForm" action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-section row">
            <h2 id="contacthd">Contact</h2>
            <input type="email" name="email" placeholder="Email" value="{{ $user->email ?? 'user' }}"">

            <h2 id="delivery">Delivery</h2>
            <div class="row">
                <input type="text" name="first_name" placeholder="First name"  value="{{ $user->name ?? 'user' }}">
                <input type="text" name="last_name" placeholder="Last name" required>
            </div>
            <div class="row">
                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="apartment" placeholder="Apartment, suite, etc." required>
            </div>
            <div class="row">
                <input type="text" name="city" placeholder="City" required>
                <input type="text" name="postal_code" placeholder="Postal code" required>
            </div>
            <input type="tel" name="phone" placeholder="Phone" required>

          <!-- Payment method radio buttons -->
<h2>Payment method</h2>
<div class="payment-methods">
    <div class="radio-group">
        <input type="radio" name="payment_method" id="cod" value="cod" checked>
        <label for="cod">Cash on Delivery (COD)</label>
    </div>
    <div class="radio-group">
        <input type="radio" name="payment_method" id="ot" value="ot">
        <label for="ot">Online Transaction (OT)</label>
    </div>
</div>

<!-- Payment snapshot field (hidden by default) -->


<div id="paymentSnapshotField" style="display: none;">
    
    <div class="online-account-detial">
  <span>
       <h1>MEEZAN BANK</h1>     
       <h5>ACC-TITLE: MUHAMMAD SHAFI UZ ZAMAN ABID</h5>
       <h4>ACC-NO: 99840110367378</h4>
  </span>   
  <span> 
   <h1>JAZZCASH ACCOUNT DETAIL</h1>     
       <h5>ACC-TITLE: MUHAMMAD SHAFI UZ ZAMAN</h5>
       <h4>ACC-NO: 03282758673</h4>
  </span>
</div>

    <label for="payment_ss">Upload Payment Snapshot (1-3 images)</label>
    <input type="file" name="payment_ss[]" id="payment_ss" multiple  >
</div>



            <!-- Hidden field for total amount -->
            <input type="hidden" name="subtotal" value="{{ $subtotal }}">
<input type="hidden" name="discount" value="{{ $discount }}">
<input type="hidden" name="tax" value="{{ $tax }}">
<input type="hidden" name="delivery" value="{{ $delivery }}">
<input type="hidden" name="total_amount" value="{{ $totalAmount }}">

            <button class="complete-order" type="submit">Complete order</button>
        </div>
    </form>

    <!-- Popup confirmation message -->
    <div id="orderSuccessPopup" class="popup">
        <div class="popup-content">
            <div class="popup-message">
                <h3>Order placed successfully!</h3>
                <div class="animated-icon">

<lord-icon
    src="https://cdn.lordicon.com/oqdmuxru.json"
    trigger="loop"
    delay="3500"
    style="width:250px;height:250px">
</lord-icon>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission to show popup first
            document.getElementById('orderSuccessPopup').style.display = 'block';

            // Add timeout to mimic delay and then submit the form
            setTimeout(function(){
                event.target.submit(); // Submit the form after showing popup
            }, 2000); // 2 second delay
        });

    // Show or hide the payment snapshot field based on the selected payment method
    document.querySelectorAll('input[name="payment_method"]').forEach((input) => {
        input.addEventListener('change', function() {
            if (this.value === 'ot') {
                document.getElementById('paymentSnapshotField').style.display = 'block';
                document.getElementById('payment_ss').required = true;
            } else {
                document.getElementById('paymentSnapshotField').style.display = 'none';
                document.getElementById('payment_ss').required = false;
            }
        });
    });
</script>
 <script src="https://cdn.lordicon.com/lordicon.js"></script>

{{-- 
@else
<br><br>
<h3>plz login or sign-up</h3>
<br><a href="login" style="    text-decoration: none;
    color: white;
    background-color: black;
    /* height: 20px; */
    padding: 12px;
    border-radius: 20px;
    margin-left: 10px;
">Login</a> <a href="register" style="    text-decoration: none;
    color: white;
    background-color: black;
    /* height: 20px; */
    padding: 12px;
    border-radius: 20px;
    margin-left: 10px;
">Signup</a>

@endif --}}

@endsection
