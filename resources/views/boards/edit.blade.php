<!-- resources/views/boards/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Edit Board') }}
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

                    <form action="{{ route('boards.update', $board->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="title" class="block text-orange font-semibold">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $board->title) }}" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label for="description" class="block text-orange font-semibold">Description:</label>
                            <textarea name="description" id="description" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-orange-500 focus:border-orange-500">{{ old('description', $board->description) }}</textarea>
                        </div>
                        <button type="submit" class="bg-rose text-white px-4 py-2 rounded-md shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                            Update
                        </button>
                    </form>

                     <button class="bg-orange text-white px-4 py-2 rounded-md shadow-md mt-2"> <a href="{{ route('boards.index') }}">Back to list</a></button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
