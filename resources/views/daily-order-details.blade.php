<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function printPage() {
            window.print();
        }
    </script>
    <style>
    body {
        padding-top: 56px; /* Adjust based on the height of the navbar */
        background: linear-gradient(135deg, #e9e8e8, #ffffff);

    }
    </style>
</head>
<body>

    @include('layouts.navigation') <!-- Include navbar -->

    <div class="container mt-4">
        <h2>Daily Order Details</h2>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('daily.order.details') }}" class="mb-3">
            <input type="text" name="search" class="form-control w-50 d-inline" placeholder="Search Drug Name" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ route('daily.order.details') }}" class="btn btn-secondary">Reset</a>
        </form>

        <!-- Print Button -->
        <button class="btn btn-success mb-3" onclick="printPage()">Print</button>
        
        <!-- Orders Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>BHT No</th>
                    <th>Drug Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->bht_no }}</td>
                        <td>{{ $order->drug_name }}</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
