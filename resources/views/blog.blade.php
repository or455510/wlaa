@extends('layouts.app')

@section('content')
<section class="container" style="padding: 80px 0;">
    <h1>Blog</h1>
    <div class="blog-grid" style="margin-top: 40px;">
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="Article 1">
            <div class="blog-card-content">
                <h3>Blog Article 1</h3>
                <p>Short description of the article.</p>
                <a href="#">Read More →</a>
            </div>
        </div>
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="Article 2">
            <div class="blog-card-content">
                <h3>Blog Article 2</h3>
                <p>Short description of the article.</p>
                <a href="#">Read More →</a>
            </div>
        </div>
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="Article 3">
            <div class="blog-card-content">
                <h3>Blog Article 3</h3>
                <p>Short description of the article.</p>
                <a href="#">Read More →</a>
            </div>
        </div>
    </div>
</section>
@endsection
