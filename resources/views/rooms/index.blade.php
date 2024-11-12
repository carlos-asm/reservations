<!-- resources/views/rooms/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-5 fw-bold text-center">Gestionar Salas</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Agregar Nueva Sala</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->description }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
