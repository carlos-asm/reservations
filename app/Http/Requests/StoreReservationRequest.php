<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'reservation_time' => 'required|date|after:now',
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => 'El campo de sala es obligatorio.',
            'room_id.exists' => 'La sala seleccionada no existe.',
            'reservation_time.required' => 'El campo de hora de reserva es obligatorio.',
            'reservation_time.date' => 'El campo de hora de reserva debe ser una fecha válida.',
            'reservation_time.after' => 'La hora de reserva debe ser una fecha y hora futura.',
        ];
    }
}
