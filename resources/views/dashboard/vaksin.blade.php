@extends('layout.dashboard', ['title' => 'Kelola Vaksin'])

@section('content')
<x-dashboard.title title="Dashboard Vaksin" description="Kelola jenis model vaksin yang ada" />

<form>

</form>

<div class="flex justify-center w-full gap-5">
    <div class="w-full p-5 bg-white rounded-md shadow-lg h-max">
        <h2 class="text-2xl font-bold text-indigo-500">Tambah Model Vaksin</h2>
        <form>
            <x-forms.input type="text" name="nama_vaksin" label="Nama Vaksin" placeholder="Masukkan nama vaksin" />
            <x-forms.input type="text" name="deskripsi_vaksin" label="Deskripsi Singkat Vaksin"
                placeholder="Masukkan deskripsi vaksin" />
            <x-buttons.primary type="button" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
            </x-buttons.primary>
        </form>
    </div>
    <div class="flex flex-col gap-5 overflow-y-auto max-h-[28rem] h-max bg-indigo-100 p-3 rounded-lg shadow-inner">
        <x-card.basic title="Moderna"
            description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, qui voluptas! Aut" />

        <x-card.basic title="Sinovac" description="Lorem ipsum dolor sit amet consectetur adipisicing" />
        <x-card.basic title="Zaneca"
            description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, qui" />


    </div>
</div>
@endsection
