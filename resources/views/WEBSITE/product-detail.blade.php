@extends('WEBSITE.Components')

@section('web-components')

    <link rel="stylesheet" href="{{ asset('css/WEBSITE/product-detail.css') }}">
    <link href="https://example.com/fonts/FS-Siena.css" rel="stylesheet">
    <section class="container-fluid main-section col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12">
        <div class="col-lg-5 col-xl-5 col-xxl-5 col-md-10 col-12 col-sm-12 product-sliderdiv">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    @if (!empty($product->product_images) && is_array($product->product_images))
                        @foreach ($product->product_images as $index => $image)
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"
                                aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    @endif
                </div>

                <div class="carousel-inner">
                    @if (!empty($product->product_images) && is_array($product->product_images))
                        @foreach ($product->product_images as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="d-block w-100 img-fluid"
                                    src="{{ asset('storage/app/public/productassets/' . $image) }}"
                                    alt="{{ $product->product_name }}">
                            </div>
                        @endforeach
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            </div>

            <div class="container product-multipics">
                @foreach ($product->product_images as $image)
                    <img class="img-fluid thumbnail" src="{{ asset('storage/app/public/productassets/' . $image) }}"
                        alt="{{ $product->product_name }}" width="100">
                @endforeach
            </div>
        </div>

        <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-10 col-12 col-sm-12 product-txtdiv">
            <h1>{{ $product->product_name }}</h1>
            <span class="span-price">
                <h5 class="pricing-div bf">{{ $product->product_price }}</h5>
                <h5 class="pricing-div af">Rs.{{ $product->product_discount_price }} PKR</h5>
            </span>

            <h6 class="shipping">Shipping Calculated at checkout</h6>

            <!-- Product Form for Adding to Cart -->
            <form id="addToCartForm" action="{{ url('add-to-cart/product/' . $product->id) }}" method="POST">
                @csrf
                <div class="sizing-detail-section" style="display: none;">
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

                <div class="selling-button">
                    <button type="button" id="directbuy">BUY NOW</button>
                </div>

                <div class="selling-button">
                    <button type="button" id="buybutton">ADD TO CART</button> <!-- Change to type="button" -->
                </div>

                <!-- Popup message -->
                <div id="cartPopup" class="cart-popup">
                    <p>Product added to cart!! </p>
                </div>
            </form>

            <!-- Size Chart Section -->
            {{-- <label for="state">
                <div class="button">SIZING CHART<i class="fa-solid fa-arrow-up"></i></div>
            </label>
            <input type="checkbox" id="state" hidden>
            <div class="content">
                <div class="inner">
                    <img src="{{ asset($sizeChartImage) }}" alt="Size Chart" id="sizechart">
                </div>
            </div> --}}

            <!-- Description Section -->
            <label for="state2">
                <div class="button">DESCRIPTION<i class="fa-solid fa-arrow-up"></i></div>
            </label>
            <input type="checkbox" id="state2" hidden>
            <div class="content2">
                <div class="inner">
                    <p>{{ $product->product_description }}</p>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        // Thumbnail click functionality
        const thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', function() {
                const productCarousel = new bootstrap.Carousel(document.getElementById('productCarousel'));
                productCarousel.to(index);
            });
        });

        // Popup for Product Add to Cart
        document.getElementById('buybutton').addEventListener('click', function() {
            var form = document.getElementById('addToCartForm');

            // Show the popup
            var popup = document.getElementById('cartPopup');
            popup.classList.add('show');

            // Submit the form to add product to cart
            setTimeout(() => {
                form.submit();
            }, 1000); // Adjust the delay as needed (1 second in this case)

            // Hide the popup after 3 seconds
            setTimeout(function() {
                popup.classList.remove('show');
            }, 5000);
        });



        //  Buy Now functionality
document.getElementById('directbuy').addEventListener('click', function() {
    var form = document.getElementById('addToCartForm');
    var formData = new FormData(form);
    formData.append('buy_now', true); // Added parameter to distinguish "Buy Now"

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
            if (data.redirect) {
                // Redirect to payment page
                window.location.href = data.redirect;
            } else {
                alert("Product added to cart!");
            }
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("There was an error adding the product to the cart.");
    });
});





    </script>

@endsection
