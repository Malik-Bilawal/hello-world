@extends('WEBSITE.Components')

@section('web-components')
<style>
    /* Add your custom styles here */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    color: var(--light);
    line-height: 1.6;
    overflow-x: hidden;
    min-height: 100vh;
    position: relative;
}

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.1) 0%, transparent 20%),
        radial-gradient(circle at 90% 40%, rgba(139, 92, 246, 0.1) 0%, transparent 20%),
        radial-gradient(circle at 50% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 20%);
    z-index: -1;
}

.header-container {
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: white;
    padding: 120px 20px;
    text-align: center;
    position: relative;
    overflow: hidden;
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
}

.header-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwMCAxMDAwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0wIDBoMTAwdjEwMEgwVjB6IiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4=');
    opacity: 0.3;
}

.header-container h1 {
    font-size: 4.5rem;
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    font-weight: 800;
    letter-spacing: -0.02em;
    background: linear-gradient(to right, #ffffff, #e0e7ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: titleFloat 6s ease-in-out infinite;
}

@keyframes titleFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.contact-section {
    max-width: 1400px;
    margin: -80px auto 100px;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 60px;
    position: relative;
    z-index: 2;
}

.contact-header {
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(10px);
    padding: 50px;
    border-radius: 24px;
    box-shadow: var(--shadow);
    height: fit-content;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.contact-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(to bottom, var(--primary), var(--accent), var(--secondary));
}

.contact-header h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: var(--light);
    font-weight: 700;
}

.contact-header p {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 15px;
    font-size: 1.1rem;
    line-height: 1.8;
}

.contact-header #ddd {
    font-weight: 600;
    color: var(--primary);
    margin-top: 20px;
    font-size: 1.2rem;
}

.contact-form {
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(10px);
    padding: 50px;
    border-radius: 24px;
    box-shadow: var(--shadow);
    border: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.contact-form::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
    z-index: -1;
}

@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.form-group {
    margin-bottom: 30px;
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: var(--light);
    transition: var(--transition);
    font-size: 1.1rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 18px 20px;
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    font-size: 1rem;
    transition: var(--transition);
    background-color: rgba(15, 23, 42, 0.5);
    color: var(--light);
    backdrop-filter: blur(5px);
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: var(--glow);
    background-color: rgba(15, 23, 42, 0.8);
    transform: translateY(-5px);
}

.form-group textarea {
    resize: vertical;
    min-height: 150px;
}

.button-container {
    display: flex;
    justify-content: flex-end;
}

.send-btn {
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: white;
    border: none;
    padding: 18px 45px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.send-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
    z-index: -1;
}

.send-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(99, 102, 241, 0.6);
}

.send-btn:hover::before {
    left: 100%;
}

.send-btn:active {
    transform: translateY(0);
}

.contact-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 50px;
}

.info-item {
    text-align: center;
    padding: 30px 20px;
    background: rgba(15, 23, 42, 0.5);
    border-radius: 16px;
    box-shadow: var(--shadow);
    transition: var(--transition);
    border: 1px solid rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(5px);
    position: relative;
    overflow: hidden;
}

.info-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--accent), var(--secondary));
    transform: scaleX(0);
    transform-origin: left;
    transition: var(--transition);
}

.info-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.info-item:hover::before {
    transform: scaleX(1);
}

.info-item i {
    font-size: 2.5rem;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: var(--transition);
}

.info-item:hover i {
    transform: scale(1.2);
}

.info-item h3 {
    font-size: 1.3rem;
    margin-bottom: 12px;
    color: var(--light);
    font-weight: 600;
}

.info-item p {
    color: rgba(255, 255, 255, 0.7);
}

.floating-shapes {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    overflow: hidden;
    z-index: -1;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--accent), var(--secondary));
    opacity: 0.1;
    animation: float 25s infinite linear;
    filter: blur(1px);
}

.shape:nth-child(1) {
    width: 120px;
    height: 120px;
    top: 10%;
    left: 5%;
    animation-delay: 0s;
    animation-duration: 30s;
}

.shape:nth-child(2) {
    width: 180px;
    height: 180px;
    top: 60%;
    left: 10%;
    animation-delay: -5s;
    animation-duration: 35s;
}

.shape:nth-child(3) {
    width: 90px;
    height: 90px;
    top: 30%;
    right: 10%;
    animation-delay: -10s;
    animation-duration: 25s;
}

.shape:nth-child(4) {
    width: 150px;
    height: 150px;
    top: 70%;
    right: 5%;
    animation-delay: -15s;
    animation-duration: 40s;
}

.shape:nth-child(5) {
    width: 70px;
    height: 70px;
    top: 20%;
    left: 50%;
    animation-delay: -7s;
    animation-duration: 20s;
}

.shape:nth-child(6) {
    width: 100px;
    height: 100px;
    top: 80%;
    left: 30%;
    animation-delay: -12s;
    animation-duration: 28s;
}

@keyframes float {
    0% {
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
    25% {
        transform: translate(30px, 30px) rotate(90deg) scale(1.1);
    }
    50% {
        transform: translate(0, 60px) rotate(180deg) scale(1);
    }
    75% {
        transform: translate(-30px, 30px) rotate(270deg) scale(0.9);
    }
    100% {
        transform: translate(0, 0) rotate(360deg) scale(1);
    }
}

.success-message {
    background: linear-gradient(135deg, var(--secondary), #059669);
    color: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    display: none;
    align-items: center;
    gap: 12px;
    animation: fadeIn 0.5s ease;
    box-shadow: 0 10px 20px rgba(5, 150, 105, 0.3);
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-15px); }
    to { opacity: 1; transform: translateY(0); }
}

.error-message {
    color: #f87171;
    font-size: 0.9rem;
    margin-top: 8px;
    display: none;
    font-weight: 500;
}

.particles-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    pointer-events: none;
}

.particle {
    position: absolute;
    background: rgba(99, 102, 241, 0.3);
    border-radius: 50%;
    animation: particleFloat 20s infinite linear;
}

@keyframes particleFloat {
    0% {
        transform: translateY(100vh) translateX(0) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100px) translateX(100px) rotate(360deg);
        opacity: 0;
    }
}

@media (max-width: 1200px) {
    .contact-section {
        grid-template-columns: 1fr;
        gap: 40px;
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
