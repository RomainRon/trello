<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voici vos tableaux') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($boards->isEmpty())
                        <p>Vous n'avez pas encore créé de tableau.</p>
                    @else
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($boards as $board)
                                <div class="flex items-start py-4 px-6 bg-gray-100 rounded-md shadow-md mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $board->title }}</h3>
                                        <p class="text-sm text-gray-600">{{ $board->description }}</p>
                                    </div>
                                    <div class="ml-4 flex items-center space-x-2">
                                        <a href="{{ route('board.show', $board->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                            Voir en détail
                                        </a>
                                        <a href="{{ route('board.edit', $board->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-sm inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-1 1v7H4a1 1 0 000 2h4v7a1 1 0 002 0v-7h4a1 1 0 100-2h-4V3a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            Éditer
                                        </a>
                                        <form action="{{ route('board.destroy', $board->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="mt-4">
                        <a href="{{ route('board.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                            Créer un nouveau tableau
                        </a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
