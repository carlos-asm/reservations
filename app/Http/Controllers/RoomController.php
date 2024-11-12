<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Services\RoomService;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(StoreRoomRequest $request)
    {

        $this->roomService->createRoom($request->validated());
        return redirect()->route('rooms.index')->with('success', 'Sala creada correctamente.');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $this->roomService->updateRoom($room, $request->validated());
        return redirect()->route('rooms.index')->with('success', 'Sala actualizada correctamente.');
    }

    public function destroy(Room $room)
    {
        if (!$this->roomService->deleteRoom($room)) {
            return redirect()->route('rooms.index')->with('error', 'No se puede eliminar esta sala porque tiene reservas asociadas.');
        }

        return redirect()->route('rooms.index')->with('success', 'Sala eliminada correctamente.');
    }
}
