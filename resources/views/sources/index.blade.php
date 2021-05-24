<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все источники новостей ') }}
        </h2>
    </x-slot>

    <x-content-body>
        @if ($sources->isNotEmpty())
            <ul>
                @foreach ($sources as $source)
                    <li>{{ $source->id }}. <a href="{{ route('sources.show', ['source' => $source]) }}"> {{ $source->title }}
                            | Новостей: {{ $source->news_count }}
                            | Средний рейтинг: {{ number_format($source->news_avg_rating, 1) }}
                        </a></li>
                @endforeach
            </ul>
        @else
            категорий нет
        @endif

    </x-content-body>

</x-app-layout>


