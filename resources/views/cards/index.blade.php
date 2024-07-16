<!-- resources/views/cards/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($cards) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($cards as $card)
                                <div class="max-w-sm p-6 bg-gray-100 border border-gray-200 rounded-lg shadow">
                                    <a href="{{ route('cards.show', $card->id) }}" class="text-blue-500">
                                        <h5 class="mb-2 text-xl font-semibold">{{ $card->title }}</h5>
                                    </a>
                                    <p class="text-gray-600">{{ $card->description }}</p>
                                    <div class="flex justify-end mt-4">
                                        <a href="{{ route('cards.edit', $card->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            Edit
                                        </a>
                                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST" class="ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
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
                        <a href="{{ route('boards.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Back to Boards
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
