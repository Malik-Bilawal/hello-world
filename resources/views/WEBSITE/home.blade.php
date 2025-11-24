@extends('WEBSITE.Components')

@section('web-components')
<title>Website Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            font-family: 'Playfair Display', serif;
            color: var(--dark-color);
            overflow-x: hidden;
        }
        
        /* Banner Section */
        .banner-section {
            margin-bottom: 3rem;
        }
        
        .carousel-item {
            position: relative;
            transition: transform 0.7s ease-in-out;
        }
        
        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 500px;
        }
        
        @media (min-width: 768px) {
            .carousel-item img {
                height: 600px;
            }
        }
        
        @media (min-width: 992px) {
            .carousel-item img {
                height: 700px;
            }
        }
        
        @media (min-width: 1200px) {
            .carousel-item img {
                height: 80vh;
            }
        }
        
        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
        }
        
        .carousel-caption {
            bottom: 20%;
            z-index: 20;
        }
        
        .carousel-caption h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        @media (max-width: 768px) {
            .carousel-caption h2 {
                font-size: 1.8rem;
            }
        }
        
        /* Scrolling Text */
        .slider {
            overflow: hidden;
            position: relative;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
            border-radius: 10px;
            padding: 15px 0;
            margin: 2rem 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .slider-track {
            display: flex;
            gap: 40px;
            white-space: nowrap;
            animation: scrollText 25s linear infinite;
        }
        
        .slides {
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        @keyframes scrollText {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* Section Headers */
        .heading-home {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 3rem 0;
            text-align: center;
        }
        
        .heading-home hr {
            flex: 1;
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--dark-color), transparent);
        }
        
        .heading-home h2 {
            margin: 0 20px;
            font-weight: 700;
            color: var(--dark-color);
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        /* Products Section */
        .product-section {
            padding: 0 15px;
        }
        
        .main-cart-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 4rem;
        }
        
        .cart-div {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            background: white;
        }
        
        .cart-div:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .cart-div a {
            text-decoration: none;
            color: inherit;
        }
        
        .cart-img-div {
            position: relative;
            overflow: hidden;
            height: 300px;
        }
        
        .cart-img-div img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease;
        }
        
        .cart-img-div .secondary {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }
        
        .cart-img-div:hover .primary {
            opacity: 0;
        }
        
        .cart-img-div:hover .secondary {
            opacity: 1;
        }
        
        .quick-span {
            position: absolute;
            bottom: 15px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .cart-img-div:hover .quick-span {
            opacity: 1;
        }
        
        .quick-view {
            background: rgba(255,255,255,0.9);
            border: none;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 600;
            color: var(--dark-color);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .quick-view:hover {
            background: white;
            transform: scale(1.05);
        }
        
        .cart-name {
            padding: 15px;
            text-align: center;
        }
        
        .cart-name h3 {
            font-size: 1.2rem;
            margin: 0;
            font-weight: 600;
        }
        
        .cart-price {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 0 15px 15px;
        }
        
        .before-price {
            text-decoration: line-through;
            color: var(--gray-color);
        }
        
        .after-price {
            font-weight: 700;
            color: var(--accent-color);
        }
        
        /* Deals Section */
        .more-deals-packs {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 4rem 0;
            margin-top: 2rem;
        }
        
        .deals-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .deals-header h1 {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .deals-header p {
            color: var(--gray-color);
            font-size: 1.1rem;
            margin-bottom: 25px;
        }
        
        .shop-now {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .shop-now:hover {
            background: #e0005e;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255,0,110,0.3);
            color: white;
        }
        
        .deals-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 0 15px;
        }
        
        .deal {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            height: 400px;
        }
        
        .deal:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .del-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.4s ease;
            padding: 20px;
            text-align: center;
        }
        
        .deal:hover .overlay {
            opacity: 1;
        }
        
        .overlay p {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .overlay .percent {
            color: var(--accent-color);
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0;
        }
        
        .shop-this {
            background: white;
            color: var(--dark-color);
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 15px;
            transition: all 0.3s ease;
        }
        
        .shop-this:hover {
            background: var(--accent-color);
            color: white;
            transform: scale(1.05);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-cart-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .deals-container {
                grid-template-columns: 1fr;
            }
            
            .cart-img-div {
                height: 250px;
            }
        }
        
        @media (max-width: 576px) {
            .main-cart-container {
                grid-template-columns: 1fr;
            }
            
            .heading-home h2 {
                font-size: 1.5rem;
            }
            
            .carousel-caption h2 {
                font-size: 1.5rem;
            }
        }
        
        /* Animation for text */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 1s forwards;
        }
    </style>


    <!-- Banner Section -->
    <section class="banner-section">
        @if ($banners && count($banners) > 0)
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($banners as $index => $banner)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            
            <!-- Slides -->
            <div class="carousel-inner">
                @foreach ($banners as $index => $banner)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/app/public/bannerassets/' . $banner->bannerimage) }}" 
                         class="d-block w-100" alt="{{ $banner->title ?? 'Banner Image' }}">
                    <div class="carousel-caption">
                        <h2 class="animate-fadeIn">{{ $banner->title ?? 'Your Banner Title Here' }}</h2>
                        @if ($banner->subtitle)
                        <p class="animate-fadeIn">{{ $banner->subtitle }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        @else
        <div class="alert alert-info text-center" role="alert">
            No banners available at the moment.
        </div>
        @endif
        
        <!-- Scrolling Text -->
        <div class="slider">
            <div class="slider-track">
                <div class="slides">Welcome to Our Website</div>
                <div class="slides">Get the Best Deals Here</div>
                <div class="slides">Contact Us for More Information</div>
                <div class="slides">Quality Products Guaranteed</div>
                <div class="slides">Welcome to Our Website</div>
                <div class="slides">Get the Best Deals Here</div>
                <div class="slides">Contact Us for More Information</div>
                <div class="slides">Quality Products Guaranteed</div>
            </div>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <div class="heading-home">
        <hr>
        <h2>NEW ARRIVAL</h2>
        <hr>
    </div>
    
    <section class="container product-section">
        @if ($products && count($products) > 0)
        <div class="main-cart-container">
            @foreach ($products as $pro)
            <div class="cart-div">
                <a href="/productdetail-page/{{ $pro->id }}">
                    <div class="cart-img-div">
                        @php
                            $primaryImage = $pro->product_images[0] ?? null;
                            $secondaryImage = $pro->product_images[1] ?? $primaryImage;
                        @endphp

                        @if ($primaryImage)
                            <img class="img-fluid primary" src="{{ asset('storage/app/public/productassets/' . $primaryImage) }}" alt="{{ $pro->product_name }}">
                            <img class="img-fluid secondary" src="{{ asset('storage/app/public/productassets/' . $secondaryImage) }}" alt="{{ $pro->product_name }}">
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                                <p class="text-muted">No image available</p>
                            </div>
                        @endif

                        <span class="quick-span">
                            <button class="quick-view">QUICK VIEW</button>
                        </span>
                    </div>

                    <div class="cart-name">
                        <h3>{{ $pro->product_name }}</h3>
                    </div>
                    <div class="cart-price">
                        @if ($pro->product_discount_price && $pro->product_discount_price < $pro->product_price)
                            <span class="before-price">${{ $pro->product_price }}</span>
                            <span class="after-price">${{ $pro->product_discount_price }}</span>
                        @else
                            <span class="after-price">${{ $pro->product_price }}</span>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info text-center" role="alert">
            No products available at the moment.
        </div>
        @endif
    </section>

    <!-- Deals & Packs Section -->
    <section class="more-deals-packs">
        <div class="deals-header">
            <h1>MORE DEALS & PACKS</h1>
            <p>Special Offers on T-Shirt Packs</p>
            <a href="/deals-packs" class="shop-now">SHOP NOW</a>
        </div>
        
        @if ($deals && count($deals) > 0)
        <div class="deals-container">
            @foreach ($deals as $deal)
            <div class="deal" onmouseover="showPercent(this)">
                @if (!empty($deal->deal_images) && is_array($deal->deal_images) && count($deal->deal_images) > 0)
                    <img class="del-img" src="{{ asset('storage/app/public/dealassets/' . $deal->deal_images[0]) }}" 
                         alt="{{ $deal->deal_name }}">
                @else
                    <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                        <p class="text-muted">No image available</p>
                    </div>
                @endif
                <div class="overlay">
                    <p>{{ $deal->deal_name }}</p>
                    <div class="price-info" style="display: none">
                        <span class="org-price">{{ $deal->deal_price }}</span>
                        <span class="discount-price">{{ $deal->deal_discount_price }}</span>
                    </div>
                    <h2 class="percent">% OFF</h2>
                    <a href="/dealdetail-page/{{ $deal->id }}" class="shop-this">SHOP THIS</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info text-center mx-3" role="alert">
            No deals available at the moment.
        </div>
        @endif
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Calculate and display discount percentage for deals
        function showPercent(element) {
            const priceInfo = element.querySelector('.price-info');
            const orgPrice = parseFloat(priceInfo.querySelector('.org-price').textContent);
            const discountPrice = parseFloat(priceInfo.querySelector('.discount-price').textContent);
            const percentElement = element.querySelector('.percent');
            
            if (orgPrice && discountPrice && orgPrice > discountPrice) {
                const percent = Math.round(((orgPrice - discountPrice) / orgPrice) * 100);
                percentElement.textContent = `${percent}% OFF`;
            }
        }
        
        // Initialize all deals on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.deal').forEach(deal => {
                showPercent(deal);
            });
            
            // Image hover effect for products
            document.querySelectorAll('.cart-img-div').forEach(container => {
                let primaryImage = container.querySelector('.primary');
                let secondaryImage = container.querySelector('.secondary');
                
                if (primaryImage && secondaryImage) {
                    container.addEventListener('mouseenter', function() {
                        primaryImage.style.opacity = '0';
                        secondaryImage.style.opacity = '1';
                    });
                    
                    container.addEventListener('mouseleave', function() {
                        primaryImage.style.opacity = '1';
                        secondaryImage.style.opacity = '0';
                    });
                }
            });
        });
    </script>
@endsection