<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\NewsShowRequest;
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

    public function show(News $news) // NewsShowRequest $request (если поставить в параметры, будет валидировать, но ссылки не работают)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(StoreNewsRequest $request)
    {
        News::create($request->validated());

        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
    }


}
