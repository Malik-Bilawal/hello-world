@extends('WEBSITE.Components')

@section('web-components')
<style>
   /* LIGHT THEME FIXED CSS */
/* ------------------------------------------------------------ */



/* ------------------------------------------------------------ */
/* GLOBAL */
/* ------------------------------------------------------------ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: var(--secondary);
    color: #222;
    line-height: 1.6;
    overflow-x: hidden;
    min-height: 100vh;
    position: relative;
}

body::before { display: none; }

/* ------------------------------------------------------------ */
/* HEADER */
/* ------------------------------------------------------------ */

.header-container {
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    color: white;
    padding: 120px 20px;
    text-align: center;
    position: relative;
    overflow: hidden;
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
}

.header-container::before { display: none; }

.header-container h1 {
    font-size: 4.5rem;
    margin-bottom: 20px;
    font-weight: 800;
    letter-spacing: -0.02em;
    background: linear-gradient(to right, #000, #555);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: titleFloat 6s ease-in-out infinite;
}

/* Title animation */
@keyframes titleFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* ------------------------------------------------------------ */
/* MAIN LAYOUT */
/* ------------------------------------------------------------ */

.contact-section {
    max-width: 1400px;
    margin: -80px auto 100px;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 60px;
    position: relative;
}

/* ------------------------------------------------------------ */
/* LEFT SIDE CARD (CONTACT HEADER) */
/* ------------------------------------------------------------ */

.contact-header {
    background: var(--white);
    padding: 50px;
    border-radius: 24px;
    box-shadow: var(--shadow);
    border: 1px solid #eee;
    color: #222;
    position: relative;
}

.contact-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(to bottom, var(--primary), var(--primary-light));
}

.contact-header h1 { color: #222; }
.contact-header p { color: #444; }

/* ------------------------------------------------------------ */
/* FORM (RIGHT SIDE) */
/* ------------------------------------------------------------ */

.contact-form {
    background: var(--white);
    padding: 50px;
    border-radius: 24px;
    box-shadow: var(--shadow);
    border: 1px solid #eee;
    position: relative;
}

.contact-form::before { display: none; }

.form-group label {
    color: #333;
    font-weight: 600;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 18px 20px;
    border: 2px solid #ddd;
    border-radius: 12px;
    font-size: 1rem;
    background-color: #fff;
    color: #333;
    transition: var(--transition);
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: var(--glow);
    transform: translateY(-5px);
}

/* ------------------------------------------------------------ */
/* BUTTON */
/* ------------------------------------------------------------ */

.send-btn {
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    color: white;
    border: none;
    padding: 18px 45px;
    border-radius: 50px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: 0.3s ease;
    box-shadow: 0 10px 20px rgba(206,160,70,0.4);
}

.send-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(206,160,70,0.6);
}

/* ------------------------------------------------------------ */
/* CONTACT INFO CARDS */
/* ------------------------------------------------------------ */

.contact-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 50px;
}

.info-item {
    text-align: center;
    padding: 30px 20px;
    background: white;
    border-radius: 16px;
    box-shadow: var(--shadow);
    border: 1px solid #eee;
    transition: 0.3s;
}

.info-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--primary-light));
    transform: scaleX(0);
    transform-origin: left;
    transition: 0.3s ease;
}

.info-item:hover {
    transform: translateY(-10px);
}

.info-item:hover::before {
    transform: scaleX(1);
}

