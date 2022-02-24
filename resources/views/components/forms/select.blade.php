<div class="{{ $class }}">
    @if ($label)
    <label class="block my-3 font-semibold text-gray-800 text-md" for="{{ $name }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none">
        <option hidden selected value="">-- {{ $placeholder }} --</option>
        {{ $slot }}
    </select>

    @if($error)
    <p class="mt-2 text-red-500">
        * {{ $error }}
    </p>
    @endif
</div>
