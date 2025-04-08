@extends('layout.main')

@section('section_Main')
    <h1>Registrar</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.handle') }}" method="POST">
        @csrf

        {{-- Name --}}
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror

        {{-- Email --}}
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror

        {{-- Password --}}
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror

        {{-- Confirm Password --}}
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation">
        @error('password_confirmation') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Registrar</button>
    </form>
@endsection
