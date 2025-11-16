@extends('WEBSITE.Components')

@section('web-components')

<link rel="stylesheet" href="{{ asset('css/WEBSITE/product-detail.css') }}">
<link href="https://example.com/fonts/FS-Siena.css" rel="stylesheet">
<section class="container-fluid main-section col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12">

    <div class="col-lg-5 col-xl-5 col-xxl-5 col-md-5 col-12 col-sm-12 product-sliderdiv">
        <div id="dealCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                @if (!empty($deal->deal_images) && is_array($deal->deal_images))
                    @foreach ($deal->deal_images as $index => $image)
                        <button type="button" data-bs-target="#dealCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                @endif
            </div>

            <div class="carousel-inner">
                @if (!empty($deal->deal_images) && is_array($deal->deal_images))
                    @foreach ($deal->deal_images as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img class="d-block w-100 img-fluid" src="{{ asset('storage/app/public/dealassets/' . $image) }}" alt="{{ $deal->deal_name }}">
                        </div>
                    @endforeach
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>

        <div class="container product-multipics">
            @foreach ($deal->deal_images as $image)
                <img class="img-fluid thumbnail" src="{{ asset('storage/app/public/dealassets/' . $image) }}" alt="{{ $deal->deal_name }}" width="100">
            @endforeach
        </div>
    </div>

    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6 col-12 col-sm-12 product-txtdiv">
        <h1>{{ $deal->deal_name }}</h1>

        <!-- Pricing -->
        <span class="span-price">
            <h5 class="pricing-div bf">{{ $deal->deal_price }}</h5>
            <h5 class="pricing-div af">Rs.{{ $deal->deal_discount_price }} PKR</h5>
        </span>

        <h6 class="shipping">Shipping Calculated at checkout</h6>

        <!-- Form for Adding to Cart -->
        <form id="addToCartForm" action="{{ url('add-to-cart/deal/' . $deal->id) }}" method="POST">
            @csrf
            <div class="sizing-detail-section">
                <div class="size-buttons-div">
                    <h5>AVAILABLE SIZE</h5>
                    <div class="selection">
                        <select name="size" required>
                            @if (!empty($availableSizes))
                                @foreach ($availableSizes as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            @else
                                <option value="">No sizes available</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <!-- "Buy Now" and "Add to Cart" Buttons -->
            <div class="selling-button">
                <button type="button" id="directbuy">BUY NOW</button>
            </div>
            <div class="selling-button">
                <button type="button" id="buybutton">ADD TO CART</button>
            </div>

            <!-- Popup message -->
            <div id="dealCartPopup" class="cart-popup">
                <p>Deal added to cart!! <a href="/cart">View Cart</a></p>
            </div>
        </form>

        <!-- Size Chart Section -->
        <label for="state">
            <div class="button">SIZING CHART<i class="fa-solid fa-arrow-up"></i></div>
        </label>
        <input type="checkbox" id="state" hidden>
        <div class="content">
            <div class="inner">
                <img src="{{ asset($sizeChartImage) }}" alt="Size Chart" id="sizechart">
            </div>
        </div>

        <!-- Description Section -->
        <label for="state2">
            <div class="button">DESCRIPTION<i class="fa-solid fa-arrow-up"></i></div>
        </label>
        <input type="checkbox" id="state2" hidden>
        <div class="content2">
            <div class="inner">
                <p>{{ $deal->deal_description }}</p>
            </div>
        </div>
    </div>

</section>


<script>
    // Thumbnails Click Event for Carousel
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', function() {
            const dealCarousel = new bootstrap.Carousel(document.getElementById('dealCarousel'));
            dealCarousel.to(index);
        });
    });

    // Add to Cart Popup for "Add to Cart" button
    document.getElementById('buybutton').addEventListener('click', function() {
        var form = document.getElementById('addToCartForm');
        var dealPopup = document.getElementById('dealCartPopup');
        dealPopup.classList.add('show');

        setTimeout(() => {
            form.submit();
        }, 1000);

        setTimeout(function() {
            dealPopup.classList.remove('show');
        }, 5000);
    });

    // Direct Buy Now functionality
    document.getElementById('directbuy').addEventListener('click', function() {
        var form = document.getElementById('addToCartForm');
        var formData = new FormData(form);
        formData.append('buy_now', true); // Add the buy_now parameter

        // AJAX to add the deal to cart and redirect to payment
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Deal added to cart!");
                // Redirect to payment
                window.location.href = data.redirect; // Redirect based on the returned redirect URL
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("There was an error adding the deal to the cart.");
        });
    });
</script>


@endsection
