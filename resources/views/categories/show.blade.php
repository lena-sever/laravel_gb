<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новости категории: '). $category->title }}
        </h2>
    </x-slot>

    <x-content-body>
        <p>Новости категории {{ $category->id }}:</p>
        <h1> {{ $category->title }}</h1>

        <div>
            @forelse ($news as $newsItem)
                <li><a href="{{ route('news.show', ['news' => $newsItem]) }}">{{ $newsItem->title }}</a></li>
            @empty
                у данной категории нет новостей
            @endforelse

        </div>
    </x-content-body>

</x-app-layout>

