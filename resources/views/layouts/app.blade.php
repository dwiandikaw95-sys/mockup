<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAW FRESH</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="app-shell">
        <div class="phone">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>