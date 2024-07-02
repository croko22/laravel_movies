<x-layout>
    {{-- * SEARCH FORM --}}
    <x-search :allGenres="$allGenres" />

    {{-- * SUCCESS TOAST --}}
    @if (session('success'))
        <x-toast />
    @endif

    <div class="grid grid-cols-1 gap-3 mt-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($movies as $movie)
            {{-- * MOVIE CARD --}}
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-8 rounded-t-lg" src="/movie.jpeg" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $movie->name }}</h5>
                    </a>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $movie->year }}</p>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $movie->director->name }}</p>
                    <div class="flex items-center">
                        @foreach ($movie->genres as $genre)
                            <span class="pill">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full p-5 text-center text-gray-500 dark:text-gray-400">
                No movies found.
            </div>
        @endforelse
    </div>

    <div class="mt-5">
        {{ $movies->links() }}
    </div>
    </body>
</x-layout>
