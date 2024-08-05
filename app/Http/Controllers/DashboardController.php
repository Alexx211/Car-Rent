<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }


        $reservations = Reservation::where('user_id', Auth::id())->get(); // Sau altă logică pentru a obține numărul de rezervări
        $cars = Car::all(); // Sau altă logică pentru a obține mașinile disponibile


        return view('dashboard', compact('reservations','cars'));


    }
}
