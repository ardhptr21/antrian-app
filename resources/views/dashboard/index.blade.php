@extends('layout.dashboard', ['title' => 'Antrian'])

@section('content')
    <x-dashboard.title title="Dashboard Antrian" description="Kelola dan lihat ringkasan mengenai antrian vaksin" />

    <div class="flex items-center justify-start gap-5 p-3 mt-5 bg-white border-2 border-indigo-600 rounded-lg shadow-lg">
        <div style="flex: 1.5" class="flex items-center justify-center gap-5">
            <x-forms.select name="village_filter" placeholder="PILIH DESA">
                @foreach ($villages as $village)
                    <option value="{{ $village->name }}" @selected(Request::get('village')==$village->name)>Desa
                        {{ $village->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.select name="vaccine_filter" placeholder="PILIH VAKSIN">
                @foreach ($vaccines as $vaccine)
                    <option value="{{ $vaccine->name }}" @selected(Request::get('vaccine')==$vaccine->
                        name)>{{ $vaccine->name }}</option>
                @endforeach
            </x-forms.select>
            <input type="date" name="date_filter" id="date_filter"
                class="px-4 py-2 bg-gray-100 rounded-lg focus:outline-none"
                value="{{ Request::get('date') ?? date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
        </div>
        <div class="flex items-center justify-center w-full gap-5" style="flex: 1">
            <button
                class="w-full px-4 py-2 font-sans text-lg font-semibold tracking-wide text-white bg-indigo-600 rounded-lg"
                type="button" id="filter_btn">Filter</button>
            <a href="{{ route('dashboard:index') }}" class="block w-full">
                <button
                    class="w-full px-4 py-2 font-sans text-lg font-semibold tracking-wide border-2 border-indigo-600 rounded-lg"
                    type="button">Reset</button>
            </a>
        </div>
    </div>


    @if ($queues->isNotEmpty())
        <div class="inline-block">
            <a
                href="{{ route('queue:export', [
                    'village' => Request::get('village'),
                    'vaccine' => Request::get('vaccine'),
                    'date' => Request::get('date') ?? date('Y-m-d'),
                ]) }}">
                <x-buttons.primary class="flex items-center justify-center gap-3 text-white bg-green-700" type="button"><svg
                        class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg> Export</x-buttons.primary>
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
        <x-alert.info>Tidak ada antrian</x-alert.info>
    @endif

    </div>
@endsection
