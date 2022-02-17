<div class="{{ $class }}">
    <label class="text-gray-800 font-semibold block my-3 text-md" for="{{ $name }}">{{ $label }}</label>
    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $attributes }} />
    {{ $slot }}
</div>
