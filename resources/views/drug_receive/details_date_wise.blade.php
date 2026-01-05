<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Receive Details (Date-wise)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e9e8e8, #ffffff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            width: 100%;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #333;
        }
        h2 {
            color: #0072ff;
            text-align: center;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f4f4f4;
            color: #0072ff;
        }
        .table td {
            background-color: #f9f9f9;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .btn {
            border-radius: 5px;
            padding: 8px 15px;
        }
        .btn-primary {
            background-color: #0072ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #005bb5;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
    @include('layouts.navigation') <!-- Include navbar -->
</head>
<body>

<div class="container">
    <h2>Drug Receive Details (Date-wise)</h2>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('drug-receive-details.index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="drug_name" placeholder="Search Drug Name" value="{{ request('drug_name') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Drug Receive Details Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Drug Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drugReceives as $drug)
                <tr>
                    <td>{{ $drug->date }}</td>
                    <td>{{ $drug->drug_name }}</td>
                    <td>{{ $drug->quantity }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No Records Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
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
