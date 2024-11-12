<!-- resources/views/reservations/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-5 fw-bold text-center">Hacer una Reserva</h1>
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
    
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        
        <div class="form-group fw-bold  mt-4">
            <label for="room_id">Seleccionar Sala</label>
            <select name="room_id" id="room_id" class="form-control" required>
                <option value="">Seleccione una sala</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group fw-bold  mt-2">
            <label for="reservation_time">Fecha y Hora de la Reserva</label>
            <input type="datetime-local" name="reservation_time" id="reservation_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary  mt-4">Reservar</button>
    </form>
</div>
@endsection
