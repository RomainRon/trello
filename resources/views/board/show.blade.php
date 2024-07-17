<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau: ') . $board->title }}
            <p class="text-gray-600">{{ $board->description }}</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <a href="{{ route('boards.lists.create', $board->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Créer une liste') }}
            </a>
        </div>
    </div>
</x-app-layout>
