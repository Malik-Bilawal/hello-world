@extends('WEBSITE.Components')

@section('web-components')
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #10b981;
            --accent: #8b5cf6;
            --dark: #0f172a;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --white: #ffffff;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --glow: 0 0 20px rgba(99, 102, 241, 0.4);
            --transition: all 0.3s ease-in-out;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            line-height: 1.7;
            color: var(--dark);
            background: linear-gradient(135deg, var(--light) 0%, #f0f4f8 100%);
            overflow-x: hidden;
            font-weight: 400;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        section {
            padding: 8rem 0;
            position: relative;
        }

        h1, h2, h3, h4, h5 {
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }

        h1 {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        h2 {
            font-size: clamp(2rem, 4vw, 3.5rem);
        }

        h3 {
            font-size: 1.5rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
            font-size: 1rem;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg), var(--glow);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #0ca678 100%);
        }

        /* Enhanced Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, 
                rgba(15, 23, 42, 0.9) 0%, 
                rgba(15, 23, 42, 0.8) 100%),
                url('https://images.unsplash.com/photo-1544027993-37dbfe43562a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(99, 102, 241, 0.2) 0%, transparent 50%),
                        radial-gradient(circle at 70% 20%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 50%);
            animation: float 6s ease-in-out infinite;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: clamp(2.8rem, 6vw, 5rem);
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 0.5s;
        }

        .hero p {
            font-size: clamp(1.1rem, 2vw, 1.4rem);
            margin-bottom: 3rem;
            color: var(--gray-light);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 0.8s;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 1.1s;
        }

        /* Modern About Intro */
        .about-intro {
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        .about-intro::before {
            content: '';
            position: absolute;
            top: -300px;
            right: -300px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.05) 0%, transparent 70%);
            z-index: 0;
        }

        .intro-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .intro-text {
            padding-right: 2rem;
        }

        .intro-image {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
            transition: var(--transition);
        }

        .intro-image:hover {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.02);
            box-shadow: var(--shadow-lg), var(--glow);
        }

        .intro-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
            z-index: 1;
            opacity: 0;
            transition: var(--transition);
        }

        .intro-image:hover::before {
            opacity: 1;
        }

        .intro-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: var(--transition);
        }

        /* Enhanced Values Section */
        .values {
            background: linear-gradient(135deg, var(--light) 0%, #f0f4f8 100%);
            position: relative;
        }

        .values::before {
            content: '';
            position: absolute;
            bottom: -200px;
            left: -200px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, transparent 70%);
            z-index: 0;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 3rem;
            position: relative;
            z-index: 1;
        }

        .value-card {
            background: var(--white);
            padding: 3rem 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(99, 102, 241, 0.1);
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .value-card:hover::before {
            transform: scaleX(1);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2rem;
            color: var(--white);
            transition: var(--transition);
        }

        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Advanced Statistics */
        .stats {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .stats::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            padding: 2rem 1rem;
        }

        .stat-number {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-text {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Modern Founder Section */
        .founder {
            background: var(--white);
            position: relative;
        }

        .founder-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
        }

        .founder-image {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .founder-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
            z-index: 1;
            opacity: 0;
            transition: var(--transition);
        }

        .founder-image:hover::before {
            opacity: 1;
        }

        .founder-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: var(--transition);
        }

        .founder-image:hover img {
            transform: scale(1.05);
        }

        .founder-quote {
            font-style: italic;
            color: var(--gray);
            border-left: 4px solid var(--secondary);
            padding-left: 2rem;
            margin: 2rem 0;
            font-size: 1.2rem;
            position: relative;
        }

        .founder-quote::before {
            content: '"';
            position: absolute;
            top: -1rem;
            left: 0.5rem;
            font-size: 4rem;
            color: var(--secondary);
            opacity: 0.3;
            font-family: Georgia, serif;
        }

        /* Enhanced CTA Section */
        .cta {
            background: linear-gradient(135deg, var(--dark) 0%, #1e293b 100%);
            color: var(--white);
            text-align: center;
            padding: 8rem 0;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: -300px;
            right: -300px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        .cta::after {
            content: '';
            position: absolute;
            bottom: -300px;
            left: -300px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
            animation: float 10s ease-in-out infinite reverse;
        }

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: clamp(2.2rem, 4vw, 3.5rem);
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            color: var(--gray-light);
        }

        /* Advanced Animations */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Particle Background Effect */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .intro-grid,
            .founder-grid {
                gap: 4rem;
            }
        }

        @media (max-width: 768px) {
            section {
                padding: 6rem 0;
            }

            .intro-grid,
            .founder-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .intro-text {
                padding-right: 0;
            }

            .intro-image,
            .founder-image {
                order: -1;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 1.5rem;
            }

            section {
                padding: 4rem 0;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        /* Loading Animation */
        .loading-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            z-index: 9999;
            transition: width 0.3s ease;
        }

        /* Scroll Progress */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: transparent;
            z-index: 9998;
        }

        .scroll-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            width: 0%;
            transition: width 0.1s ease;
        }
    </style>

    <!-- Loading Bar -->
    <div class="loading-bar" id="loadingBar"></div>
    
    <!-- Scroll Progress -->
    <div class="scroll-progress">
        <div class="scroll-progress-bar" id="scrollProgress"></div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="particles" id="particles"></div>
        <div class="hero-content">
            <h1>About Muslimeen</h1>
            <p>Where Modern Modesty Meets Contemporary Elegance The Council of the International Islamic Fiqh Academy of the Organization</p>
            <div class="hero-buttons">
                <a href="#about" class="btn">Discover Our Story</a>
                <a href="#collections" class="btn btn-secondary">View Collections</a>
            </div>
        </div>
    </section>

    <!-- About Intro Section -->
    <section id="about" class="about-intro">
        <div class="container">
            <div class="intro-grid">
                <div class="intro-text">
                    <h2 class="section-title">Our Vision</h2>
                    <p>Welcome to <strong>Muslimeen</strong>, where tradition meets innovation in Islamic fashion. Founded with a passion for excellence, we're redefining modest wear for the modern era.</p>
                    <p>Our collections blend timeless Islamic values with contemporary design aesthetics, creating pieces that empower you to express your faith with confidence and style.</p>
                    <p>Every garment tells a story of craftsmanship, quality, and devotion to the principles of modesty and elegance.</p>
                    <a href="#collections" class="btn" style="margin-top: 2rem;">Explore Collections</a>
                </div>
                <div class="intro-image">
                    <img src="https://images.unsplash.com/photo-1585435557343-3b092031d5ad?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Modern Islamic Fashion">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <h2 class="section-title">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We pursue perfection in every stitch, ensuring unparalleled quality and attention to detail in all our creations.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Community</h3>
                    <p>Building bridges through fashion, we create spaces where faith and fashion harmoniously coexist.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>Pushing boundaries while honoring tradition, we redefine what modest fashion can be in the modern world.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" data-count="5000">0</div>
                    <div class="stat-text">Satisfied Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="3">0</div>
                    <div class="stat-text">Years of Excellence</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="150">0</div>
                    <div class="stat-text">Unique Designs</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-text">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder Section -->
    <section class="founder">
        <div class="container">
            <div class="founder-grid">
                <div class="founder-image">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80" alt="Founder Shafi">
                </div>
                <div class="founder-text">
                    <h2 class="section-title">Our Founder's Vision</h2>
                    <p><strong>Shafi</strong> envisioned Muslimeen as more than a fashion brand—it's a movement that celebrates Islamic heritage through contemporary design.</p>
                    <blockquote class="founder-quote">
                        "We're not just creating clothing; we're crafting confidence. Every piece is designed to make you feel proud of your identity while embracing modern elegance."
                    </blockquote>
                    <p>Under Shafi's leadership, Muslimeen continues to innovate while staying true to the core values of quality, authenticity, and community empowerment.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="collections" class="cta">
        <div class="cta-content">
            <h2>Join Our Fashion Revolution</h2>
            <p>Experience the perfect fusion of faith and fashion. Discover collections that celebrate your identity with style and grace.</p>
            <a href="#" class="btn">Explore Collections</a>
            <a href="#" class="btn btn-secondary" style="margin-left: 1rem;">Book Consultation</a>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Loading animation
            setTimeout(() => {
                document.getElementById('loadingBar').style.width = '100%';
                setTimeout(() => {
                    document.getElementById('loadingBar').style.opacity = '0';
                }, 500);
            }, 100);

            // Scroll progress
            window.addEventListener('scroll', () => {
                const winHeight = window.innerHeight;
                const docHeight = document.documentElement.scrollHeight;
                const scrollTop = window.pageYOffset;
                const scrollPercent = (scrollTop / (docHeight - winHeight)) * 100;
                document.getElementById('scrollProgress').style.width = scrollPercent + '%';
            });

            // Particle background
            function createParticles() {
                const particlesContainer = document.getElementById('particles');
                const particleCount = 50;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    
                    // Random properties
                    const size = Math.random() * 6 + 2;
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    const delay = Math.random() * 5;
                    const duration = Math.random() * 10 + 5;
                    
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}%`;
                    particle.style.top = `${posY}%`;
                    particle.style.animationDelay = `${delay}s`;
                    particle.style.animationDuration = `${duration}s`;
                    
                    particlesContainer.appendChild(particle);
                }
            }

            // Animated counters
            function animateCounters() {
                const counters = document.querySelectorAll('.stat-number');
                const speed = 200;

                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    
                    if (count < target) {
                        counter.innerText = Math.ceil(count + (target / speed));
                        setTimeout(() => animateCounters(), 1);
                    } else {
                        counter.innerText = target;
                    }
                });
            }

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        
                        // Start counters when stats section is visible
                        if (entry.target.classList.contains('stats')) {
                            setTimeout(animateCounters, 500);
                        }
                    }
                });
            }, observerOptions);

            // Observe sections for animation
            const sections = document.querySelectorAll('.intro-grid, .values-grid, .stats, .founder-grid');
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(section);
            });

            // Enhanced hover effects
            const cards = document.querySelectorAll('.value-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    card.style.setProperty('--mouse-x', `${x}px`);
                    card.style.setProperty('--mouse-y', `${y}px`);
                });
            });

            // Initialize particles
            createParticles();

            // Parallax effect for hero
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('.hero');
                hero.style.transform = `translateY(${scrolled * 0.4}px)`;
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });

        // Enhanced cursor effect
        document.addEventListener('mousemove', (e) => {
            const cursor = document.createElement('div');
            cursor.style.position = 'fixed';
            cursor.style.width = '8px';
            cursor.style.height = '8px';
            cursor.style.backgroundColor = 'var(--primary)';
            cursor.style.borderRadius = '50%';
            cursor.style.pointerEvents = 'none';
            cursor.style.zIndex = '9999';
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            cursor.style.opacity = '0.7';
            
            document.body.appendChild(cursor);
            
            setTimeout(() => {
                cursor.remove();
            }, 100);
        });
    </script>
@endsection