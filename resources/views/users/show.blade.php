@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Usuario</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>DPI:</strong> {{ $user->dpi }}</p>
            <p class="card-text"><strong>Fecha de nacimiento:</strong> {{ $user->fecha_nacimiento }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $user->direccion }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $user->telefono }}</p>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
