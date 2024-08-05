@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2>Your Reservations</h2>

                <!-- Butonul de revenire la dashboard -->
                <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-4">Back </a>

                @if($reservations->isEmpty())
                    <p class="text-muted">No reservations found.</p>
                @else
                    <ul class="list-group">
                        @foreach($reservations as $reservation)
                            <li class="list-group-item">
                                <strong>Car:</strong> {{ $reservation->car->make }} {{ $reservation->car->model }},
                                <strong>Start Date:</strong> {{ $reservation->start_date }},
                                <strong>End Date:</strong> {{ $reservation->end_date }},
                                <strong>Total Cost:</strong> ${{ number_format($reservation->total_cost, 2) }}
                                <!-- Butonul de ștergere -->
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
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
