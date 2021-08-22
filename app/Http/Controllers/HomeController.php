<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $articles = Article::with('state', 'tags')->orderBy('created_at', 'desc')->take(6)->get();
        // take() == limit()
        // with - жадный запрос (сразу забираем все связанные данные)
        // после вынесения логики в scope (@scopeLastLimit)
        $articles = Article::lastLimit(6);
        return view('app.home', compact('articles'));
    }
}
