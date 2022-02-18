@extends('layout.dashboard', ['title' => 'Dashboard Page'])

@section('content')
<div class="flex flex-wrap gap-x-10">
    <x-dashboard.card-overview title="Jumlah Antrian Hari Ini" value="2">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
            </path>
        </svg>
    </x-dashboard.card-overview>
</div>

<div class="mt-8">
    <table class="min-w-full table-auto">
        <x-tables.thead>
            <x-tables.th>No</x-tables.th>
            <x-tables.th>Nama</x-tables.th>
            <x-tables.th>RT</x-tables.th>
            <x-tables.th>RW</x-tables.th>
            <x-tables.th>Model Vaksin</x-tables.th>
        </x-tables.thead>
        <tbody class="bg-gray-200">
            <x-tables.tr-body>
                <x-tables.td>1</x-tables.td>
                <x-tables.td>Ardhi Putra</x-tables.td>
                <x-tables.td>4</x-tables.td>
                <x-tables.td>6</x-tables.td>
                <x-tables.td>Sinovac</x-tables.td>
            </x-tables.tr-body>
            <x-tables.tr-body>
                <x-tables.td>2</x-tables.td>
                <x-tables.td>John Doe</x-tables.td>
                <x-tables.td>1</x-tables.td>
                <x-tables.td>7</x-tables.td>
                <x-tables.td>Moderna</x-tables.td>
            </x-tables.tr-body>
            <x-tables.tr-body>
                <x-tables.td>3</x-tables.td>
                <x-tables.td>Jane Doe</x-tables.td>
                <x-tables.td>9</x-tables.td>
                <x-tables.td>3</x-tables.td>
                <x-tables.td>Zaneca</x-tables.td>
            </x-tables.tr-body>
        </tbody>
    </table>
</div>
</div>

@endsection
