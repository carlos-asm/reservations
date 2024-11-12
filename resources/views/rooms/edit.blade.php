<!-- resources/views/rooms/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-5 fw-bold text-center">Editar Sala</h1>
    
    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf
        @method('PUT')
        
        @include('rooms.fields')

        <button type="submit" class="btn btn-primary mt-4">Actualizar Sala</button>
    </form>
</div>
@endsection
