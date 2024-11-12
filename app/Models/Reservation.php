<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'room_id', 'reservation_time', 'reservation_endtime', 'status'];
    protected $dates = ['reservation_time'];

    public static function checkConflict($roomId, $reservationTime)
    {
        return self::where('room_id', $roomId)
                    ->where('reservation_time', $reservationTime)
                    ->exists();
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
