<div class="relative flex items-center justify-around w-64 p-6 mt-10 bg-white shadow-lg rounded-xl">
    <div class="text-center">
        <span class="text-sm font-semibold text-gray-400">{{ $title }}</span>
        <h1 class="text-2xl font-bold">{{ $value }}</h1>
    </div>
    @if($slot->isNotEmpty())
    <div class="text-indigo-500">
        {{ $slot }}
    </div>
    @endif
</div>
