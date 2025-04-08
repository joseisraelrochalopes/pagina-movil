<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>WebPhone</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    @include('fragments.navbar') <!-- Asegúrate de tener este archivo -->

    @include('fragments.alerts') <!-- Si tienes alertas, verifica que este archivo exista -->

    @yield('section_Main') <!-- Aquí es donde se insertarán los contenidos de las vistas -->
</body>
</html>
