<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новости из источника: '). $source->title }}
        </h2>
    </x-slot>

    <x-content-body>
        <p>Новости из источника {{ $source->id }}:</p>
        <h1 class="text-3xl mb-4"> {{ $source->title }}</h1>

        <div>
            @forelse ($news as $newsItem)
                <li><a href="{{ route('news.show', ['news' => $newsItem]) }}">
                        {{ $newsItem->title }}</a></li>
            @empty
                У данного источника пока нет новостей.
            @endforelse

        </div>
    </x-content-body>

</x-app-layout>

