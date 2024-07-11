<!-- resources/views/boards/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Board Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-jaune">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blanc overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('boardlists.create', ['board_id' => $board->id]) }}" class="inline-flex items-center px-4 py-2 bg-vert text-white font-semibold text-xs uppercase tracking-widest rounded-lg shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                        Create New List
                    </a>
                    <h3 class="text-2xl font-bold text-rose">{{ $board->title }}</h3>
                    <p class="mt-4 text-orange">{{ $board->description }}</p>
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('boards.index') }}" class="bg-rose text-white px-4 py-2 rounded-md shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                            Back to boards
                        </a>
                        <a href="{{ route('boards.edit', $board->id) }}" class="bg-peche text-white px-4 py-2 rounded-md shadow-md hover:bg-peche-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-peche">
                            Edit
                        </a>
                        
                        <form action="{{ route('boards.destroy', $board->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

