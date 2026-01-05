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
    <footer>
        <style>
            footer {
                background-color: black; /* Black background */
                color: white;            /* White text */
                text-align: center;      /* Center align text */
                padding: 0px 0;         /* Add padding */
                font-weight: bold;       /* Make the font bold */
                position: fixed;         /* Fix the footer at the bottom */
                width: 100%;             /* Full width */
                bottom: 0;               /* Stick it to the bottom */
                z-index: 1000;           /* Ensure it stays above other elements */
            }
        
            /* Adjust for small screens */
            @media (max-width: 768px) {
                footer {
                    padding: 15px; /* Adjust padding for smaller screens */
                }
            }
        
            /* Add padding to the body to avoid content overlap */
            body {
                padding-bottom: 50px; /* Adjust this value to the height of the footer */
            }
        </style>
        
        <!-- Footer Section -->
        <footer>
            <p>&copy; 2025 ALFA Group. All rights reserved.</p>
        </footer>
</body>
</html>
