<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Cards') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-jaune">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($cards) > 0)
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach ($cards as $card)
                                <div class="max-w-sm p-6 bg-blanc border-gray-200 rounded-lg shadow">
                                    <div class="flex justify-between items-center mb-2">
                                        <h5 class="text-2xl font-bold tracking-tight">{{ $card->title }}</h5>
                                        <p class="text-sm text-gray-600">ID: {{ $card->id }}</p>
                                    </div>
                                        <hr>
                                        <p class="text-gray-600"> {{ $card->description }}</p>

                                    <div class="flex justify-end mt-4">
                                        <a href="{{ route('cards.edit', $card->id) }}" class="bg-peche text-white px-4 py-2 rounded-md">
                                            Edit
                                        </a>
                                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST" class="ml-2">
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
                    @else
                        <p>No cards found.</p>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('boards.index') }}" class="bg-rose text-white px-4 py-2 rounded-md shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                            Back to Boards
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
