@extends('layout.base', ['title' => 'Cetak Antrian'])

@section('content')
<x-section class="h-screen bg-indigo-100 flex justify-center items-center">
    <div class="lg:w-2/5 md:w-1/2 w-2/3">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg text-center">
            <div class="bg-indigo-500">
                <h1 class="py-5 uppercase font-semibold text-white">Nomor Antrian</h1>
            </div>
            <div class="p-8 md:p-10 space-y-5">
                <h2 class="text-8xl text-indigo-500">01</h2>
                <div class="space-y-1">
                    <p class="font-bold text-xl">Ardhi Putra</p>
                    <p class="font-bold text-lg text-indigo-500">Sinovac</p>
                    <p class="text-sm md:text-base">12 Januari 2021 - 13:00</p>
                </div>
                <small class="inline-block text-xs md:text-sm text-gray-400">*Berlaku selama periode tanggal antrian
                    dibuat</small>
            </div>
        </div>

        <div class="mt-5 space-y-3 text-center text-sm no-print">
            <p class="text-sm md:text-base">Mohon untuk dapat melakukan <span
                    class="font-bold text-indigo-500">screenshot</span> nomor antrian anda atau anda juga
                dapat <span class="font-bold text-indigo-500">mencetaknya</span>!</p>
            <x-Buttons.primary class="w-full bg-indigo-500 text-white hover:bg-indigo-400" type="button"
                id="print-trigger">Cetak
            </x-Buttons.primary>
        </div>
    </div>

</x-section>
@endsection
