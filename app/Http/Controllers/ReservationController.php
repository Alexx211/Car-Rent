<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
public function index()
{
$reservations = Reservation::where('user_id', Auth::id())->get();
return view('reservations.index', compact('reservations'));
}

public function create()
{
$cars = Car::all();
return view('reservations.create', compact('cars'));
}

    public function store(StoreReservationRequest $request)
    {
        $car = Car::findOrFail($request->car_id);
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $days = $startDate->diffInDays($endDate) + 1;
        $totalCost = $days * $car->price_per_day;

        Reservation::create([
            'car_id' => $request->car_id,
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $totalCost,
        ]);
return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
}

public function destroy(Reservation $reservation)
{
$reservation->delete();
return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
}
}
