<!-- resources/views/reservations/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Reservation')

@section('content')
    <div class="container mt-5">
        <h1>Create Reservation for {{ $car->make }} {{ $car->model }}</h1>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reserve</button>
        </form>
    </div>
@endsection
