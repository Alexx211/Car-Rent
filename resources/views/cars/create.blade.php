@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Add a New Car</h1>
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input type="text" class="form-control" id="make" name="make" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="price_per_day">Price Per Day</label>
                        <input type="number" class="form-control" id="price_per_day" name="price_per_day" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Car</button>
                </form>
            </div>
        </div>
    </div>
@endsection
