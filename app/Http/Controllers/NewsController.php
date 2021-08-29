<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{

        public function index()
    {
        $news = News::checkAuthenticated()->with('category')->get();
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
        $sources = Source::all();
        return view('news.create', compact('categories', 'sources'));
    }

    public function store(StoreNewsRequest $request)
    {
        \Log::info('Calling store method in the controller');
        try {
            News::create($request->validated());
        } catch (NewsSendMailCreateNewNews $e) {
            return redirect()->back()->with('warning', 'Ошибка при добавлении новости!');
        }

        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена!');

    }

    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('news.edit', compact('news', 'categories', 'sources'));
    }

    public function update(News $news, UpdateNewsRequest $request)
    {
        $news->update($request->validated());
        return redirect()->route('news.index')->with('success', 'Новость успешно обновлена');
    }

    public function delete(News $news)
    {
        $news->delete($news);
        return redirect()->route('news.index')->with('success', 'Новость успешно удалена');
    }

}
