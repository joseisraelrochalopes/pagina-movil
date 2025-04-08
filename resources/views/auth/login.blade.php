@extends('layout.main')

@section('section_Main')

<h1>Login</h1>

{{-- Mostrar los errores si los hay --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login.handle') }}" method="POST">
    @csrf
    {{-- Campo de correo --}}
    <label for="email">Correo electrónico</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    {{-- Campo de contraseña --}}
    <label for="password">Contraseña</label>
    <input type="password" name="password" required>

    {{-- Botón de login --}}
    <button type="submit">Login</button>
</form>

@endsection
