<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
public function authorize()
{
return true; // Schimbă în funcție de necesitățile aplicației tale
}

public function rules()
{
return [
'car_id' => 'required|exists:cars,id',
'start_date' => 'required|date',
'end_date' => 'required|date|after:start_date',
];
}
}
