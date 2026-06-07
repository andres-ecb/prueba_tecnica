<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-iconocorto></x-iconocorto>
    <title>@yield('titulo', config('app.name', 'Laravel'))</title>
 
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nova+Cut&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')

</head>
<body style="">
    @include('layouts.menu')
    <div class="container-fluid mt-4 mx-auto" style="padding-left: 85px; padding-right: 85px; padding-bottom: 68px">
        <h1>@yield('nom_pagina')</h1>
        @yield('contenido')
    </div>
    
    <div class="piedepagina">
        <div class="hr-container">
            <div class="hr"></div>
            <div class="dots"></div>
        </div>
        <footer>
        MVP - Prueba Técnica, Agaval
        </footer>
    </div>
</body>
</html>