<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.laravl={csrfToken: '{{ csrf_token() }}'}</script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     
    </head>
    <body class="antialiased">
       <div id="app">
       <!--Cargar los componentes de vue-->
       <encabezado></encabezado>
       
       <product></product>
       </div>
       <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>