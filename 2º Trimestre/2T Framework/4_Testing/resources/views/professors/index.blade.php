@extends('layouts.app')

@section('title', 'Lista de profesores')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de profesores</h1>

    <!-- Mostrar mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar un nuevo profesor -->
    <a href="{{ route('professors.create') }}" class="btn btn-success mb-3">Añadir un profesor</a>

    <!-- Botón para volver al index.blade.php dentro de layouts, centrado -->
    <div class="text-center mb-3">
        <a href="{{ route('layouts.index') }}" class="btn btn-primary">Volver al inicio</a>
    </div>

    <!-- Tabla para listar los profesores -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Companies</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre los profesores y mostrarlos en la tabla -->
            @forelse($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->fullname }}</td>
                    <td>{{ $professor->age }}</td>
                    <td>{{ ucfirst($professor->gender) }}</td>
                    <td>{{ $professor->address }}</td>
                    <td>{{ $professor->telephone }}</td>
                    <td>{{ $professor->email }}</td>
                    <td>
                        @foreach($professor->companies as $company)
                            {{ $company->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        <!-- Botones para ver, editar y eliminar un profesor -->
                        <a href="{{ route('professors.show', $professor->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- Mostrar mensaje si no se encuentran profesores -->
                <tr>
                    <td colspan="9" class="text-center">No se han encontrado profesores</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
