<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Show Board Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-jaune">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="mb-2 text-5xl font-extrabold tracking-tight rose">{{ $board->title }}</h3>
                        <a href="{{ route('boardlists.create', ['board_id' => $board->id]) }}" class="inline-flex items-center px-4 py-2 bg-vert text-white font-semibold text-xs uppercase tracking-widest rounded-lg">
                            Create New List
                        </a>
                    </div>
                    <hr>
                    <p class="mt-4 text-orange">{{ $board->description }}</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($boardlists as $boardlist)
                            <div class="flex flex-col justify-between max-w-sm p-6 bg-blanc border-gray-200 rounded-lg shadow">
                                <div>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('boardlists.show', $boardlist->id) }}">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ $boardlist->title }}</h5>
                                        </a>
                                        <a href="{{ route('cards.create', $boardlist->id) }}" class="inline-flex items-center px-4 py-2 bg-vert text-white font-semibold text-xs uppercase tracking-widest rounded-lg">
                                            Create New Card
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        @foreach ($boardlist->cards as $card)
                                            <div class="p-4 bg-gray-100 rounded shadow mb-2">
                                                <h5 class="text-sm font-semibold">{{ $card->title }}</h5>
                                                <p class="text-sm">{{ $card->description }}</p>
                                                <div class="flex space-around mt-4">
                                                    <a href="{{ route('cards.edit', $card->id) }}" class="bg-peche text-white px-4 py-2 mr-5 rounded-md">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex space-around mt-4">
                                    <a href="{{ route('boardlists.edit', $boardlist->id) }}" class="bg-peche text-white px-4 py-2 mr-5 rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('boardlists.destroy', $boardlist->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('boards.index') }}" class="bg-rose text-white px-4 py-2 rounded-md">
                            Back to boards
                        </a>
                        <a href="{{ route('boards.edit', $board->id) }}" class="bg-peche text-white px-4 py-2 rounded-md">
                            Edit
                        </a>
                        <form action="{{ route('boards.destroy', $board->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
