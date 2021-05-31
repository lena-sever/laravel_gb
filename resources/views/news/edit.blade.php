<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Редактирование новости:</h2>
            <p>{{ $news->title  }} </p>
        </h2>
    </x-slot>

    <x-content-body>
        <div class="my-8">
            <x-auth-validation-errors :errors="$errors"/>
        </div>

        <div class="max-w-5xl">
            <form method="POST" action="{{ route('news.update', ['news' => $news]) }}">
            @csrf

                <div>
                    <x-label for="title" :value="__('Title')" />

                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$news->title" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="description" :value="__('Description')" />

                    <textarea id="description" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  name="description" cols="50" rows="10"  required >
                        {{ $news->description }}
                    </textarea>
                </div>

                <div class="mt-4">
                    <x-label for="category_id" :value="__('Category')" />

                    <select name="category_id" id="category_id" class="min-w-min max-w-md rounded-md my-3 shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $news->category_id) selected @endif >
                                {{ $category->title }}</option>
                        @endforeach
                    </select>


                    <x-label for="source_id" :value="__('Source')" />
                    <select name="source_id" id="source_id" class="min-w-min max-w-md rounded-md my-3 shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}" @if ($source->id == $news->source_id) selected @endif>{{ $source->title }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mt-4">
                    <x-button>
                        Изменить
                    </x-button>
                </div>
            </form>
        </div>
    </x-content-body>
</x-app-layout>
