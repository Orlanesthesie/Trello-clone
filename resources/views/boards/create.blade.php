<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Create Board') }}
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
                    <form action="{{ route('boards.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-black font-semibold">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md ">
                        </div>
                        <div>
                            <label for="description" class="block text-black font-semibold">Description:</label>
                            <textarea name="description" id="description" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="bg-rose text-white px-4 py-2 rounded-md">
                            Create
                        </button>
                    </form>
                    <button class="bg-orange text-white px-4 py-2 rounded-md shadow-md mt-2"> 
                        <a href="{{ route('boards.index') }}">Back to list</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
