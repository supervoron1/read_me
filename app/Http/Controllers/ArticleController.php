<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::allPaginate(12);
        return view('app.article.index', compact('articles'));
    }
}
