@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content text-center">
        <h1>Welcome to Walaa Plus</h1>
        <p>Your loyalty program and latest updates all in one place.</p>
        <a href="#" class="btn">Get Started</a>
    </div>
</section>

<!-- Stats Section -->
<section class="stats container">
    <div class="counter">
        <h2 data-target="1500">0</h2>
        <p>Clients</p>
    </div>
    <div class="counter">
        <h2 data-target="3200">0</h2>
        <p>Users</p>
    </div>
    <div class="counter">
        <h2 data-target="75">0</h2>
        <p>Services</p>
    </div>
    <div class="counter">
        <h2 data-target="120">0</h2>
        <p>Offers</p>
    </div>
</section>

<!-- Latest Blog Articles -->
<section class="blog container">
    <h2 class="text-center" style="margin-bottom:40px;">Latest Articles</h2>
    <div class="blog-grid">
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="Article 1">
            <div class="blog-card-content">
                <h3>Article Title 1</h3>
                <p>Short description for the article goes here.</p>
                <a href="#">Read More →</a>
            </div>
        </div>
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="Article 2">
            <div class="blog-card-content">
                <h3>Article Title 2</h3>
                <p>Short description for the article goes here.</p>
                <a href="#">Read More →</a>
            </div>
        </div>
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="Article 3">
            <div class="blog-card-content">
                <h3>Article Title 3</h3>
                <p>Short description for the article goes here.</p>
                <a href="#">Read More →</a>
            </div>
        </div>
    </div>
</section>
@endsection
