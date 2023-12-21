
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Form</title>
</head>
<body>
<form action="{{ route('get-weather') }}" method="post">
    @csrf
    <label for="lat">Latitude:</label>
    <input type="text" name="lat" required>
    <br>
    <label for="lon">Longitude:</label>
    <input type="text" name="lon" required>
    <br>
    <button type="submit">Get Weather</button>
</form>
</body>
</html>
