@extends('layouts.app')

@section('title', 'Lista de empresas')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de empresas</h1>

    <!-- Mostrar mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar una nueva empresa -->
    <a href="{{ route('companys.create') }}" class="btn btn-success mb-3">Añadir una empresa</a>

    <!-- Botón para volver al index.blade.php dentro de layouts, centrado -->
    <div class="text-center mb-3">
        <a href="{{ route('layouts.index') }}" class="btn btn-primary">Volver al inicio</a>
    </div>

    <!-- Tabla para listar las empresas -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Date Creation</th>
                <th>Professor ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre las empresas y mostrarlas en la tabla -->
            @forelse($companys as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->telephone }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->date_creation }}</td>
                    <td>{{ $company->professor_id }}</td>
                    <td>
                        <!-- Botones para ver, editar y eliminar una empresa -->
                        <a href="{{ route('companys.show', $company->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('companys.edit', $company->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('companys.destroy', $company->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- Mostrar mensaje si no se encuentran empresas -->
                <tr>
                    <td colspan="8" class="text-center">No se han encontrado empresas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
