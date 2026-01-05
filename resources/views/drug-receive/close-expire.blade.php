<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <
    @include('layouts.navigation') <!-- Include navbar -->
    <title>Close to Expiry Drugs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .text-danger {
            color: red;
            font-weight: bold;
        }

        .no-data {
            text-align: center;
            color: #777;
            padding: 20px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        .remove-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Close to Expiry Drugs (Within 2 Months)</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Drug Name</th>
                    <th>Quantity</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($closeExpireDrugs as $drug)
                    <tr>
                        <td>{{ $drug->drug_name }}</td>
                        <td>{{ $drug->quantity }}</td>
                        <td class="text-danger">{{ $drug->expiry_date }}</td>
                        <td>
                            <form action="{{ route('close-expiry-drugs.destroy', $drug->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this entry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="no-data">No drugs are close to expiry within 2 months.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('dashboard') }}" class="back-btn">Back to Dashboard</a>
    </div>
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
