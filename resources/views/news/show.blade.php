<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр новости '. $news->title ) }}
        </h2>
    </x-slot>

    <x-content-body>
        @foreach ($news as $newsItem)
            <h1>{{ $news->title }}</h1>
            <p>{{ $news->description }}</p>
        @endforeach
    </x-content-body>

</x-app-layout>

