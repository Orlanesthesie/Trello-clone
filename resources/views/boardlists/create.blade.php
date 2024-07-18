<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Create Board List') }}
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
                    <form action="{{ route('boardlists.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-black font-semibold">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <input type="hidden" name="board_id" value="{{ $board_id }}">
                        <button type="submit" class="bg-rose text-white px-4 py-2 rounded-md shadow-md">
                            Create
                        </button>
                    </form>
                    <button class="bg-orange text-white px-4 py-2 rounded-md shadow-md mt-2">
                        <a href="{{ route('boards.index') }}">Back to list</a></button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
