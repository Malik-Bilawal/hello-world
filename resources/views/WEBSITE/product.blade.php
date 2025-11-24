@extends('WEBSITE.Components')

@section('web-components')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .header-container {
            background: var(--primary);
            color: white;
            padding: 120px 20px 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .header-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwMCAxMDAwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0wIDBoMTAwdjEwMEgwVjB6IiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4=');
            opacity: 0.2;
        }

        .header-container h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .header-container p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .cate-btnsdiv {
            padding: 20px;
            position: relative;
        }

        .filter-icon-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px 20px;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .filter-toggle-btn {
            background: var(--white);
            border: 2px solid var(--primary);
            padding: 12px 24px;
            border-radius: var(--border-radius);
            font-weight: 600;
            color: var(--primary);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .filter-toggle-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            transition: var(--transition);
            z-index: -1;
        }

        .filter-toggle-btn:hover::before {
            left: 0;
        }

        .filter-toggle-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: var(--white);
        }

        .active-filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .active-filter {
            background: var(--gradient);
            color: white;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--shadow);
        }

        .active-filter .remove-filter {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            transition: var(--transition);
        }

        .active-filter .remove-filter:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .filter-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 380px;
            height: 100vh;
            background: var(--white);
            box-shadow: -5px 0 25px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: var(--transition);
            overflow-y: auto;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .filter-sidebar.open {
            right: 0;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px;
            border-bottom: 1px solid var(--gray-light);
            background: var(--gradient);
            color: white;
        }

        .filter-header h3 {
            font-size: 1.5rem;
            margin: 0;
            font-weight: 700;
        }

        .close-filter-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            transition: var(--transition);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-filter-btn:hover {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.1);
        }

        .filter-container {
            padding: 25px;
            flex: 1;
        }

        .filter-section {
            margin-bottom: 30px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            background: var(--white);
        }

        .filter-section-header {
            padding: 18px 20px;
            background: var(--dark-light);
            color: var(--white);
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-section-header:hover {
            background: var(--dark);
        }

        .filter-section-content {
            padding: 20px;
            background: var(--white);
            display: none;
        }

        .filter-section.active .filter-section-content {
            display: block;
        }

        .filter-btn {
            background: var(--gray-light);
            border: none;
            padding: 10px 18px;
            border-radius: var(--border-radius);
            margin: 0 8px 10px 0;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            transition: var(--transition);
            z-index: -1;
        }

        .filter-btn:hover::before {
            left: 0;
        }

        .filter-btn:hover {
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .filter-btn.active {
            background: var(--gradient);
            color: var(--white);
            box-shadow: var(--shadow);
        }

        #price-range {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--gray-light);
            border-radius: var(--border-radius);
            font-size: 1rem;
            background-color: var(--light);
            transition: var(--transition);
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%237c3aed' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }

        #price-range:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
        }

        .alphabet-filter button {
            background: var(--gray-light);
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            margin-right: 10px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .alphabet-filter button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            transition: var(--transition);
            z-index: -1;
        }

        .alphabet-filter button:hover::before {
            left: 0;
        }

        .alphabet-filter button:hover {
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .alphabet-filter button.active {
            background: var(--gradient);
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .filter-actions {
            padding: 20px;
            border-top: 1px solid var(--gray-light);
            display: flex;
            gap: 10px;
        }

        .apply-filters, .reset-filters {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .apply-filters {
            background: var(--gradient);
            color: var(--white);
        }

        .apply-filters:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .reset-filters {
            background: var(--gray-light);
            color: var(--dark);
        }

        .reset-filters:hover {
            background: var(--gray);
            color: var(--white);
        }

        .product-section {
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .category-container {
            margin-bottom: 80px;
            opacity: 1;
            transition: var(--transition-slow);
            position: relative;
        }

        .category-title {
            font-size: 2.2rem;
            margin-bottom: 40px;
            color: var(--dark);
            position: relative;
            padding-bottom: 15px;
            text-align: center;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .category-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }

        .main-cart-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .cart-div {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .cart-div:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .cart-div a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .cart-img-div {
            position: relative;
            overflow: hidden;
            height: 280px;
            flex-shrink: 0;
        }

        .cart-img-div img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-slow);
        }

        .cart-img-div .primary {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 1;
        }

        .cart-img-div .secondary {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .cart-div:hover .primary {
            opacity: 0;
        }

        .cart-div:hover .secondary {
            opacity: 1;
        }

        .quick-span {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            opacity: 0;
            transition: var(--transition);
            width: 80%;
            z-index: 2;
        }

        .cart-div:hover .quick-span {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        .quick-view {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: none;
            padding: 12px 20px;
            border-radius: 50px;
            width: 100%;
            font-weight: 600;
            color: var(--primary);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .quick-view:hover {
            background: white;
            color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .cart-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .cart-name {
            margin-bottom: 10px;
        }

        .cart-name h3 {
            font-size: 1.3rem;
            margin: 0;
            color: var(--dark);
            transition: var(--transition);
            font-weight: 600;
            line-height: 1.4;
        }

        .cart-div:hover .cart-name h3 {
            color: var(--primary);
        }

        .cart-description {
            color: var(--gray);
            font-size: 0.95rem;
            margin-bottom: 15px;
            flex: 1;
        }

        .cart-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
        }

        .before-price {
            text-decoration: line-through;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .after-price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.3rem;
        }

        .cart-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--gradient);
            color: white;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: var(--shadow);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            backdrop-filter: blur(5px);
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .no-products {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 40px;
            color: var(--gray);
            font-size: 1.2rem;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .no-products i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--gray-light);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 10%;
            animation-delay: -5s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 30%;
            right: 10%;
            animation-delay: -10s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 70%;
            right: 5%;
            animation-delay: -15s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(20px, 20px) rotate(90deg);
            }
            50% {
                transform: translate(0, 40px) rotate(180deg);
            }
            75% {
                transform: translate(-20px, 20px) rotate(270deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        .quick-view-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            width: 90%;
            max-width: 1000px;
            background: var(--white);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-xl);
            z-index: 1001;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            display: flex;
            max-height: 90vh;
            overflow: hidden;
        }

        .quick-view-modal.active {
            opacity: 1;
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
        }

        .modal-image {
            flex: 1;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .modal-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: var(--border-radius);
        }

        .modal-content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gray-light);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            z-index: 2;
        }

        .modal-close:hover {
            background: var(--gray);
            color: var(--white);
        }

        .modal-title {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--dark);
            font-weight: 700;
        }

        .modal-price {
            font-size: 1.5rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 20px;
        }

        .modal-description {
            color: var(--gray);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .add-to-cart, .view-details {
            padding: 12px 24px;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            flex: 1;
        }

        .add-to-cart {
            background: var(--gradient);
            color: var(--white);
        }

        .add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .view-details {
            background: var(--gray-light);
            color: var(--dark);
        }

        .view-details:hover {
            background: var(--gray);
            color: var(--white);
        }

        @media (max-width: 1200px) {
            .main-cart-container {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .main-cart-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .header-container h1 {
                font-size: 2.8rem;
            }

            .quick-view-modal {
                flex-direction: column;
                max-height: 95vh;
            }

            .modal-image {
                flex: none;
                height: 300px;
            }

            .modal-content {
                flex: none;
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .filter-sidebar {
                width: 320px;
                right: -320px;
            }
            
            .main-cart-container {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            }
            
            .header-container {
                padding: 100px 20px 60px;
            }

            .filter-icon-container {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .active-filters {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .filter-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .main-cart-container {
                grid-template-columns: 1fr;
            }
            
            .header-container h1 {
                font-size: 2.2rem;
            }
            
            .category-title {
                font-size: 1.8rem;
            }

            .quick-view-modal {
                width: 95%;
            }
        }

        /* Animation for category containers */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .category-container {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>

    <div class="header-container">
        <h1>OUR PRODUCTS</h1>
        <p>Discover our premium collection with advanced filtering options</p>
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <div class="container-fluid cate-btnsdiv">
        <div class="filter-icon-container">
            <button class="filter-toggle-btn">
                <i class="fa-solid fa-sliders"></i> Filters
                <span class="filter-count" id="filter-count">0</span>
            </button>
            <div class="active-filters" id="active-filters">
                <!-- Active filters will be displayed here -->
            </div>
        </div>

        <div class="filter-sidebar" id="filter-sidebar">
            <div class="filter-header">
                <h3>Filter Options</h3>
                <button class="close-filter-btn">&times;</button>
            </div>

            <div class="filter-container">
                <div class="filter-section">
                    <div class="filter-section-header">
                        <span>Filter by Category</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-section-content">
                        @foreach ($categories as $cat)
                            <button class="filter-btn" data-filter-type="category" data-value="{{ $cat->id }}">{{ $cat->category_name }}</button>
                        @endforeach
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-section-header">
                        <span>Filter by Price</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-section-content">
                        <select id="price-range">
                            <option value="all">All Prices</option>
                            <option value="0-1000">0 - 1000</option>
                            <option value="1000-5000">1000 - 5000</option>
                            <option value="5000-10000">5000 - 10000</option>
                            <option value="10000-20000">10000 - 20000</option>
                            <option value="20000+">20000+</option>
                        </select>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-section-header">
                        <span>Sort Alphabetically</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-section-content alphabet-filter">
                        <button id="sort-asc" data-filter-type="sort" data-value="asc">A-Z</button>
                        <button id="sort-desc" data-filter-type="sort" data-value="desc">Z-A</button>
                    </div>
                </div>
            </div>

            <div class="filter-actions">
                <button class="apply-filters" id="apply-filters">Apply Filters</button>
                <button class="reset-filters" id="reset-filters">Reset All</button>
            </div>
        </div>
        
        <div class="overlay" id="overlay"></div>
    </div>

    <section class="container product-section" id="product-list">
        @foreach ($categories as $cat)
            <div class="category-container" data-category="{{ $cat->id }}">
                <h2 class="category-title">
                    <span class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-clip-text text-transparent animate-gradient-x">
                        {{ $cat->category_name }}
                    </span>
                </h2>
                <div class="main-cart-container">
                    @foreach ($products->where('category_id', $cat->id) as $pro)
                        <div class="cart-div" data-price="{{ $pro->product_price }}" data-name="{{ $pro->product_name }}" data-category="{{ $cat->id }}">
                            @if($pro->product_discount_price < $pro->product_price)
                                <div class="cart-badge">SALE</div>
                            @endif
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
                                        <p>No image available</p>
                                    @endif

                                    <span class="quick-span">
                                        <button class="quick-view">QUICK VIEW</button>
                                    </span>
                                </div>
                                <div class="cart-content">
                                    <div class="cart-name">
                                        <h3>{{ $pro->product_name }}</h3>
                                    </div>
                                    <div class="cart-description">
                                        {{ Str::limit($pro->product_description ?? 'No description available', 100) }}
                                    </div>
                                    <div class="cart-price">
                                        @if($pro->product_discount_price < $pro->product_price)
                                            <span class="before-price">${{ $pro->product_price }}</span>
                                        @endif
                                        <span class="after-price">${{ $pro->product_discount_price }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterSidebar = document.getElementById('filter-sidebar');
            const filterToggleBtn = document.querySelector('.filter-toggle-btn');
            const closeFilterBtn = document.querySelector('.close-filter-btn');
            const overlay = document.getElementById('overlay');
            const applyFiltersBtn = document.getElementById('apply-filters');
            const resetFiltersBtn = document.getElementById('reset-filters');
            const filterSections = document.querySelectorAll('.filter-section');
            const modalClose = document.getElementById('modal-close');
            const modalViewDetails = document.getElementById('modal-view-details');
            const activeFiltersContainer = document.getElementById('active-filters');
            const filterCount = document.getElementById('filter-count');

            // Current active filters
            let activeFilters = {
                category: null,
                price: 'all',
                sort: null
            };

            // Toggle filter sidebar
            filterToggleBtn.addEventListener('click', () => {
                filterSidebar.classList.add('open');
                overlay.classList.add('active');
            });

            closeFilterBtn.addEventListener('click', () => {
                filterSidebar.classList.remove('open');
                overlay.classList.remove('active');
            });

            overlay.addEventListener('click', () => {
                filterSidebar.classList.remove('open');
                overlay.classList.remove('active');
            });

            // Toggle filter sections
            filterSections.forEach(section => {
                const header = section.querySelector('.filter-section-header');
                header.addEventListener('click', () => {
                    section.classList.toggle('active');
                });
            });

            // Category filter buttons
            document.querySelectorAll('.filter-btn[data-filter-type="category"]').forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all category buttons
                    document.querySelectorAll('.filter-btn[data-filter-type="category"]').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Store the selected category
                    activeFilters.category = this.getAttribute('data-value');
                });
            });

            // Price filter
            document.getElementById('price-range').addEventListener('change', function() {
                activeFilters.price = this.value;
            });

            // Sort buttons
            document.querySelectorAll('.alphabet-filter button').forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all sort buttons
                    document.querySelectorAll('.alphabet-filter button').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Store the selected sort
                    activeFilters.sort = this.getAttribute('data-value');
                });
            });

            // Apply filters
            applyFiltersBtn.addEventListener('click', () => {
                applyFilters();
                updateActiveFiltersDisplay();
                filterSidebar.classList.remove('open');
                overlay.classList.remove('active');
            });

            // Reset filters
            resetFiltersBtn.addEventListener('click', () => {
                resetFilters();
                updateActiveFiltersDisplay();
            });





            // Apply filters function
            function applyFilters() {
                const { category, price, sort } = activeFilters;
                
                // Filter by category
                if (category) {
                    document.querySelectorAll('.category-container').forEach(container => {
                        if (container.getAttribute('data-category') === category) {
                            container.style.display = 'block';
                            // Trigger animation
                            container.style.animation = 'none';
                            setTimeout(() => {
                                container.style.animation = 'fadeInUp 0.6s ease-out forwards';
                            }, 10);
                        } else {
                            container.style.display = 'none';
                        }
                    });
                } else {
                    document.querySelectorAll('.category-container').forEach(container => {
                        container.style.display = 'block';
                        // Trigger animation
                        container.style.animation = 'none';
                        setTimeout(() => {
                            container.style.animation = 'fadeInUp 0.6s ease-out forwards';
                        }, 10);
                    });
                }
                
                // Filter by price
                document.querySelectorAll('.cart-div').forEach(div => {
                    const productPrice = Number(div.getAttribute('data-price'));
                    let shouldShow = true;
                    
                    if (price !== 'all') {
                        if (price.includes('+')) {
                            const minPrice = parseInt(price.replace('+', ''));
                            shouldShow = productPrice >= minPrice;
                        } else {
                            const [min, max] = price.split('-').map(Number);
                            shouldShow = productPrice >= min && productPrice <= max;
                        }
                    }
                    
                    if (shouldShow) {
                        div.style.display = 'block';
                        setTimeout(() => {
                            div.style.opacity = '1';
                        }, 10);
                    } else {
                        div.style.opacity = '0';
                        setTimeout(() => {
                            div.style.display = 'none';
                        }, 300);
                    }
                });
                
                // Sort products
                if (sort) {
                    document.querySelectorAll('.main-cart-container').forEach(container => {
                        const cards = Array.from(container.children);
                        cards.sort((a, b) => {
                            const nameA = a.dataset.name.toLowerCase();
                            const nameB = b.dataset.name.toLowerCase();
                            return sort === 'asc' ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
                        });
                        
                        // Animate the sorting
                        cards.forEach((card, index) => {
                            setTimeout(() => {
                                container.appendChild(card);
                            }, index * 50);
                        });
                    });
                }
            }

            // Reset filters function
            function resetFilters() {
                // Reset active filters
                activeFilters = {
                    category: null,
                    price: 'all',
                    sort: null
                };
                
                // Reset UI elements
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                document.querySelectorAll('.alphabet-filter button').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                document.getElementById('price-range').value = 'all';
                
                // Show all products
                document.querySelectorAll('.category-container').forEach(container => {
                    container.style.display = 'block';
                    // Trigger animation
                    container.style.animation = 'none';
                    setTimeout(() => {
                        container.style.animation = 'fadeInUp 0.6s ease-out forwards';
                    }, 10);
                });
                
                document.querySelectorAll('.cart-div').forEach(div => {
                    div.style.display = 'block';
                    setTimeout(() => {
                        div.style.opacity = '1';
                    }, 10);
                });
            }

            // Update active filters display
            function updateActiveFiltersDisplay() {
                // Clear current active filters
                activeFiltersContainer.innerHTML = '';
                let count = 0;
                
                // Add category filter if active
                if (activeFilters.category) {
                    const categoryName = document.querySelector(`.filter-btn[data-value="${activeFilters.category}"]`).textContent;
                    const filterElement = document.createElement('div');
                    filterElement.className = 'active-filter';
                    filterElement.innerHTML = `
                        ${categoryName}
                        <button class="remove-filter" data-filter-type="category">&times;</button>
                    `;
                    activeFiltersContainer.appendChild(filterElement);
                    count++;
                }
                
                // Add price filter if active
                if (activeFilters.price !== 'all') {
                    const priceText = document.getElementById('price-range').options[document.getElementById('price-range').selectedIndex].text;
                    const filterElement = document.createElement('div');
                    filterElement.className = 'active-filter';
                    filterElement.innerHTML = `
                        Price: ${priceText}
                        <button class="remove-filter" data-filter-type="price">&times;</button>
                    `;
                    activeFiltersContainer.appendChild(filterElement);
                    count++;
                }
                
                // Add sort filter if active
                if (activeFilters.sort) {
                    const sortText = activeFilters.sort === 'asc' ? 'A-Z' : 'Z-A';
                    const filterElement = document.createElement('div');
                    filterElement.className = 'active-filter';
                    filterElement.innerHTML = `
                        Sort: ${sortText}
                        <button class="remove-filter" data-filter-type="sort">&times;</button>
                    `;
                    activeFiltersContainer.appendChild(filterElement);
                    count++;
                }
                
                // Update filter count
                filterCount.textContent = count;
                
                // Add event listeners to remove buttons
                document.querySelectorAll('.remove-filter').forEach(button => {
                    button.addEventListener('click', function() {
                        const filterType = this.getAttribute('data-filter-type');
                        removeFilter(filterType);
                    });
                });
            }

            // Remove specific filter
            function removeFilter(filterType) {
                if (filterType === 'category') {
                    activeFilters.category = null;
                    document.querySelectorAll('.filter-btn[data-filter-type="category"]').forEach(btn => {
                        btn.classList.remove('active');
                    });
                } else if (filterType === 'price') {
                    activeFilters.price = 'all';
                    document.getElementById('price-range').value = 'all';
                } else if (filterType === 'sort') {
                    activeFilters.sort = null;
                    document.querySelectorAll('.alphabet-filter button').forEach(btn => {
                        btn.classList.remove('active');
                    });
                }
                
                applyFilters();
                updateActiveFiltersDisplay();
            }



            // Initialize
            updateActiveFiltersDisplay();
        });
    </script>
@endsection