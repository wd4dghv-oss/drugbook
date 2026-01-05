<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Drug Balance Details</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            color: #0072ff;
        }
        .status-reorder {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .status-sufficient {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        input[type="text"] {
            border-radius: 5px;
            border: 1px solid #0072ff;
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="text"]:focus {
            border-color: #00c6ff;
            box-shadow: 0 0 5px #00c6ff;
            outline: none;
        }
        button[type="submit1"] {
            background: #0072ff;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="submit1"]:hover {
            background: #005bb5;
        }
    </style>
</head>
<body>
    @include('layouts.navigation') <!-- Include navbar -->
    
    <div class="container">
        <h2>Drug Balance Details</h2>

        <!-- Search Bar for Drug Name -->
        <form action="{{ route('drug-receive.details') }}" method="GET">
            <input type="text" name="drug_name" placeholder="Search by Drug Name" value="{{ request('drug_name') }}">
            <button type="submit1">Search</button>
        </form>

        <!-- Drug Receiving Details Table -->
        <table>
            <thead>
                <tr>
                    <th>Drug Name</th>
                    <th>Received Quantity</th>
                    <th>Daily Used Quantity</th>
                    <th>Balance Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drugReceives as $drugReceive)
                    <tr>
                        <td>{{ $drugReceive->drug_name }}</td>
                        <td>{{ $drugReceive->total_received_quantity }}</td>
                        <td>{{ $drugReceive->daily_used_quantity }}</td>
                        <td>
                            @php
                                $balanceQuantity = $drugReceive->total_received_quantity - $drugReceive->daily_used_quantity;
                            @endphp
                            @if($balanceQuantity <= 50)
                                <span class="text-danger">{{ $balanceQuantity }}</span>
                            @else
                                <span class="text-success">{{ $balanceQuantity }}</span>
                            @endif
                        </td>
                        <td>
                            @if($balanceQuantity <= 50)
                                <span class="status-reorder">Reorder</span>
                            @else
                                <span class="status-sufficient">Sufficient</span>
                            @endif
                        </td>
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
