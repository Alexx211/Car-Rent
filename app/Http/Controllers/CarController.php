<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }
    public function reserve(Car $car)
    {

        return view('reservations.create', ['car' => $car]);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index');
    }
}
