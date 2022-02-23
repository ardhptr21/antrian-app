@extends('layout.base')

@section('content')
<x-section class="flex items-center justify-center min-h-screen bg-indigo-100">
    <div class="w-full lg:w-2/5 md:w-1/2">
        <form class="min-w-full p-10 bg-white rounded-lg shadow-lg">
            <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600">Ambil Antrian</h1>
            <x-forms.input name="nama" label="Nama" type="text" placeholder="Masukkan nama anda" autocomplete="off" />
            <x-forms.input name="umur" label="Umur" type="number" placeholder="Masukkan umur anda" />

            <x-forms.select name="village" label="Desa" placeholder="DESA ANDA">
                @foreach ($villages as $village)
                @if ($village->neighbourhoods->isNotEmpty() && $village->hamlets->isNotEmpty())
                <option value="{{ $village->id }}" @selected(Request::get('village')==$village->id)>{{ $village->name }}</option>
                @endif
                @endforeach
            </x-forms.select>

            @if ($village_selected)
            <x-forms.select name="hamlet" label="RW" label="RW" placeholder="RW ANDA">
                @foreach ($village_selected->hamlets as $hamlet )
                <option value="{{ $hamlet->id }}">{{ $hamlet->value }}</option>
                @endforeach
            </x-forms.select>

            <x-forms.select name="neighbourhood" label="RT" placeholder="RT ANDA">
                @foreach ($village_selected->neighbourhoods as $neighbourhood )
                <option value="{{ $neighbourhood->id }}">{{ $neighbourhood->value }}</option>
                @endforeach
            </x-forms.select>
            @endif

            <x-forms.select name="vaksin" label="Model Vaksin" placeholder="VAKSIN ANDA">
                @foreach ($vaccines as $vaccine)
                <option value="{{ $vaccine->id }}">{{ $vaccine->name }}</option>
                @endforeach
            </x-forms.select>

            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Ambil
            </x-buttons.primary>
        </form>
    </div>
</x-section>
@endsection
