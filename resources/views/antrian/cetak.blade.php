@extends('layout.base', ['title' => 'Cetak Antrian'])

@section('content')
<x-section class="flex items-center justify-center h-screen bg-indigo-100">
    <div class="w-2/3 lg:w-2/5 md:w-1/2">
        <div class="overflow-hidden text-center bg-white rounded-lg shadow-lg">
            <div class="bg-indigo-500">
                <h1 class="py-5 font-semibold text-white uppercase">Nomor Antrian</h1>
            </div>
            <div class="p-8 space-y-5 md:p-10">
                <h2 class="text-indigo-500 text-8xl">{{ str_pad($queue->order, 2, '0', STR_PAD_LEFT) }}</h2>
                <div class="space-y-1">
                    <h3 class="text-xl font-bold">{{ $queue->name }}</h3>
                    <h4 class="text-lg font-bold text-indigo-500">{{ $queue->vaccine }}</h4>
                </div>
                <div class="w-full h-1 bg-indigo-100 shadow-inner"></div>
                <div class="mt-10">
                    <p class="text-sm font-medium md:text-base">{{ $queue->village }}, RT {{ $queue->neighbourhood }} RW {{ $queue->hamlet }}</p>
                    <p class="text-xs md:text-sm">{{ $queue->created_at->format('d F Y - h:i') }}</p>
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
