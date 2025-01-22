@extends('layouts.app')

@section('content')

<h1> Create Note </h1>
<a href="{{ route('note.index') }}">Back</a>
<form method="POST" action="{{ route('note.store') }}">
    @csrf 
    <label for="">Title</label>
    <input type="text" name="title"/> <br/>
    @error('title')
        <small style="color: red">{{ $message }}</small>
    @enderror
    <br/>

    <label for="">Description</label>
    <input type="text" name="description"/> <br/>
    @error('description')
        <small style="color: red">{{ $message }}</small>
    @enderror
    <br/>

    <input type="submit" value="Create"/>
</form>
@endsection