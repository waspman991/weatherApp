<!-- resources/views/weather/result.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
</head>
<body>
<h1>Weather Information</h1>
<pre>{{ json_encode($weatherData, JSON_PRETTY_PRINT) }}</pre>
</body>
</html>
