@extends('layout.base')

@section('content')
<x-section class="flex items-center justify-center min-h-screen bg-indigo-100">
    <div class="w-full lg:w-2/5 md:w-1/2">
        <form class="min-w-full p-10 bg-white rounded-lg shadow-lg" method="POST" action="{{ route('queue:store') }}">
            @csrf
            <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600">Ambil Antrian</h1>

            <x-forms.select name="village" label="Desa" placeholder="DESA ANDA" error="{{ $errors->first('village') }}">
                @foreach ($villages as $village)
                @if ($village->neighbourhoods->isNotEmpty() && $village->hamlets->isNotEmpty())
                <option value="{{ $village->name }}" data-id="{{ $village->id }}" @selected(Request::get('village')==$village->id)>{{ $village->name }}</option>
                @endif
                @endforeach
            </x-forms.select>

            <x-forms.input name="name" label="Nama" type="text" placeholder="Masukkan nama anda" autocomplete="off" error="{{ $errors->first('name') }}" />
            <x-forms.input name="age" label="Umur" type="number" placeholder="Masukkan umur anda" error="{{ $errors->first('age') }}" />
            <x-forms.input name="nik" label="NIK" type="text" placeholder="Masukkan NIK anda" error="{{ $errors->first('nik') }}" autocomplete="off" />


            @if ($village_selected)
            <x-forms.select name="hamlet" label="RW" label="RW" placeholder="RW ANDA" error="{{ $errors->first('hamlet') }}">
                @foreach ($village_selected->hamlets as $hamlet )
                <option value="{{ $hamlet->value }}">{{ $hamlet->value }}</option>
                @endforeach
            </x-forms.select>

            <x-forms.select name="neighbourhood" label="RT" placeholder="RT ANDA" error="{{ $errors->first('neighbourhood') }}">
                @foreach ($village_selected->neighbourhoods as $neighbourhood )
                <option value="{{ $neighbourhood->value }}">{{ $neighbourhood->value }}</option>
                @endforeach
            </x-forms.select>
            @endif

            <x-forms.select name="vaccine" label="Model Vaksin" placeholder="VAKSIN ANDA" error="{{ $errors->first('vaccine') }}">
                @foreach ($vaccines as $vaccine)
                <option value="{{ $vaccine->name }}">{{ $vaccine->name }}</option>
                @endforeach
            </x-forms.select>

            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Ambil
            </x-buttons.primary>

            @if (session('queue_error_store'))
                <x-alert.error>{{ session('queue_error_store') }}</x-alert.error>
            @endif
        </form>
    </div>
</x-section>
@endsection
