<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Receive Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('layouts.navigation') <!-- Include navbar -->

    <div class="container mt-4">
        <h2>Drug Receive Details</h2>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('drug.receive.details') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Drug Name" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('drug.receive.details') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- Drugs Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Drug Name</th>
                    <th>Received Date</th>
                    <th>Received Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drugs as $drug)
                    <tr>
                        <td>{{ $drug->drug_name }}</td>
                        <td>{{ $drug->received_date }}</td>
                        <td>{{ $drug->received_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
