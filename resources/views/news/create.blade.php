<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Создание  новой новости
        </h2>
    </x-slot>

    <x-content-body>
        <div class="my-8">
            <x-auth-validation-errors :errors="$errors"/>
        </div>

        <div class="max-w-md">
            <form method="POST" action="{{ route('news.store') }}">
            @csrf

            <!-- Email Address -->
                <div>
                    <x-label for="title" :value="__('Title')" />

                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="description" :value="__('Description')" />

                    <textarea id="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  name="description" cols="50" rows="10" :value="old('description')" required autofocus></textarea>

{{--                    <x-input id="description" class="block mt-1 w-full" type="textarea" name="description" :value="old('description')" required autofocus />--}}
                </div>

                <div class="mt-4">
                    <x-label for="category_id" :value="__('Category')" />

                    <select name="category_id" id="category_id" class="rounded-md my-3 shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>


                    <x-label for="source_id" :value="__('Source')" />
                    <select name="source_id" id="source_id" class="rounded-md my-3 shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}">{{ $source->title }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mt-4">
                    <x-button>
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-content-body>
</x-app-layout>
