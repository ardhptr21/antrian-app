@extends('layout.dashboard', ['title' => 'Kelola Domisili'])

@section('content')
<x-dashboard.title title="Dashboard Domisili" description="Kelola keterkaitan domisili seperti Desa, RT, dan RW" />

<div class="flex justify-center gap-5">
    <div class="w-full p-5 bg-white rounded-lg">
        <h2 class="text-2xl font-bold text-indigo-500">Tambah Desa</h2>
        <form>
            <x-forms.input type="text" name="desa1" placeholder="Masukkan nama desa" />
            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
            </x-buttons.primary>
        </form>
    </div>
    <div class="w-full h-48 p-5 overflow-y-auto bg-indigo-100 rounded-lg shadow-inner">
        <h2 class="text-2xl font-bold text-indigo-500">Semua Desa</h2>
        <ul class="mt-5 space-y-5">
            <x-card.list>Desa Sasak</x-card.list>
            <x-card.list>Desa Segrumung</x-card.list>
            <x-card.list>Desa Selamet</x-card.list>
            <x-card.list>Desa Jatisari</x-card.list>
        </ul>
    </div>
</div>

<div class="flex justify-center gap-5 mt-5">
    <div class="w-full p-5 bg-white rounded-lg">
        <h2 class="text-2xl font-bold text-indigo-500">Tambah RT/RW</h2>
        <form>
            <x-forms.select name="desa2" label="Pilih Desa Terkait" placeholder="PILIH DESA">
                <option selected>Desa Sasak</option>
                <option>Desa Segrumung</option>
                <option>Desa Selamet</option>
                <option>Desa Jatisari</option>
            </x-forms.select>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-forms.input type="number" name="rt" label="RT" placeholder="RT" />
                    <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
                    </x-buttons.primary>
                </div>
                <div>
                    <x-forms.input type="number" name="rw" label="RW" placeholder="RW" />
                    <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Tambah
                    </x-buttons.primary>
                </div>
            </div>
        </form>
    </div>
    <div class="w-full p-5 overflow-y-auto bg-indigo-100 rounded-lg shadow-inner h-80">
        <h2 class="text-2xl font-bold text-indigo-500">RT/RW Desa Sasak</h2>
        <ul class="grid grid-cols-2 gap-5 mt-5">
            <div class="space-y-5">
                <h3 class="font-bold">RT</h3>
                <x-card.list>1</x-card.list>
                <x-card.list>2</x-card.list>
                <x-card.list>3</x-card.list>
                <x-card.list>4</x-card.list>
            </div>
            <div class="space-y-5">
                <h3 class="font-bold">RW</h3>
                <x-card.list>1</x-card.list>
                <x-card.list>2</x-card.list>
                <x-card.list>3</x-card.list>
            </div>
        </ul>
    </div>
</div>

@endsection
