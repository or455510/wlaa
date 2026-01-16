@extends('layouts.app')

@section('content')
<section class="container" style="padding: 100px 0;">
    <h1>Blog Articles</h1>
    <div class="blog-grid">
        @foreach($articles as $article)
        <div class="blog-card">
            <img src="https://via.placeholder.com/400x200" alt="{{ $article->title }}">
            <div class="blog-card-content">
                <h3>{{ $article->title }}</h3>
                <p>{{ Str::limit($article->description, 100) }}</p>
                <a href="{{ route('blog.show', $article->id) }}">Read More →</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
