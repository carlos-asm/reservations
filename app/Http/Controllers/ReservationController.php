<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Services\ReservationService;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function store(StoreReservationRequest $request)
    {

        $reservation = $this->reservationService->createReservation(
            $request->room_id, 
            $request->reservation_time
        );
       
        if ($reservation instanceof \Illuminate\Http\RedirectResponse) {
            return $reservation;
        }

        if (auth()->user()->cannot('manage.reservations')) {  // Usamos "cannot" para verificar si no tiene el permiso
            return redirect()->route('reservations.myReservations')->with('success', 'Reserva realizada con éxito.');
        }

        return redirect()->route('reservations.index')->with('success', 'Reserva realizada con éxito.');
    }

    public function create()
    {
        $rooms = Room::all();
        return view('reservations.create', compact('rooms'));
    }

    public function myReservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('reservations.my_reservations', compact('reservations'));
    }

    public function updateStatus(Reservation $reservation, $status)
    {
        if ($status == 'Rechazada') {
            $reservation->update(['status' => $status]);
            return back()->with('success', 'Estado actualizado.');
        }

        $updated = $this->reservationService->updateStatus($reservation, $status);

        if ($updated instanceof \Illuminate\Http\RedirectResponse) {
            return $updated;
        }

        return back()->with('success', 'Estado actualizado.');
    }
}
