@extends('layouts.app')

@section('content')
<a href="{{ route('note.index') }}">Back</a>
<form action="{{ route('note.update', $note->id) }}" method="POST">
    @method('put') <!-- Esto es porque html no permite el metodo put, así que lo ponemos con esta etiqueta -->
    @csrf
    <label for="">Title</label>
    <input type="text" name="title" value="{{ $note->title }}"/>
    @error('title')
        <small style="color: red">{{ $message }}</small>
    @enderror


    <label for="">Description</label>
    <input type="text" name="description" value="{{ $note->description }}"/>
    @error('description')
    <small style="color: red">{{ $message }}</small>
    @enderror
    <br/>


    <input type="submit" value="Update"/>
</form>
@endsection