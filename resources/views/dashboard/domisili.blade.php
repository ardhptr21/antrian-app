@extends('layout.dashboard', ['title' => 'Kelola Domisili'])

@section('content')
<x-dashboard.title title="Dashboard Domisili" description="Kelola keterkaitan domisili seperti Desa, RT, dan RW" />

<div class="flex justify-center gap-5">
    <div class="w-full">
        <div class="w-full p-5 bg-white rounded-lg">
            <h2 class="text-2xl font-bold text-indigo-500">Tambah Desa</h2>
            <form method="POST" action="{{ route('village:store') }}">
                @csrf
                <x-forms.input type="text" name="village_name" placeholder="Masukkan nama desa"
                    error="{{ $errors->first('village_name') }}" />
                <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
                </x-buttons.primary>
            </form>
        </div>

        @if(session('error_store'))
        <x-alert.error>{{ session('error_store') }}</x-alert.error>
        @elseif (session('success_store'))
        <x-alert.success>{{ session('success_store') }}</x-alert.success>
        @endif
    </div>
    <div class="w-full">
        <div class="w-full h-48 p-5 overflow-y-auto bg-indigo-100 rounded-lg shadow-inner">
            <h2 class="text-2xl font-bold text-indigo-500">Semua Desa</h2>
            @if($villages->isNotEmpty())
            <ul class="mt-5 space-y-5">
                @foreach ($villages as $village)
                <form action="{{ route('village:remove', ['village' => $village->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-card.list>Desa {{ $village->name }}</x-card.list>
                </form>
                @endforeach
            </ul>
            @else
            <div class="p-5 mt-5 rounded-md shadow-inner bg-indigo-50">
                Maaf, tidak ada desa yang tersedia untuk sekarang
            </div>
            @endif
        </div>

        @if(session('error_remove'))
        <x-alert.error>{{ session('error_remove') }}</x-alert.error>
        @elseif (session('success_remove'))
        <x-alert.success>{{ session('success_remove') }}</x-alert.success>
        @endif
    </div>
</div>

@if ($villages->isNotEmpty())
<div class="flex justify-center gap-5 mt-5">
    <div class="w-full p-5 bg-white rounded-lg">
        <h2 class="text-2xl font-bold text-indigo-500">Tambah RT/RW</h2>

        <div class="grid grid-cols-2 gap-5">
            <form method="POST" action="{{ route('neighbourhood:store') }}">
                @csrf
                <x-forms.select name="village_id" label="Pilih desa untuk RT" placeholder="PILIH DESA"
                    error="{{ $errors->first('village_id') }}">
                    @foreach ($villages as $village)
                    <option value="{{ $village->id }}" @selected(Request::get('village')==$village->id)>Desa {{
                        $village->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.input type="number" name="neighbourhood" label="RT" placeholder="RT"
                    error="{{ $errors->first('neighbourhood') }}" />
                <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
                </x-buttons.primary>

                @if (session('neighbourhood_error_store'))
                <x-alert.error>{{ session('neighbourhood_error_store') }}</x-alert.error>
                @elseif(session('neighbourhood_success_store'))
                <x-alert.success>{{ session('neighbourhood_success_store') }}</x-alert.success>
                @endif
            </form>
            <form method="POST" action="{{ route('hamlet:store') }}">
                @csrf
                <x-forms.select name="village_id" label="Pilih desa untukk RW" placeholder="PILIH DESA"
                    error="{{ $errors->first('village_id') }}">
                    @foreach ($villages as $village)
                    <option value="{{ $village->id }}" @selected(Request::get('village')==$village->id)>Desa {{
                        $village->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.input type="number" name="hamlet" label="RW" placeholder="RW"
                    error="{{ $errors->first('hamlet') }}" />
                <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
                </x-buttons.primary>
                @if (session('hamlet_error_store'))
                <x-alert.error>{{ session('hamlet_error_store') }}</x-alert.error>
                @elseif(session('hamlet_success_store'))
                <x-alert.success>{{ session('hamlet_success_store') }}</x-alert.success>
                @endif
            </form>
        </div>
    </div>
    <div class="w-full p-5 overflow-y-auto bg-indigo-100 rounded-lg shadow-inner h-80">
        <x-forms.select name="village_selection" placeholder="PILIH DESA" class="mb-3">
            @foreach ($villages as $village)
            <option value="{{ $village->id }}" @selected(Request::get('village')==$village->id)>Desa {{ $village->name
                }}</option>
            @endforeach
        </x-forms.select>

        @isset($village_selected)
        <h2 class="text-2xl font-bold text-indigo-500">RT/RW {{ $village_selected->name }}</h2>
        <ul class="grid grid-cols-2 gap-5 mt-5">
            <div class="space-y-5">
                <h3 class="font-bold">RT</h3>
                @if($village_selected->neighbourhoods->isNotEmpty())
                @foreach ($village_selected->neighbourhoods as $neighbourhood )
                <form action="{{ route('neighbourhood:remove', ['neighbourhood' => $neighbourhood->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <x-card.list>{{ $neighbourhood->value }}</x-card.list>
                </form>
                @endforeach
                @else
                <div class="p-5 mt-5 rounded-md shadow-inner bg-indigo-50">
                    Maaf, tidak ada data RT yang tersedia
                </div>
                @endif
            </div>

            <div class="space-y-5">
                <h3 class="font-bold">RW</h3>
                @if ($village_selected->hamlets->isNotEmpty())
                @foreach ($village_selected->hamlets as $hamlet)
                <form action="{{ route('hamlet:remove', ['hamlet' => $hamlet->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-card.list>{{ $hamlet->value }}</x-card.list>
                </form>
                @endforeach
                @else
                <div class="p-5 mt-5 rounded-md shadow-inner bg-indigo-50">
                    Maaf, tidak ada data RW yang tersedia
                </div>
                @endif
            </div>
        </ul>
        @else
        <div class="p-5 mt-5 rounded-md shadow-inner bg-indigo-50">
            Maaf, anda belum memilih desa
        </div>
        @endisset
    </div>
</div>
@endif
@endsection
