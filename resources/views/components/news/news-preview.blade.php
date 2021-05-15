@props(['news', 'k'])

<div class="bg-white shadow-sm rounded-lg p-6 mt-6 ">

    <p class="px-2 py-1 rounded-md bg-gray-200 text-gray-700 font-semibold"><span class="text-xs">Категория: </span> {{ $news->category->title }}</p>
    <p class="mt-4">{{ $k }}. <a href="{{ route('news.show', ['news' => $news]) }}">{{ $news->title }}</a></p>
    <p class="mt-4 text-xs text-gray-500">{{ $news->created_at->format('d.m.Y') }}</p>
</div>