.info-item i {
    font-size: 2.5rem;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.info-item h3 { color: #222; }
.info-item p { color: #555; }

/* ------------------------------------------------------------ */
/* REMOVE DARK ANIMATION ELEMENTS */
/* ------------------------------------------------------------ */

.floating-shapes,
.particles-container {
    display: none !important;
}

/* ------------------------------------------------------------ */
/* RESPONSIVE */
/* ------------------------------------------------------------ */

@media (max-width: 1200px) {
    .contact-section {
        grid-template-columns: 1fr;
    }
    .contact-info {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .header-container h1 {
        font-size: 3.2rem;
    }
    .contact-header, .contact-form {
        padding: 30px;
    }
    .contact-info {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .header-container h1 {
        font-size: 2.5rem;
    }
    .contact-header h1 {
        font-size: 2rem;
    }
    .send-btn {
        width: 100%;
        justify-content: center;
    }
}


/* 3D Card Effect */
.card-3d {
    transform-style: preserve-3d;
    perspective: 1000px;
}

.card-3d:hover {
    transform: rotateY(5deg) rotateX(5deg);
}

/* Glitch Text Effect */
.glitch-text {
    position: relative;
    display: inline-block;
}

.glitch-text::before,
.glitch-text::after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.glitch-text::before {
    left: 2px;
    text-shadow: -2px 0 #ff00ff;
    clip: rect(44px, 450px, 56px, 0);
    animation: glitch-anim 5s infinite linear alternate-reverse;
}

.glitch-text::after {
    left: -2px;
    text-shadow: -2px 0 #00ffff;
    clip: rect(44px, 450px, 56px, 0);
    animation: glitch-anim2 5s infinite linear alternate-reverse;
}

@keyframes glitch-anim {
    0% { clip: rect(42px, 9999px, 44px, 0); }
    5% { clip: rect(12px, 9999px, 59px, 0); }
    10% { clip: rect(48px, 9999px, 29px, 0); }
    15% { clip: rect(42px, 9999px, 73px, 0); }
    20% { clip: rect(63px, 9999px, 27px, 0); }
    25% { clip: rect(34px, 9999px, 55px, 0); }
    30% { clip: rect(86px, 9999px, 73px, 0); }
    35% { clip: rect(20px, 9999px, 20px, 0); }
    40% { clip: rect(26px, 9999px, 60px, 0); }
    45% { clip: rect(25px, 9999px, 66px, 0); }
    50% { clip: rect(57px, 9999px, 98px, 0); }
    55% { clip: rect(5px, 9999px, 46px, 0); }
    60% { clip: rect(82px, 9999px, 31px, 0); }
    65% { clip: rect(54px, 9999px, 27px, 0); }
    70% { clip: rect(28px, 9999px, 99px, 0); }
    75% { clip: rect(45px, 9999px, 69px, 0); }
    80% { clip: rect(23px, 9999px, 85px, 0); }
    85% { clip: rect(54px, 9999px, 84px, 0); }
    90% { clip: rect(45px, 9999px, 47px, 0); }
    95% { clip: rect(37px, 9999px, 20px, 0); }
    100% { clip: rect(4px, 9999px, 91px, 0); }
}

@keyframes glitch-anim2 {
    0% { clip: rect(65px, 9999px, 100px, 0); }
    5% { clip: rect(52px, 9999px, 74px, 0); }
    10% { clip: rect(79px, 9999px, 85px, 0); }
    15% { clip: rect(75px, 9999px, 5px, 0); }
    20% { clip: rect(67px, 9999px, 61px, 0); }
    25% { clip: rect(14px, 9999px, 79px, 0); }
    30% { clip: rect(1px, 9999px, 66px, 0); }
    35% { clip: rect(86px, 9999px, 30px, 0); }
    40% { clip: rect(23px, 9999px, 98px, 0); }
    45% { clip: rect(85px, 9999px, 72px, 0); }
    50% { clip: rect(71px, 9999px, 75px, 0); }
    55% { clip: rect(2px, 9999px, 48px, 0); }
    60% { clip: rect(30px, 9999px, 16px, 0); }
    65% { clip: rect(59px, 9999px, 50px, 0); }
    70% { clip: rect(41px, 9999px, 62px, 0); }
    75% { clip: rect(2px, 9999px, 82px, 0); }
    80% { clip: rect(47px, 9999px, 73px, 0); }
    85% { clip: rect(3px, 9999px, 27px, 0); }
    90% { clip: rect(26px, 9999px, 55px, 0); }
    95% { clip: rect(42px, 9999px, 97px, 0); }
    100% { clip: rect(38px, 9999px, 49px, 0); }
}
</style>
    <title>Contact Us | Flying Aesthetic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="particles-container" id="particles"></div>

    <div class="header-container">
        <h1 class="glitch-text" data-text="CONTACT US">CONTACT US</h1>
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <section class="contact-section">
        <div class="contact-header card-3d">
            <h1>GET IN TOUCH</h1>
            <p>For any inquiries, questions, or feedback, feel free to reach out to us. Our customer support team is here to assist you with anything you need.</p>
            <p>We value your input and are committed to providing exceptional service. Let us know how we can help you achieve your goals.</p>
            <p id="ddd">We look forward to hearing from you!</p>
            
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Our Location</h3>
                    <p>123 Business Avenue, Suite 100</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone-alt"></i>
                    <h3>Phone Number</h3>
                    <p>+1 (555) 123-4567</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <h3>Email Address</h3>
                    <p>info@company.com</p>
                </div>
            </div>
        </div>
        
        <div class="contact-form card-3d">
            <div class="success-message" id="successMessage">
                <i class="fas fa-check-circle"></i>
                <span>Your message has been sent successfully!</span>
            </div>
            
            <form id="contactForm" action="/contactinserted" method="post">
                <div class="form-group">
                    <label for="contname">Name</label>
                    <input type="text" id="contname" name="contname" placeholder="Your Name" required>
                    <div class="error-message" id="nameError">Please enter your name</div>
                </div>
                <div class="form-group">
                    <label for="contnumber">Phone</label>
                    <input type="tel" id="contnumber" name="contnumber" placeholder="Your Phone" required>
                    <div class="error-message" id="phoneError">Please enter a valid phone number</div>
                </div>
                <div class="form-group">
                    <label for="contmsg">Message</label>
                    <textarea id="contmsg" rows="4" name="contmsg" placeholder="Your Message" required></textarea>
                    <div class="error-message" id="messageError">Please enter your message</div>
                </div>
                <div class="button-container">
                    <button type="submit" class="send-btn">
                        <i class="fas fa-paper-plane"></i>
                        SEND MESSAGE
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 6 + 2;
                const left = Math.random() * 100;
                const animationDuration = Math.random() * 20 + 10;
                const animationDelay = Math.random() * 20;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${left}%`;
                particle.style.animationDuration = `${animationDuration}s`;
                particle.style.animationDelay = `${animationDelay}s`;
                
                container.appendChild(particle);
            }
        }

        // Add real-time validation
        document.getElementById('contname').addEventListener('input', function() {
            if (this.value.trim() !== '') {
                document.getElementById('nameError').style.display = 'none';
            }
        });
     
        
        document.getElementById('contmsg').addEventListener('input', function() {
            if (this.value.trim() !== '') {
                document.getElementById('messageError').style.display = 'none';
            }
        });

        // Initialize particles on load
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
           
        });
    </script>
@endsection
