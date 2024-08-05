@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Available Cars</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    @foreach($cars as $car)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $car->make }} {{ $car->model }}</h5>
                                    <p class="card-text">Year: {{ $car->year }}</p>
                                    <p class="card-text">Price per day: ${{ $car->price_per_day }}</p>
                                    <a href="{{ route('cars.reserve', $car->id) }}" class="btn btn-primary">Reserve</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
