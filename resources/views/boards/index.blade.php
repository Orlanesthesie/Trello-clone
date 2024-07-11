<!-- resources/views/boards/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blanc leading-tight">
            {{ __('Boards') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-jaune">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blanc overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('boards.create') }}" class="inline-flex items-center px-4 py-2 bg-vert text-white font-semibold text-xs uppercase tracking-widest rounded-lg shadow-md hover:bg-rose-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose">
                        Create New Board
                    </a>

                    <ul class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($boards as $board)
                            <li class="max-w-sm p-6 bg-white border-gray-200 rounded-lg shadow m-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight rose">{{ $board->title }}</h5>
                                <p class="mb-3 font-normal text-orange">{{ $board->description }}</p>
                                <a href="{{ route('boards.show', $board->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange rounded-lg">
                                    Show
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                                <a href="{{ route('boards.edit', $board->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-peche rounded-lg">
                                    Edit
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                                <form action="{{ route('boards.destroy', $board->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-rose rounded-lg">
                                        Delete 
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
