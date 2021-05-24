<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hello GB!') }}
        </h2>
    </x-slot>

    <x-content-body>
        <h1>Hello GB!</h1>
        <p>возраст: {{$age}}</p>

    </x-content-body>

</x-app-layout>
