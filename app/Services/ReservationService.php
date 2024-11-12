<?php
namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationService
{
    public function createReservation($roomId, $reservationTime)
    {
        $reservationTime = Carbon::parse($reservationTime);
        $reservationEndTime = $reservationTime->copy()->addHour();

        $conflict = Reservation::where('room_id', $roomId)
            ->whereBetween('reservation_endtime', [$reservationTime, $reservationEndTime])
            ->exists();

        if ($conflict) {
            return back()->with('error', 'Ya hay una reserva en el mismo horario.');
        }

        return Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $roomId,
            'reservation_time' => $reservationTime,
            'reservation_endtime' => $reservationEndTime,
        ]);
    }

    public function updateStatus(Reservation $reservation, $status)
    {
        $startTime = Carbon::parse($reservation->reservation_time);
        $endTime = $startTime->copy()->addHour();

        $conflict = Reservation::where('id', '!=', $reservation->id)
            ->where('room_id', $reservation->room_id)
            ->whereBetween('reservation_endtime', [$startTime, $endTime])
            ->exists();

        if ($conflict) {
            return back()->with('error', 'Ya hay una reserva en el mismo horario.');
        }

        $reservation->update(['status' => $status]);
        return $reservation;
    }
}
