<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index(Source $source)
    {
        $sources = Source::withCount('news')
            ->withAvg('news', 'rating')
            ->get();

        return view('sources.index', compact('sources'));
    }

    public function show(Source $source)
    {
        $news = $source->news()->get();

        return view('sources.show', compact('source', 'news'));
    }
}
