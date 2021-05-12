<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все категории ') }}
        </h2>
    </x-slot>

    <x-content-body>
        @if ($category->isNotEmpty())
            <ul>
                @foreach ($category as $catItem)
                    <li><a href="{{ route('cat.show', ['category' => $catItem]) }}"> {{ $catItem->title }}</a></li>
                @endforeach
            </ul>
        @else
            категорий нет
        @endif

    </x-content-body>

</x-app-layout>


