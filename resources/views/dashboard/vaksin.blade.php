@extends('layout.dashboard', ['title' => 'Kelola Vaksin'])

@section('content')
<x-dashboard.title title="Dashboard Vaksin" description="Kelola jenis model vaksin yang ada" />

<form>

</form>

<div class="flex justify-center w-full gap-5">
    <div class="w-full p-5 bg-white rounded-md shadow-lg h-max" style="flex: 1.5">
        <h2 class="text-2xl font-bold text-indigo-500">{{ $vaccine ? 'Ubah' : 'Tambah' }} Model Vaksin</h2>
        <form action="{{ $vaccine ? route('vaccine:update', ['vaccine' => $vaccine->id]) : route('vaccine:store') }}"
            method="POST">
            @csrf
            @if ($vaccine)
            @method('PUT')
            @endif
            <x-forms.input type="text" name="vaccine_name" label="Nama Vaksin" placeholder="Masukkan nama vaksin"
                error="{{ $errors->first('vaccine_name') }}" autocomplete="off"
                value="{{ (old('vaccine_name') ? old('vaccine_name') : ($vaccine ? $vaccine->name : '')) }}" />

            <x-forms.textarea type="text" name="vaccine_description" label="Deskripsi Singkat Vaksin"
                error="{{ $errors->first('vaccine_description') }}" autocomplete="off"
                value="{{ (old('vaccine_description') ? old('vaccine_description') : ($vaccine ? $vaccine->description : '')) }}"
                rows="8" />

            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">{{ $vaccine ? 'Ubah' :
                'Tambah' }}
            </x-buttons.primary>

            @if (session('vaccine_success_store'))
            <x-alert.success>{{ session('vaccine_success_store') }}</x-alert.success>
            @elseif (session('vaccine_error_store'))
            <x-alert.error>{{ session('vaccine_error_store') }}</x-alert.error>
            @endif
        </form>
    </div>
    <div class="w-full" style="flex: 1">
        <div
            class="flex flex-col w-full gap-5 p-3 overflow-y-auto bg-indigo-100 rounded-lg shadow-inner max-h-96 h-max">
            @forelse ($vaccines as $vaccine)
            <x-card.basic title="{{ $vaccine->name }}" description="{{ $vaccine->description }}">
                <form action="{{ route('vaccine:remove', ['vaccine' => $vaccine->id]) }}" method="POST" class="w-full">
                    @csrf
                    @method('DELETE')
                    <x-buttons.primary class="text-white bg-red-500 hover:bg-red-400" type="submit"
                        onclick="return confirm('Yakin ingin menghapus ini?')">Hapus
                    </x-buttons.primary>
                </form>
                <a href="/dashboard/vaksin?edit={{ $vaccine->id }}" class="inline-block w-full">
                    <x-buttons.primary class="text-white bg-yellow-500 hover:bg-yellow-400" type="button">
                        Edit
                    </x-buttons.primary>
                </a>
            </x-card.basic>
            @empty
            <p>Maaf, vaksin tidak tersedia saat ini</p>
            @endforelse
        </div>
        @if (session('vaccine_success_remove'))
        <x-alert.success>{{ session('vaccine_success_remove') }}</x-alert.success>
        @elseif (session('vaccine_error_remove'))
        <x-alert.error>{{ session('vaccine_error_remove') }}</x-alert.error>
        @endif
    </div>

</div>
@endsection
