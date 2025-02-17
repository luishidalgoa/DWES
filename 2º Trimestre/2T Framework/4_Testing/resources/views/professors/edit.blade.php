@extends('layouts.app')

@section('title', 'Edit Professor')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar el profesor</h1>

    <!-- Formulario para editar un profesor existente -->
    <form action="{{ route('professors.update', $professor->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fullname">Nombre Completo</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $professor->fullname }}" placeholder="Nombre Completo" required>
        </div>
        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $professor->age }}" placeholder="Edad" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $professor->address }}" placeholder="Dirección" required>
        </div>
        <div class="form-group">
            <label for="telephone">Teléfono</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $professor->telephone }}" placeholder="Teléfono" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $professor->email }}" placeholder="Correo Electrónico" required>
        </div>
        <div class="form-group">
            <label for="gender">Género</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" {{ $professor->gender == 'male' ? 'selected' : '' }}>Masculino</option>
                <option value="female" {{ $professor->gender == 'female' ? 'selected' : '' }}>Femenino</option>
                <option value="other" {{ $professor->gender == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection