<!-- resources/views/rooms/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-5 fw-bold text-center">Agregar Nueva Sala</h1>
    
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        
        @include('rooms.fields')

        <button type="submit" class="btn btn-primary mt-4">Crear Sala</button>
    </form>
</div>
@endsection
