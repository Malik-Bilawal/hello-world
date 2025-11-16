@extends('WEBSITE.Components')

@section('web-components')

<link href="https://fonts.googleapis.com/css2?family=Century+Gothic&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/WEBSITE/aboutdeveloper.css') }}">

<div class="container">
    <!-- About Company Section -->
    <div class="company-info company">
          <img src="images/aboutdev/logo.jpeg" alt="AHM INNOTECH Office" id="ahmlogo">
      <h1>About AHM INNOTECH</h1>
        <p>AHM INNOTECH is a leading software development company that specializes in creating innovative digital solutions. Our mission is to provide top-notch services in web development, mobile applications, and digital marketing. We pride ourselves on our commitment to quality and customer satisfaction, ensuring that every project meets the highest standards.</p>
    </div>

    <!-- Process Section (Image Converted to Code) -->
    <section class="our-process">
        <!--<div class="process-header">-->
        <!--    <span class="badge">Our Process</span>-->
        <!--    <h2>Easy Steps To Get Your Solution</h2>-->
        <!--    <p>Sid Techno is the partner of choice for many leading enterprises & SMEs from around the globe. We help enterprises enhance their value through bespoke web & mobile development, 24/7 technical support, reliable QA, and intelligent consultancy services.</p>-->
        <!--</div>-->

        <div class="steps">
            <div class="step">
                <div class="icon-wrapper">
                    <img src="images/aboutdev/customer-service.png" alt="Call Or Email Icon">
                </div>
                <h3>Call Or Email For Disuses</h3>
            </div>

            <div class="step">
                <div class="icon-wrapper">
                    <img src="images/aboutdev/consultation.png" alt="Consultation Icon">
                </div>
                <h3>Start Consultation</h3>
            </div>

            <div class="step">
                <div class="icon-wrapper">
                    <img src="images/aboutdev/customer.png" alt="Growth Icon">
                </div>
                <h3>Get Satisfied</h3>
            </div>
        </div>
    </section>

    <!-- Meet Our Developers Section -->
    <div class="heading">
        <h2>Meet Our Developers</h2>
        <div class="developer-info">
            <div class="developer">
                <img src="images/aboutdev/muzammil-dp.jpeg" alt="Muzammil Faheem">
                <div class="developer-details">
                    <h3>Muzammil Faheem</h3>
                    <h4>Full Stack Developer</h4>
                    <p>Muzammil is a passionate full-stack developer with expertise in PHP, Laravel, and modern frontend technologies. He is dedicated to delivering high-quality, user-friendly applications. His experience also extends to project management and working with Agile methodologies.</p>
                    <ul class="additional-details">
                       <li><strong>Skills:</strong> PHP-Laravel , Python , ASP.NET , frontend(HTML ,CSS , JS , React , GSAP) </li>
                    </ul>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/share/hbfwVzpckdE2ihLv/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/muzammil_faheem_fsd?igsh=OXd5dzB5cG1pemZp"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/muzammil-faheem?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
    
            <div class="developer">
                <img src="images/aboutdev/hasnain-dp.jpeg" alt="Hasnain">
                <div class="developer-details">
                    <h3>Hasnain</h3>
                    <h4>Full Stack Developer</h4>
                    <p>Hasnain is a skilled developer with a strong background in full-stack development and a keen eye for Backend logic development. His focus is on creating seamless user experiences and efficient code. He also specializes in UI/UX design with a knack for intuitive user interfaces.</p>
                    <ul class="additional-details">
                        <li><strong>Skills:</strong> php-laravel, python , ASP.NET ,  Java (spring MVC) , frontend development (HTML ,CSS , JS , TS , GSAP)</li>
                    </ul>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/share/M5D9DU76yYABRVC7/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/hasnainsamad123/profilecard/?igsh=MXYyN3BhbzdsODRvag=="><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/hasnain-abdul-samad?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script>
    // GSAP animation
    gsap.to(".company-info, .developer-info, .our-process", {
        opacity: 1,
        y: 0,
        duration: 1,
        stagger: 0.3
    });
</script>

@endsection
