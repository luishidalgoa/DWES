@extends('layouts.landing')

@section('title', 'Services')

@section('body')
    <h1>Services</h1>
    @component('_components.card')
        @slot('title', 'Service 1')
        @slot('content', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod')
    @endcomponent
@endsection