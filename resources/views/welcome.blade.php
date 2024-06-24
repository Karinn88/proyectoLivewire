<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todolist</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles  
    </head>
    <body class="antialiased font-sans bg-slate-400">
        <x-app-layout>
            <x-slot name=”header”>
            </x-slot>


        <h1 class="text-center my-4">Lista de tareas</h1>

        @livewire('Todolist')
        {{-- <div class="flex justify-center m-3">
            <a href="{{ route('form') }}"><button class="btn btn-success m-4">Ir al formulario</button></a>
            <a href="{{ route('table') }}"><button class="btn btn-success m-4">Ir a la tabla</button></a>
        </div> --}}
           
    @livewireScripts
    </x-app-layout>
    </body>
</html>
