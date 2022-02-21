@extends('layout.base', ['title' => 'Login'])

@section('content')
<x-section class="flex items-center justify-center h-screen bg-indigo-100">
    <div class="w-2/3 lg:w-2/5 md:w-1/2">
        <form class="min-w-full p-10 bg-white rounded-lg shadow-lg" method="POST" action="{{ route('auth:attempt') }}">
            @csrf
            <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600">Login</h1>
            <x-forms.input name="username" label="Username" type="username" placeholder="Masukkan username"
                autocomplete="off" error="{{ $errors->first('username') }}" />
            <x-forms.input name="password" label="Password" type="password" placeholder="Masukkan password"
                error="{{ $errors->first('password') }}" />
            <x-buttons.primary type="submit" class="text-white bg-indigo-500 hover:bg-indigo-400">Submit
            </x-buttons.primary>

            @if(session('error'))
            <div class="p-5 mt-5 text-red-500 bg-red-100 border-2 border-red-500 rounded-md">
                {{ session('error') }}
            </div>
            @endif
        </form>
    </div>
</x-section>
@endsection
