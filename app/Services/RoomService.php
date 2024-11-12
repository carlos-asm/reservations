<?php
namespace App\Services;

use App\Models\Room;

class RoomService
{
    public function createRoom(array $data)
    {
        return Room::create($data);
    }

    public function updateRoom(Room $room, array $data)
    {
        return $room->update($data);
    }

    public function deleteRoom(Room $room)
    {
        if ($room->reservations()->count() > 0) {
            return false;
        }

        $room->delete();
        return true;
    }
}
