@extends('layouts.app')

@section('title', 'Información del profesor')

@section('content')
<div class="container">
    <h1 class="mb-4">Información del profesor</h1>

    <!-- Tarjeta para mostrar los detalles del profesor -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>{{ $professor->fullname }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Age:</strong> {{ $professor->age }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($professor->gender) }}</p>
            <p><strong>Address:</strong> {{ $professor->address }}</p>
            <p><strong>Telephone:</strong> {{ $professor->telephone }}</p>
            <p><strong>Email:</strong> {{ $professor->email }}</p>
            <p><strong>Companies:</strong></p>
            <ul>
                @foreach($professor->companies as $company)
                    <li>{{ $company->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer text-end">
            <!-- Botones para volver a la lista, editar y eliminar el profesor -->
            <a href="{{ route('professors.index') }}" class="btn btn-secondary">Volver a profesores</a>
            <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro?')">Borrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
