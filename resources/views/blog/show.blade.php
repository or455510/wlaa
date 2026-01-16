@extends('layouts.app')

@section('content')
<section class="container" style="padding: 100px 0;">
    <h1>{{ $article->title }}</h1>
    <img src="https://via.placeholder.com/800x400" alt="{{ $article->title }}" style="margin:20px 0;">
    <p>{{ $article->description }}</p>
</section>
@endsection
