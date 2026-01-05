<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="text-center">
        <h2>Welcome to Drug Manager</h2>
        <a href="{{ route('login') }}" class="btn btn-primary mt-3">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary mt-3">Register</a>
    </div>
</body>
</html>
