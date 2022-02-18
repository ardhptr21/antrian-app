@extends('layout.base', ['title' => 'Cetak Antrian'])

@section('content')
<x-section class="flex items-center justify-center h-screen bg-indigo-100">
    <div class="w-2/3 lg:w-2/5 md:w-1/2">
        <div class="overflow-hidden text-center bg-white rounded-lg shadow-lg">
            <div class="bg-indigo-500">
                <h1 class="py-5 font-semibold text-white uppercase">Nomor Antrian</h1>
            </div>
            <div class="p-8 space-y-5 md:p-10">
                <h2 class="text-indigo-500 text-8xl">01</h2>
                <div class="space-y-1">
                    <p class="text-xl font-bold">Ardhi Putra</p>
                    <p class="text-lg font-bold text-indigo-500">Sinovac</p>
                    <p class="text-sm md:text-base">12 Januari 2021 - 13:00</p>
                </div>
                <small class="inline-block text-xs text-gray-400 md:text-sm">*Berlaku selama periode tanggal antrian
                    dibuat</small>
            </div>
        </div>

        <div class="mt-5 space-y-3 text-sm text-center no-print">
            <p class="text-sm md:text-base">Mohon untuk dapat melakukan <span
                    class="font-bold text-indigo-500">screenshot</span> nomor antrian anda atau anda juga
                dapat <span class="font-bold text-indigo-500">mencetaknya</span>!</p>
            <x-buttons.primary class="w-full text-white bg-indigo-500 hover:bg-indigo-400" type="button"
                id="print-trigger">Cetak
            </x-buttons.primary>
        </div>
    </div>

</x-section>
@endsection
