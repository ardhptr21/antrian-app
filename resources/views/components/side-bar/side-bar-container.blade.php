<aside class="w-1/4 px-10 py-12">
    <div class="flex items-center pb-4 border-b-2 space-2">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-500 w-14 h-14" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
            </svg>
        </div>
        <div class="ml-3">
            <h1 class="text-3xl font-bold text-indigo-500">ADMIN</h1>
            <p class="mt-1 font-serif text-sm text-center text-indigo-500">DASHBOARD</p>
        </div>
    </div>
    <div class="mt-8">
        {{ $slot }}
    </div>
</aside>
