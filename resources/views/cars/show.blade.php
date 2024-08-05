<!DOCTYPE html>
<html>
<head>
    <title>Car Details</title>
</head>
<body>
<h1>Car Details</h1>
<p><strong>Make:</strong> {{ $car->make }}</p>
<p><strong>Model:</strong> {{ $car->model }}</p>
<p><strong>Year:</strong> {{ $car->year }}</p>
<p><strong>Price Per Day:</strong> {{ $car->price_per_day }}</p>
<a href="{{ route('cars.index') }}">Back to List</a>
</body>
</html>

