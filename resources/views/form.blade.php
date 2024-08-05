<!DOCTYPE html>
<html>
<head>
    <title>Book a Car</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <header>
        <h1>Book a Car</h1>
    </header>

    <section>
        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf

            <!-- ID-ul mașinii este ascuns -->
            <input type="hidden" name="car_id" value="{{ $car->id }}">

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>

            <button type="submit">Reserve</button>
        </form>
    </section>
</div>
</body>
</html>

