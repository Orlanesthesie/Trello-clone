<!-- resources/views/boards/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('boards.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description:</label>
                            <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md">Create</button>
                    </form>
                    <a href="{{ route('boards.index') }}" class="text-blue-500 mt-4 inline-block">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
