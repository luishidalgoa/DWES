@extends('layouts.app')

@section('title', 'Añadir una empresa')

@section('content')
<div class="container">
    <h1 class="mb-4">Añadir una empresa</h1>

    <!-- Mostrar errores de validación -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para agregar una nueva compañía -->
    <form action="{{ route('companys.store') }}" method="POST" class="card p-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="date_creation" class="form-label">Date Creation</label>
            <input type="date" name="date_creation" class="form-control" value="{{ old('date_creation') }}">
        </div>
        <div class="mb-3">
            <label for="professor_id" class="form-label">Professor ID</label>
            <input type="text" name="professor_id" class="form-control" value="{{ old('professor_id') }}">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('companys.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
