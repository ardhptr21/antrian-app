<li>
    <a href="{{ $to }}"
        class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600"
        hover:text-indigo-600>

        @isset($svg)
        {{ $svg }}
        @endisset

        <span class="ml-4">{{ $slot }}</span>
    </a>
</li>
