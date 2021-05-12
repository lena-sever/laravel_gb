<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get();
        return view('news.index', [
            'news' => $news,
                'i' => 0
            ]
        );
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

}
