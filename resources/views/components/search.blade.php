<form class="flex max-w-full mx-auto mt-5" method="GET" action="{{ route('movies.index', request()->all()) }}">
    <div class="relative w-full">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input name="search" type="search" id="default-search" value="{{ request('search') }}"
            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search" />
    </div>
    <!-- Director Filter -->
    <input name="director" type="text" value="{{ request('director') }}" class="input" placeholder="Director">
    <!-- Year Filter -->
    <input name="year" type="number" value="{{ request('year') }}" class="input" placeholder="Year">

    <!-- Genre Dropdown -->
    <div>
        <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox"
            class="inline-flex items-center px-5 py-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Genres <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>
        <div id="dropdownDefaultCheckbox"
            class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                @foreach ($allGenres as $genre)
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" type="checkbox" name="genres[]"
                                value="{{ $genre->id }}"
                                {{ in_array($genre->id, request('genres', [])) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $genre->name }}</label>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <button type="submit" class="submit">Search</button>
</form>
