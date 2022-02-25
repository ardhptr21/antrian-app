@extends('layout.base', ['title' => 'Antrian Belum Dibuka'])

@section('content')
    <x-section class="flex items-center justify-center min-h-screen py-48 bg-indigo-100">
        <div class="flex flex-col items-center">
            <div class="mt-10 text-3xl font-bold text-indigo-500 xl:text-7xl lg:text-6xl md:text-5xl">
                Antrian Tutup
            </div>

            <div class="mt-5 text-sm font-medium text-center md:text-xl lg:text-2xl">
                Maaf saat ini antrian masih belum dibuka, coba lagi nanti
            </div>
        </div>
    </x-section>
    </div>
@endsection
