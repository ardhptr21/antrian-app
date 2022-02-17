<div class="{{ $class }}">
    <label class="text-gray-800 font-semibold block my-3 text-md" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none">
        <option hidden selected>-- {{ $placeholder }} --</option>
        {{ $slot }}
    </select>
    @isset($addition)
    {{ $addition }}
    @endisset
</div>
