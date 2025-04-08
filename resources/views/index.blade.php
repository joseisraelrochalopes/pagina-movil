@extends('layout.main')

@section('section_Main')
<br>
@if(auth()->check())
    <div class="alert alert-success">
        ¡Bienvenido, {{ auth()->user()->name }}!
    </div>
@else
    <div class="alert alert-info">
        ¡Por favor, inicia sesión o regístrate para acceder a más funcionalidades!
    </div>
@endif
@include('fragments.slides')

<!-- Aquí puedes agregar una verificación para saber si el usuario está logueado -->


@endsection
