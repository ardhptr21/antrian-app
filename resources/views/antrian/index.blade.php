@extends('layout.base')

@section('content')
<x-section class="h-screen bg-indigo-100 flex justify-center items-center">
    <div class="lg:w-2/5 md:w-1/2 w-2/3">
        <form class="bg-white p-10 rounded-lg shadow-lg min-w-full">
            <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Ambil Antrian</h1>
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

            <x-Buttons.primary type="submit" class="bg-indigo-500 hover:bg-indigo-400 text-white">Ambil
            </x-Buttons.primary>
        </form>
    </div>
</x-section>
@endsection
