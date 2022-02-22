<div class="p-5 bg-white rounded-lg shadow-md">
    <div class="space-y-5">
        <h4 class="text-3xl font-bold text-indigo-500">{{ $title }}</h4>
        <p>{{ $description }}</p>
    </div>
    <div class="flex items-center justify-center gap-5">
        {{ $slot }}
    </div>
</div>
