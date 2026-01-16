<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    // عرض كل المقالات
    public function index()
    {
        $articles = Article::latest()->get();
        return view('blog.index', compact('articles'));
    }

    // عرض مقال مفصل حسب الـ ID
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.show', compact('article'));
    }
}
