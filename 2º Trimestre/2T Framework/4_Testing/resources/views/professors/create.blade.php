@extends('layouts.app')

@section('title', 'Añadir un profesor')

@section('content')
<div class="container">
    <h1 class="mb-4">Añadir un profesor</h1>

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

    <!-- Formulario para agregar un nuevo profesor -->
    <form action="{{ route('professors.store') }}" method="POST" class="card p-4">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">Guardar</a>
    </form>
</div>
@endsection