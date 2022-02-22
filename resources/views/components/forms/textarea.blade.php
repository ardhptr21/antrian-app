<div class="{{ $class }}">
    @isset ($label)
    <label class="block my-3 font-semibold text-gray-800 text-md" for="{{ $name }}">{{ $label }}</label>
    @endif
    <textarea class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none" type="{{ $type }}" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes }}>{{ $value }}</textarea>
    {{ $slot }}

    @if($error)
    <p class="mt-2 text-red-500">
        * {{ $error }}
    </p>
    @endif
</div>
