<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Lists') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-jaune">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    <ul class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($boardlists as $boardlist)
                            <li class="max-w-sm p-6 bg-blanc border-gray-200 rounded-lg shadow">
                                <a href="{{ route('boardlists.show', $boardlist->id) }}">
                                    <div class="flex justify-between items-center mb-2">
                                        <h5 class="text-2xl font-bold tracking-tight">{{ $boardlist->title }}</h5>
                                        <p class="text-sm text-gray-600">ID: {{ $boardlist->id }}</p>
                                    </div>
                                    <hr>
                                </a>
                                <div class="flex justify-end mt-4">
                                    <a href="{{ route('boardlists.edit', $boardlist->id) }}" class="bg-peche text-white px-4 py-2 rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('boardlists.destroy', $boardlist->id) }}" method="POST" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-6">
                            <a href="{{ route('boards.index') }}" class="bg-rose text-white px-4 py-2 rounded-md">
                                Back to Boards
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
