<x-admin-layout>
    <section class="bg-white dark:bg-gray-900 border border-gray-200">
        <div class="py-8 mb-4` px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">Edit Episode</h2>
            <form action="{{ route('admin.edit.episodes', $episode->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    {{-- <div class="sm:cool-span-2">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                    </div> --}}
                    <div>
                        <label for="title" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Episode
                            Name</label>
                        <input type="number" name="episode_name" id="episode_name"
                            class="@error('episode_name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tuliskan angka episode" autocomplete="off"
                            value="{{ $episode->episode_name }}">
                        @error('episode_name')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="anime"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Anime</label>
                        <select id="anime" name="anime"
                            class="@error('anime') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 xs:text-xs md:text-sm lg:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="" disabled class="text-xs">Select Anime</option>
                            @foreach ($animes as $anime)
                                <option value="{{ $anime->id }}" class="text-xs"
                                    {{ $episode->anime_id == $anime->id ? 'selected' : '' }}>{{ $anime->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('anime')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image
                            Thumbnail</label>
                        <input type="file" name="image" id="image"
                            class="@error('image') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="video">Video</label>
                        <input type="file" name="video" id="video" accept="video/*"
                            class="@error('video') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-xs text-red-600 mt-1">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Edit Episode
                </button>
            </form>
        </div>
    </section>
</x-admin-layout>
