@extends('layout.dashboard', ['title' => 'Aktivitas'])

@section('content')
    <x-dashboard.title title="Dashboard Aktivitas" description="Kelola aktivitas antrian vaksin" />

    @if (session('activity_store_success'))
        <div class="mb-5">
            <x-alert.success> {{ session('activity_store_success') }} </x-alert.success>
        </div>
    @elseif (session('activity_store_error'))
        <div class="mb-5">
            <x-alert.error> {{ session('activity_store_error') }} </x-alert.error>
        </div>
    @endif

    @if (!$activity)
        <x-alert.info>Antrian untuk hari ini belum dibuat, silahkan buat aktivitas antrian</x-alert.info>
        <form class="p-5 mx-auto mt-5 bg-white rounded-lg shadow-lg w-96" method="POST"
            action="{{ route('activity:store') }}">
            @csrf
            <h4 class="text-2xl font-bold text-center text-indigo-500">Buka Aktivitas</h4>
            <x-forms.input type="number" name="quota" label="Kuota" placeholder="Masukkan jumlah kuota vaksin"
                error="{{ $errors->first('quota') }}" />
            <div>
                <x-forms.input type="number" name="batch" label="Kloter" placeholder="Masukkan jumlah kloter"
                    error="{{ $errors->first('batch') }}" />
                <small class="font-semibold text-indigo-500">Jika tidak diisi, maka akan menjadi 1 kloter</small>
            </div>

            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">
                Buat Aktivitas
            </x-buttons.primary>
        </form>
    @else
        <div class="grid grid-cols-3">
            <x-dashboard.card-overview title="Kuota hari ini" value="{{ $activity->quota }}">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                    </path>
                </svg>
            </x-dashboard.card-overview>
            <x-dashboard.card-overview title="Jumlah kloter" value="{{ $activity->batch }}">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </svg>
            </x-dashboard.card-overview>
            <x-dashboard.card-overview title="Antrian hari ini" value="{{ $queues->count() }}">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
            </x-dashboard.card-overview>
        </div>

        <div class="flex items-center justify-between p-5 mt-5 bg-white rounded-lg shadow-lg">

            <p>{{ $activity->quota !== $queues->count()? 'Anda dapat menutup antrian vaksin, akan tertutup otomatis setelah berganti hari': 'Antrian hari ini sudah ditutup, karena sudah mencapai batas kuota' }}
            </p>
            <div class="flex items-center justify-center">
                @if ($activity->quota !== $queues->count())
                    <form action="{{ route('activity:status', ['activity' => $activity->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="cursor-pointer">
                            <div class="relative">
                                <div class="block w-24 h-10 bg-indigo-100 rounded-full shadow-inner"></div>
                                <div
                                    class="absolute inset-y-0 {{ $activity->is_open ? 'right-0 mr-1 bg-indigo-600' : 'left-0 ml-1 bg-white' }} block w-8 h-8 mt-1 transform rounded-full shadow">
                                </div>
                            </div>
                        </button>
                    </form>
                @endif
                <p class="ml-3 uppercase text-lg font-bold {{ $activity->is_open ? 'text-green-500' : 'text-red-500' }}">
                    Antrian
                    {{ $activity->is_open ? 'Terbuka' : 'Tertutup' }}</p>
            </div>
        </div>

        @if ($queues->isNotEmpty())
            <div class="inline-block mt-5">
                <a href="{{ route('queue:export', ['date' => date('Y-m-d')]) }}">
                    <x-buttons.primary class="flex items-center justify-center gap-3 text-white bg-green-700" type="button">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg> Export
                    </x-buttons.primary>
                </a>
            </div>
            <div class="max-w-5xl mt-5 overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full overflow-hidden text-center rounded-lg table-auto">
                    <x-tables.thead>
                        <x-tables.th>No</x-tables.th>
                        <x-tables.th>Nama</x-tables.th>
                        <x-tables.th>NIK</x-tables.th>
                        <x-tables.th>Desa</x-tables.th>
                        <x-tables.th>RW</x-tables.th>
                        <x-tables.th>RT</x-tables.th>
                        <x-tables.th>Model Vaksin</x-tables.th>
                        <x-tables.th>Kloter</x-tables.th>
                        <x-tables.th>No Antrian</x-tables.th>
                    </x-tables.thead>
                    <tbody class="bg-gray-200">
                        @foreach ($queues as $queue)
                            <x-tables.tr-body>
                                <x-tables.td>{{ $loop->iteration }}</x-tables.td>
                                <x-tables.td>{{ $queue->name }}</x-tables.td>
                                <x-tables.td>{{ $queue->nik }}</x-tables.td>
                                <x-tables.td>{{ $queue->village }}</x-tables.td>
                                <x-tables.td>{{ $queue->hamlet }}</x-tables.td>
                                <x-tables.td>{{ $queue->neighbourhood }}</x-tables.td>
                                <x-tables.td>{{ $queue->vaccine }}</x-tables.td>
                                <x-tables.td>{{ $queue->batch }}</x-tables.td>
                                <x-tables.td>{{ $queue->order }}</x-tables.td>
                            </x-tables.tr-body>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <x-alert.info>Antrian Masih Kosong</x-alert.info>
        @endif
    @endif
@endsection
