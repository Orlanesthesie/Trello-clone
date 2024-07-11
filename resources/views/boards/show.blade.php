<!-- resources/views/boards/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl">{{ $board->name }}</h3>
                    <p>{{ $board->description }}</p>

                    <a href="{{ route('boards.index') }}" class="text-blue-500 mt-4 inline-block">Back to list</a>
                    <a href="{{ route('boards.edit', $board->id) }}" class="ml-2 text-yellow-500">Edit</a>
                    <form action="{{ route('boards.destroy', $board->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 text-red-500">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
