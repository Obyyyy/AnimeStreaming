<x-admin-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">Edit anime</h2>
            <form action="{{ route('admin.edit.animes', $anime->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anime
                            Title</label>
                        <input type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type anime name" required="" value="{{ $anime->title }}">
                    </div>
                    {{-- <div class="sm:col-span-2">
                        <label for="image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input type="file" name="image" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type anime name" required="">
                    </div> --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Image</label>
                        <input type="file" name="image" id="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="dropdownGenreButton">Genres</label>
                        <button id="dropdownGenreButton" data-dropdown-toggle="dropdownSearch"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                            type="button">Select Genre <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                            <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownGenreButton">
                                @foreach ($genres as $index => $genre)
                                    <li>
                                        <div
                                            class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-{{ $index }}" type="checkbox"
                                                name="genres[]" value="{{ $genre->slug }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                @foreach ($selectedGenres as $selected)
                                                    @if ($selected->slug == $genre->slug)
                                                        checked
                                                    @endif @endforeach>
                                            <label for="checkbox-item-{{ $index }}"
                                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $genre->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div>
                        <label for="type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled>Select type</option>
                            <option {{ $anime->type == 'TV Series' ? 'selected' : '' }} value="TV Series">TV Series
                            </option>
                            <option {{ $anime->type == 'Movie' ? 'selected' : '' }} value="Movie">Movie</option>
                            <option {{ $anime->type == 'OVA' ? 'selected' : '' }} value="OVA">OVA</option>
                        </select>
                    </div>
                    <div>
                        <label for="studios"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Studio</label>
                        <input type="text" name="studios" id="studios"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type studio's name" required="" value="{{ $anime->studios }}">
                    </div>
                    <div>
                        <label for="date_aired"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Aired</label>
                        <input id="date_aired" name="date_aired" datepicker datepicker-autohide type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Select date" value="{{ $date_aired }}">
                    </div>
                    <div>
                        <label for="duration"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration/Eps
                            (Minute)</label>
                        <input type="number" name="duration" id="duration"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type the duration per eps" required="" value="{{ $anime->duration }}">
                    </div>
                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled>Select Status</option>
                            <option {{ $anime->status == 'Ongoing' ? 'selected' : '' }} value="Ongoing">Ongoing
                            </option>
                            <option {{ $anime->status == 'Completed' ? 'selected' : '' }} value="Completed">Completed
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="quality"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quality</label>
                        <select id="quality" name="quality"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled>Select Quality</option>
                            <option {{ $anime->quality == 'HD' ? 'selected' : '' }} value="HD">HD</option>
                            <option {{ $anime->quality == 'BD' ? 'selected' : '' }} value="BD">BD</option>
                            <option {{ $anime->quality == 'Camera' ? 'selected' : '' }} value="Camera">Camera</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="8" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here">{{ $anime->description }}</textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Edit anime
                </button>
            </form>
        </div>
    </section>
</x-admin-layout>
