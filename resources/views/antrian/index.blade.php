@extends('layout.base')

@section('content')
<x-section class="flex items-center justify-center h-screen bg-indigo-100">
    <div class="w-2/3 lg:w-2/5 md:w-1/2">
        <form class="min-w-full p-10 bg-white rounded-lg shadow-lg">
            <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600">Ambil Antrian</h1>
            <x-forms.input name="nama" label="Nama" type="text" placeholder="Masukkan nama anda" autocomplete="off" />
            <x-forms.input name="umur" label="Umur" type="number" placeholder="Masukkan umur anda" />

            <x-forms.select name="rt" label="RT" placeholder="PILIH RT ANDA">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </x-forms.select>

            <x-forms.select name="rw" label="RW" label="RW" placeholder="PILIH RW ANDA">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </x-forms.select>

            <x-forms.select name="vaksin" label="Model Vaksin" label="RW" placeholder="PILIH JENIS VAKSIN ANDA">
                <option>Sinovac</option>
                <option>Moderna</option>
                <option>AstraZaneca</option>
            </x-forms.select>

            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Ambil
            </x-buttons.primary>
        </form>
    </div>
</x-section>
@endsection
