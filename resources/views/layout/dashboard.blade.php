<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @isset($title){{ $title }} @else Antrian App @endisset</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="font-sans antialiased">
    <main class="flex min-h-screen">
        <x-side-bar.side-bar-container>
            <ul class="space-y-10">
                <x-side-bar.side-bar-list to="/dashboard">
                    <x-slot:svg>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </x-slot:svg>
                    Antrian
                </x-side-bar.side-bar-list>
                <x-side-bar.side-bar-list to="/dashboard/vaksin">
                    <x-slot:svg>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </x-slot:svg>
                    Vaksin
                </x-side-bar.side-bar-list>
            </ul>
        </x-side-bar.side-bar-container>

        <div class="flex-grow px-10 py-12 bg-indigo-50">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
