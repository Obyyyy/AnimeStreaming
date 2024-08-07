<x-admin-layout>
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div
            class="border-2 rounded-lg h-48 md:h-72 flex items-center justify-center bg-blue-100 border-blue-300 dark:border-blue-600 shadow-lg">
            <div class="text-center">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-8 h-8 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" stroke-width="2"
                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-blue-800">Admins</h2>
                <p class="text-4xl font-bold text-blue-600">{{ $adminCount }}</p>
            </div>
        </div>
        <div
            class="border-2 rounded-lg h-48 md:h-72 flex items-center justify-center bg-green-100 border-green-300 dark:border-green-600 shadow-lg">
            <div class="text-center">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-8 h-8 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" stroke-width="1"
                            d="M19.003 3A2 2 0 0 1 21 5v2h-2V5.414L17.414 7h-2.828l2-2h-2.172l-2 2H9.586l2-2H9.414l-2 2H3V5a2 2 0 0 1 2-2h14.003ZM3 9v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Zm2-2.414L6.586 5H5v1.586Zm4.553 4.52a1 1 0 0 1 1.047.094l4 3a1 1 0 0 1 0 1.6l-4 3A1 1 0 0 1 9 18v-6a1 1 0 0 1 .553-.894Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-green-800">Animes</h2>
                <p class="text-4xl font-bold text-green-600">{{ $animeCount }}</p>
            </div>
        </div>
        <div
            class="border-2 rounded-lg h-48 md:h-72 flex items-center justify-center bg-yellow-100 border-yellow-300 dark:border-yellow-600 shadow-lg">
            <div class="text-center">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-8 h-8 text-yellow-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-yellow-800">Genres</h2>
                <p class="text-4xl font-bold text-yellow-600">{{ $genreCount }}</p>
            </div>
        </div>
        <div
            class="border-2 rounded-lg h-48 md:h-72 flex items-center justify-center bg-red-100 border-red-300 dark:border-red-600 shadow-lg">
            <div class="text-center">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-8 h-8 text-red-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-red-800">Episodes</h2>
                <p class="text-4xl font-bold text-red-600">{{ $episodeCount }}</p>
            </div>
        </div>
    </div>
</x-admin-layout>
