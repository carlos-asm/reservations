<!-- resources/views/reservations/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-5 fw-bold text-center">Lista de Reservas</h1>
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

    <table id="reservations-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Sala</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->reservation_time }}</td>
                    <td>{{ $reservation->room->name }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        <form action="{{ route('reservations.updateStatus', ['reservation' => $reservation, 'status' => 'Aceptada']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">Aceptar</button>
                        </form>
                        <form action="{{ route('reservations.updateStatus', ['reservation' => $reservation, 'status' => 'Rechazada']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#reservations-table').DataTable({
                searching: true, // Habilitar el buscador
                language: {
                    search: "Buscar:", // Personaliza el texto del campo de búsqueda
                    lengthMenu: "Mostrar _MENU_ registros por página", // Cambia la opción de "Mostrar x registros"
                    zeroRecords: "No se encontraron resultados", // Mensaje cuando no hay resultados
                    info: "Mostrando página _PAGE_ de _PAGES_", // Muestra la información de la página
                    infoEmpty: "No hay registros disponibles", // Mensaje cuando no hay registros
                    infoFiltered: "(filtrado de _MAX_ registros totales)", // Mensaje cuando hay filtro de búsqueda
                },
                columnDefs: [
                    { targets: [1,2], searchable: true }, // Solo hacer búsqueda en la primera columna (Hora)
                    { targets: [0,3], searchable: false } // Deshabilitar la búsqueda en las otras columnas
                ],
                pageLength: 10, // Número de registros por página
            });
        });
    </script>
@endpush