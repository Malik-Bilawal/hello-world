<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RangilaLace - Modern ECommerce Store</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/icon type">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* =================
          1. ROOT VARIABLES & GLOBAL RESETS
          =================
        */
        :root {
            --primary: #cea046;
            --primary-light: #e6c785;
            --primary-dark: #a1782f;
            --secondary: #ffffff;
            --accent: #f59e0b;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --white: #ffffff;

            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            --gradient-dark: linear-gradient(135deg, var(--dark) 0%, var(--dark-light) 100%);

            --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 
                         0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 
                         0 10px 10px -5px rgba(0, 0, 0, 0.04);

            --glow: 0 0 20px rgba(206, 160, 70, 0.4);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);

            --border-radius: 12px;
            --border-radius-lg: 20px;
        }

        /* Global Resets */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding-top: 80px; /* Account for fixed header */
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        button {
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border: none;
            background: none;
        }

        /* Utility Classes */
        .container {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .desktop-only {
            display: none;
        }
        .mobile-only {
            display: block;
        }

        @media (min-width: 992px) {
            .desktop-only {
                display: block;
            }
            .mobile-only {
                display: none;
            }
        }

        /* =================
          2. MODERN SITE HEADER
          =================
        */
        .site-header {
            position: fixed;
            top: 0;
            z-index: 1000;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .site-header.scrolled {
            box-shadow: var(--shadow-xl);
            background: rgba(255, 255, 255, 0.98);
        }

        /* Main Header */
        .header-main {
            padding: 0.75rem 0;
        }

        .main-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .header-logo {
            height: 48px;
            width: auto;
            cursor: pointer;
            border-radius: 10px;
            transition: var(--transition);
        }

        .header-logo:hover {
            transform: scale(1.05);
        }

        /* =========================
           NAVIGATION & DROPDOWNS
        ========================= */
        .main-navigation ul, .mobile-navigation ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* Desktop Navigation */
        .main-navigation ul {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .main-navigation li {
            position: relative;
        }

        .main-navigation a {
            display: block;
            padding: 0.5rem 0.75rem;
            color: var(--dark);
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease, background 0.3s ease;
        }

        .main-navigation a:hover {
            color: var(--primary);
        }

        /* Desktop Dropdown */
        .main-navigation .has-dropdown {
            position: relative;
        }

        .main-navigation .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-xl);
            min-width: 220px;
            padding: 0.5rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
            z-index: 1000;
            border: 1px solid var(--gray-light);
        }

        .main-navigation .has-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu li a {
            display: block;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 400;
            color: var(--gray);
            transition: var(--transition);
        }

        .dropdown-menu li a:hover {
            color: var(--primary);
            background: var(--light);
        }

        /* Header Actions */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .icon-button {
            font-size: 1.25rem;
            color: var(--dark);
            padding: 0.6rem;
            border-radius: 50%;
            transition: var(--transition);
            position: relative;
        }

        .icon-button:hover {
            color: var(--primary);
            background-color: rgba(206, 160, 70, 0.1);
        }

        .cart-icon {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 18px;
            height: 18px;
            background: var(--gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* Auth Buttons */
        .auth-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .auth-button {
            display: inline-block;
            padding: 0.6rem 1.25rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .auth-button.primary {
            background: var(--gradient);
            color: var(--white);
            box-shadow: 0 4px 10px rgba(206, 160, 70, 0.3);
        }

        .auth-button.primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--glow);
        }

        .auth-button.secondary {
            background-color: transparent;
            color: var(--primary);
            border-color: var(--primary);
        }

        .auth-button.secondary:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        .welcome-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .logout-form {
            display: inline;
        }

        .logout-button {
            color: var(--gray);
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .logout-button:hover {
            color: var(--primary);
        }

        @media (max-width: 991px) {
            .main-navigation {
                display: none;
            }
            .auth-container {
                display: none;
            }

            .main-header-content {
                height: auto;
            }

            .header-logo {
                height: 40px;
            }
        }

        /* =================
          3. MODERN MOBILE MENU (OFF-CANVAS)
          =================
        */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1001;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .mobile-menu-overlay.is-open {
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 320px;
            max-width: 85%;
            height: 100%;
            background-color: var(--white);
            z-index: 1002;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu.is-open {
            transform: translateX(0);
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            background: var(--gradient);
        }

        .mobile-menu-logo {
            height: 35px;
            width: auto;
            cursor: pointer;
            border-radius: 8px;
        }

        .mobile-menu-close {
            color: white;
            font-size: 1.5rem;
        }

        .mobile-menu-body {
            padding: 1.5rem;
            flex-grow: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .mobile-user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--gray-light);
            margin-bottom: 1.5rem;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }

        .mobile-logout-button {
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            background: rgba(206, 160, 70, 0.1);
        }

        .mobile-auth-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--gray-light);
            margin-bottom: 1.5rem;
        }

        .mobile-auth-buttons .auth-button {
            text-align: center;
            width: 100%;
        }

        .mobile-navigation {
            flex-grow: 1;
        }

        .mobile-navigation ul {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .mobile-navigation ul li a,
        .dropdown-toggle-mobile {
            display: block;
            padding: 1rem 0;
            font-weight: 500;
            color: var(--dark);
            font-size: 1.1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown-toggle-mobile {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown-toggle-mobile .dropdown-arrow {
            transition: var(--transition);
        }

        .has-dropdown-mobile.is-open .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Mobile Dropdown */
        .dropdown-menu-mobile {
            display: flex;
            flex-direction: column;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.4s ease, padding 0.3s ease;
        }

        .has-dropdown-mobile.is-open .dropdown-menu-mobile {
            max-height: 1000px;
            opacity: 1;
            padding: 0.5rem 0;
        }

        .dropdown-menu-mobile li a {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
        }

        .dropdown-menu-mobile li a:hover {
            background: var(--primary-light);
            color: var(--white);
            padding-left: 1.2rem;
        }

        .mobile-social-icons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-light);
        }

        .mobile-social-icons a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--light);
            color: var(--dark);
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .mobile-social-icons a:hover {
            background: var(--gradient);
            color: white;
            transform: translateY(-3px);
        }

        /* =================
          4. MODERN SITE FOOTER
          =================
        */
        .site-footer {
            background: var(--gradient-dark);
            color: var(--gray-light);
            padding: 4rem 0 0;
            position: relative;
            overflow: hidden;
        }

        .site-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            position: relative;
            z-index: 1;
        }

        .footer-column h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .footer-column h4::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--gradient);
            border-radius: 2px;
        }

        .footer-column ul {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-column ul li a {
            color: var(--gray-light);
            font-weight: 400;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .footer-column ul li a:hover {
            color: var(--white);
            padding-left: 8px;
        }

        .footer-column ul li a::before {
            content: '›';
            margin-right: 8px;
            color: var(--primary-light);
            font-weight: bold;
            transition: var(--transition);
        }

        .footer-column ul li a:hover::before {
            transform: translateX(3px);
        }

        .footer-column p {
            font-weight: 400;
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .footer-column p i {
            margin-top: 4px;
            color: var(--primary-light);
            min-width: 16px;
        }

        /* Subscribe Form */
        .subscribe-form {
            position: relative;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .subscribe-form input {
            width: 100%;
            padding: 1rem;
            border-radius: var(--border-radius);
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .subscribe-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .subscribe-form input:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(206, 160, 70, 0.3);
        }

        .subscribe-form button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            padding: 0.75rem 1.25rem;
            background: var(--gradient);
            color: var(--white);
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .subscribe-form button:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 5px 15px rgba(206, 160, 70, 0.4);
        }

        .footer-social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .footer-social-icons a {
            width: 44px;
            height: 44px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            transition: var(--transition);
            font-size: 1.1rem;
        }

        .footer-social-icons a:hover {
            background: var(--gradient);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer Credits */
        .footer-credits {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 3rem;
            padding: 2rem 0;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 400;
            color: var(--gray);
        }

        .footer-credits p {
            margin: 0;
        }

        /* =================
          5. WHATSAPP FLOAT
          =================
        */
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: var(--white);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.8rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 998;
            transition: var(--transition);
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            animation-play-state: paused;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }
            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* =================
          6. HERO SECTION
          =================
        */
        .hero-section {
            background: var(--gradient);
            color: var(--white);
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-cta {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--white);
            color: var(--primary);
            font-weight: 600;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
        }

        .hero-cta:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        /* =================
          7. PRODUCT GRID
          =================
        */
        .products-section {
            padding: 4rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-primary {
            background: var(--gradient);
            color: var(--white);
            flex: 1;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--glow);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: var(--white);
        }

        /* =================
          8. RESPONSIVE ADJUSTMENTS
          =================
        */
        @media (max-width: 768px) {
            .footer-grid {
                gap: 2rem;
            }
            
            .site-footer {
                padding: 3rem 0 0;
            }
            
            .footer-credits {
                margin-top: 2rem;
                padding: 1.5rem 0;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .mobile-menu {
                width: 280px;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Mobile Overlay -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>

    <!-- Mobile Menu (Off-Canvas) -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-header">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="mobile-menu-logo" onclick="document.location='/'">
            <button class="icon-button mobile-menu-close" id="mobile-menu-close" aria-label="Close menu">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        <div class="mobile-menu-body">
            <!-- User info or auth buttons will be dynamically inserted here -->
            <div id="mobile-user-section">
                <!-- This will be populated by JavaScript -->
            </div>

            <nav class="mobile-navigation">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="has-dropdown-mobile">
                        <div class="dropdown-toggle-mobile">
                            <span>Categories</span>
                            <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                        </div>
                        <ul class="dropdown-menu-mobile" id="mobile-categories-list">
                            <!-- Categories will be dynamically inserted here -->
                        </ul>
                    </li>
                    <li><a href="/product">Product</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </nav>

            <div class="mobile-social-icons">
                <a href="https://www.facebook.com/profile.php?id=61564483135497" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/muslimeenoutfit" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@muslimeenoutfit" aria-label="Tiktok"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Site Header -->
    <header class="site-header" id="site-header">
        <div class="header-main">
            <div class="container main-header-content">
                <div class="logo-container">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="header-logo" onclick="document.location='/'">
                </div>

                <!-- Desktop Navigation -->
                <nav class="main-navigation desktop-only">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li class="has-dropdown">
                            <a href="#">Categories <i class="fa-solid fa-chevron-down dropdown-arrow"></i></a>
                            <ul class="dropdown-menu" id="desktop-categories-list">
                                <!-- Categories will be dynamically inserted here -->
                            </ul>
                        </li>
                        <li><a href="/product">Product</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions">
                    <div class="auth-container desktop-only" id="desktop-auth-section">

                    @if(auth()->user())
                        <div class="welcome-user">
                            Hi, {{ auth()->user()->name }}!
                            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                                @csrf
                                <button type="submit" class="logout-button" aria-label="Log Out"><i class="fa-solid fa-right-from-bracket"></i></button>
                            </form>
                        </div>
                    @else
                        <a href="/login" class="auth-button secondary">Login</a>
                        <a href="/register" class="auth-button primary">Sign Up</a>
                    @endif
                  </div>

                    <a href="/cart" class="icon-button cart-icon" aria-label="View Cart">
                        <i class="fa-solid fa-bag-shopping"></i>

                        @if(session()->has('cart') && !empty(session('cart')))
                        <span class="cart-badge">{{ count(session('cart')) }}</span>
                    @endif
                    </a>

             
                </a>

                    <button class="icon-button mobile-only" id="mobile-menu-open" aria-label="Open menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('web-components')
    </main>


    <!-- Footer -->
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-column">
                <h4>SHOP</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/product">Products</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/about">About Us</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4>CONTACT US</h4>
                <p><i class="fa-solid fa-phone"></i> +92 312 2807268</p>
                <p><i class="fa-solid fa-envelope"></i> rangilalacecorner@gmail.com</p>
                <p><i class="fa-solid fa-map-marker-alt"></i> Kagzi Bazaar | Mithadar | Karachi | Pakistan</p>
            </div>

            <div class="footer-column" id="footer-subscribe">
                <h4>JOIN US</h4>
                <p>Subscribe for exclusive offers and be the first to know about new products.</p>
                <form class="subscribe-form">
                    <input type="email" placeholder="Your email address" aria-label="Your email address">
                    <button type="submit" aria-label="Subscribe"><i class="fa-regular fa-envelope"></i></button>
                </form>
                <div class="footer-social-icons">
                    <a href="https://www.facebook.com/profile.php?id=61564483135497" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/muslimeenoutfit?igsh=cjhoMTFnMmNkcnFo&utm_source=qr" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@muslimeenoutfit?_t=8pH20aWe5Rf&_r=1" aria-label="Tiktok"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-credits">
            <p>&copy; <span id="current-year"></span> RangilaLace - ECommerce Store. All Rights Reserved.<br>Powered by AHM Innotech</p>
        </div>
    </footer>

    <!-- WhatsApp Floating Icon -->
    <a href="https://wa.me/923122807268" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Set current year in footer
            document.getElementById('current-year').textContent = new Date().getFullYear();

            // Mobile menu functionality
            const menuOpenBtn = document.getElementById('mobile-menu-open');
            const menuCloseBtn = document.getElementById('mobile-menu-close');
            const mobileMenu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');

            // Open menu
            menuOpenBtn?.addEventListener('click', () => {
                mobileMenu.classList.add('is-open');
                overlay.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            });

            // Close menu
            menuCloseBtn?.addEventListener('click', () => {
                mobileMenu.classList.remove('is-open');
                overlay.classList.remove('is-open');
                document.body.style.overflow = '';
                document.querySelectorAll('.has-dropdown-mobile').forEach(li => li.classList.remove('is-open'));
            });
            
            overlay?.addEventListener('click', () => {
                mobileMenu.classList.remove('is-open');
                overlay.classList.remove('is-open');
                document.body.style.overflow = '';
                document.querySelectorAll('.has-dropdown-mobile').forEach(li => li.classList.remove('is-open'));
            });

            // Mobile dropdown toggle
            document.querySelectorAll('.dropdown-toggle-mobile').forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const parent = toggle.closest('.has-dropdown-mobile');
                    parent?.classList.toggle('is-open');
                });
            });

            // Header scroll effect
            const header = document.getElementById('site-header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Newsletter form submission
            const newsletterForm = document.querySelector('.subscribe-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const emailInput = newsletterForm.querySelector('input[type="email"]');
                    if (emailInput.value) {
                        alert('Thank you for subscribing to our newsletter!');
                        emailInput.value = '';
                    }
                });
            }

            // Dynamic content - Simulating data from backend
            // In a real application, this would come from your backend/database
            const categories = [
                { id: 1, name: "Lace Fabrics" },
                { id: 2, name: "Embroidered Textiles" },
                { id: 3, name: "Traditional Wear" },
                { id: 4, name: "Bridal Collection" },
                { id: 5, name: "Accessories" }
            ];

            const products = [
                { id: 1, name: "Premium Lace Fabric", price: "$45.99", image: "https://via.placeholder.com/300x300?text=Lace+Fabric" },
                { id: 2, name: "Embroidered Scarf", price: "$29.99", image: "https://via.placeholder.com/300x300?text=Embroidered+Scarf" },
                { id: 3, name: "Traditional Dress", price: "$89.99", image: "https://via.placeholder.com/300x300?text=Traditional+Dress" },
                { id: 4, name: "Bridal Set", price: "$149.99", image: "https://via.placeholder.com/300x300?text=Bridal+Set" },
                { id: 5, name: "Lace Accessories", price: "$19.99", image: "https://via.placeholder.com/300x300?text=Lace+Accessories" },
                { id: 6, name: "Premium Shawl", price: "$39.99", image: "https://via.placeholder.com/300x300?text=Premium+Shawl" }
            ];

            // Populate categories in desktop navigation
            const desktopCategoriesList = document.getElementById('desktop-categories-list');
            categories.forEach(category => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="/product?category=${category.id}">${category.name}</a>`;
                desktopCategoriesList.appendChild(li);
            });

            // Populate categories in mobile navigation
            const mobileCategoriesList = document.getElementById('mobile-categories-list');
            categories.forEach(category => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="/product?category=${category.id}">${category.name}</a>`;
                mobileCategoriesList.appendChild(li);
            });

            // Populate featured products
            const featuredProducts = document.getElementById('featured-products');
            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.innerHTML = `
                    <img src="${product.image}" alt="${product.name}" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">${product.name}</h3>
                        <p class="product-price">${product.price}</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">Add to Cart</button>
                            <button class="btn btn-secondary"><i class="fa-regular fa-heart"></i></button>
                        </div>
                    </div>
                `;
                featuredProducts.appendChild(productCard);
            });

            // Simulate user authentication state
            // In a real application, this would be determined by your authentication system
            const isLoggedIn = false; // Change to true to see logged in state
            const userName = "John Doe";
            const cartItemCount = 3;

            // Update cart badge
            document.getElementById('cart-count').textContent = cartItemCount;

            // Update authentication sections
            if (isLoggedIn) {
                // Desktop auth section
                document.getElementById('desktop-auth-section').innerHTML = `
                    <div class="welcome-user">
                        Hi, ${userName}!
                        <form action="/logout" method="POST" class="logout-form">
                            <button type="submit" class="logout-button" aria-label="Log Out"><i class="fa-solid fa-right-from-bracket"></i></button>
                        </form>
                    </div>
                `;

                // Mobile user section
                document.getElementById('mobile-user-section').innerHTML = `
                    <div class="mobile-user-info">
                        <div class="avatar">${userName.charAt(0)}</div>
                        <div>
                            <div class="user-name">Welcome, ${userName}!</div>
                            <form action="/logout" method="POST" class="mobile-logout-form">
                                <button type="submit" class="mobile-logout-button">Log Out</button>
                            </form>
                        </div>
                    </div>
                `;
            } else {
                // Desktop auth section
                document.getElementById('desktop-auth-section').innerHTML = `
                    <a href="/login" class="auth-button secondary">Login</a>
                    <a href="/register" class="auth-button primary">Sign Up</a>
                `;

                // Mobile user section
                document.getElementById('mobile-user-section').innerHTML = `
                    <div class="mobile-auth-buttons">
                        <a href="/login" class="auth-button primary">Login</a>
                        <a href="/register" class="auth-button secondary">Sign Up</a>
                    </div>
                `;
            }

            // Add "My Orders" link if user is logged in
            if (isLoggedIn) {
                // Add to desktop navigation
                const desktopNav = document.querySelector('.main-navigation ul');
                const myOrdersLi = document.createElement('li');
                myOrdersLi.innerHTML = '<a href="/orders">My Orders</a>';
                desktopNav.insertBefore(myOrdersLi, desktopNav.children[desktopNav.children.length - 1]);

                // Add to mobile navigation
                const mobileNav = document.querySelector('.mobile-navigation ul');
                const mobileMyOrdersLi = document.createElement('li');
                mobileMyOrdersLi.innerHTML = '<a href="/orders">My Orders</a>';
                mobileNav.insertBefore(mobileMyOrdersLi, mobileNav.children[mobileNav.children.length - 1]);
            }
        });
    </script>
</body>
</html>