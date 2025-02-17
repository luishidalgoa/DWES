@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar la empresa</h1>

    <!-- Formulario para editar una compañía existente -->
    <form action="{{ route('companys.update', $company->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" placeholder="Nombre" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}" placeholder="Dirección">
        </div>

        <div class="form-group">
            <label for="telephone">Teléfono</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $company->telephone }}" placeholder="Teléfono">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" placeholder="Correo Electrónico">
        </div>

        <div class="form-group">
            <label for="date_creation">Fecha de Creación</label>
            <input type="date" name="date_creation" id="date_creation" class="form-control" value="{{ $company->date_creation }}">
        </div>

        <div class="form-group">
            <label for="professor_id">Profesor ID</label>
            <input type="text" name="professor_id" id="professor_id" class="form-control" value="{{ $company->professor_id }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('companys.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
