<!-- resources/views/boardlist/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board Lists') }}
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

                    <a href="{{ route('boardlists.create',$boardlist->id) }}" class="bg-rose text-white px-4 py-2 rounded-md shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                        Create New Board List
                    </a>

                    <ul class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($boardlists as $boardlist)
                            <li class="max-w-sm p-6 bg-blanc border-gray-200 rounded-lg shadow m-5">
                                <a href="{{ route('boardlists.show', $boardlist->id) }}" class="text-blue-500">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-rose">{{ $boardlist->name }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-orange">{{ $boardlist->description }}</p>
                                <a href="{{ route('boardlists.edit', $boardlist->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-peche rounded-lg">
                                    Edit
                                </a>
                                <form action="{{ route('boardlists.destroy', $boardlist->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-2 text-red-500">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
