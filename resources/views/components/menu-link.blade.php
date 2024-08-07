<li>
    <a {{ $attributes }}
        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group {{ $active ? 'bg-blue-100' : '' }}">
        {{ $slot }}
    </a>
</li>
