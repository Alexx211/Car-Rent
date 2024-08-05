@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            color: #FFFFFF;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .text-muted {
            color: #00FF00;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #00FF00;
            border-color: #004085;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .list-group {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 0.75rem 1.25rem;
            margin-bottom: -1px;
            background-color: #FFFFFF;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }

        .list-group-item:not(:last-child) {
            border-bottom-width: 0;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Welcome to our car rental! Choose a car!</h1>
                <!-- Formular Logout -->
                <form action="{{ route('logout') }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Your Reservations</h2>
                @if($reservations->isEmpty())
                    <p class="text-muted">No reservations found.</p>
                @else
                    <ul class="list-group">
                        @foreach($reservations as $reservation)
                            <li class="list-group-item">
                                <strong>Car:</strong> {{ $reservation->car->make }} {{ $reservation->car->model }},
                                <strong>Start Date:</strong> {{ $reservation->start_date }},
                                <strong>End Date:</strong> {{ $reservation->end_date }}
                               </div>
                             <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h2>Book a Car</h2>
                <a href="{{ route('cars.index') }}" class="btn btn-primary">View Cars</a>
            </div>
        </div>
    </div>
@endsection
