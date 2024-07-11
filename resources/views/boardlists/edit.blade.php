<!-- resources/views/boardlist/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Edit Board List') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-jaune">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blanc overflow-hidden shadow-sm sm:rounded-lg">
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

                    <form action="{{ route('boardlist.update', $boardlist->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $boardlist->name) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description:</label>
                            <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $boardlist->description) }}</textarea>
                        </div>
                        <button type="submit" class="bg-peche text-white px-4 py-2 rounded-md shadow-md hover:bg-peche-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-peche">Update</button>
                    </form>

                    <a href="{{ route('boardlist.index') }}" class="text-blue-500 mt-4 inline-block">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
