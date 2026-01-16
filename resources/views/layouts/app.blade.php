<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Walaa Plus')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ==============================
   Reset & Base Styles
============================== */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            line-height: 1.6;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        button {
            cursor: pointer;
            border: none;
            background: none;
        }

        /* ==============================
   Utility Classes
============================== */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 25px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* ==============================
   Header
============================== */
        header {
            width: 100%;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav li a {
            padding: 5px 10px;
            transition: 0.3s;
        }

        nav li a:hover {
            color: #007bff;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 4px 0;
        }

        /* ==============================
   Hero Section / Slider
============================== */
        .hero {
            width: 100%;
            height: 90vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            background: url('https://via.placeholder.com/1600x900') center/cover no-repeat;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        /* ==============================
   Stats / Counters Section
============================== */
        .stats {
            display: flex;
            justify-content: space-around;
            padding: 80px 0;
            background: #f9f9f9;
            flex-wrap: wrap;
            gap: 20px;
        }

        .counter {
            text-align: center;
        }

        .counter h2 {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .counter p {
            font-size: 1rem;
            color: #555;
        }

        /* ==============================
   Blog / Articles Section
============================== */
        .blog {
            padding: 80px 0;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .blog-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .blog-card-content {
            padding: 15px;
        }

        .blog-card-content h3 {
            margin-bottom: 10px;
        }

        .blog-card-content p {
            margin-bottom: 10px;
            font-size: 0.9rem;
            color: #555;
        }

        .blog-card-content a {
            color: #007bff;
            font-weight: bold;
        }

        /* ==============================
   Call-to-Action / Newsletter Section
============================== */
        .cta {
            background: #007bff;
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .cta input[type="email"] {
            padding: 10px;
            width: 250px;
            border-radius: 5px 0 0 5px;
            border: none;
            outline: none;
        }

        .cta button {
            padding: 10px 20px;
            border-radius: 0 5px 5px 0;
            border: none;
            background: #0056b3;
            color: white;
        }

        .cta button:hover {
            background: #003d80;
        }

        .form-message {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        /* ==============================
   Popup / Modal
============================== */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1001;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            text-align: center;
            position: relative;
        }

        .modal-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .modal-content h3 {
            margin-bottom: 10px;
        }

        .modal-content p {
            margin-bottom: 20px;
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* ==============================
   Footer
============================== */
        footer {
            background: #222;
            color: white;
            padding: 40px 20px;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-column h4 {
            margin-bottom: 15px;
        }

        .footer-column a {
            display: block;
            margin-bottom: 8px;
            color: #bbb;
            font-size: 0.9rem;
        }

        .footer-column a:hover {
            color: #fff;
        }

        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .social-icons svg {
            width: 24px;
            height: 24px;
            fill: #bbb;
            transition: 0.3s;
        }

        .social-icons svg:hover {
            fill: #007bff;
        }

        /* ==============================
   Responsive
============================== */
        @media(max-width: 768px) {
            nav ul {
                display: none;
                flex-direction: column;
                background: #fff;
                position: absolute;
                top: 60px;
                right: 20px;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }

            nav ul.active {
                display: flex;
            }

            .hamburger {
                display: flex;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
    <style>
        /* ضع هنا كل CSS اللي كتبناه في HTML العادي */
        /* Copy كامل الـ CSS من الكود السابق */
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">Walaa Plus</div>
            <nav>
                <ul>
                    <li>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </li>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <div class="hamburger">
                    <span></span><span></span><span></span>
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer-container">
            <div class="footer-column">
                <h4>Walaa Plus</h4>
                <p>Short company description.</p>
            </div>
            <div class="footer-column">
                <h4>Links</h4><a href="#">About</a><a href="#">Privacy Policy</a><a href="#">Terms</a>
            </div>
            <div class="footer-column">
                <h4>Contact</h4>
                <p>Phone: +1234567890</p>
                <p>Email: info@example.com</p>
                <p>Address: 123 Street, City</p>
            </div>
            <div class="footer-column">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="text-center" style="margin-top:20px;">&copy; 2025 Walaa Plus. All Rights Reserved.</div>
    </footer>

    <!-- JS Scripts -->
    <script>
        // Copy كامل JS من الكود السابق
    </script>
</body>

</html>
