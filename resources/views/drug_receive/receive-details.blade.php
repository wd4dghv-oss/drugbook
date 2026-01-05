<!DOCTYPE html>
<html>
<head>
    <title>Drug Receive Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
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

        .search-bar {
            margin-bottom: 20px;
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

        .no-data {
            text-align: center;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Drug Receive Details</h2>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('drug-receive.details') }}" class="search-bar">
            <input type="text" name="drug_name" class="form-control" placeholder="Search by Drug Name" value="{{ request('drug_name') }}">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
            <a href="{{ route('drug-receive.details') }}" class="btn btn-secondary mt-2">Clear</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Drug Name</th>
                    <th>Quantity</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drugReceives as $drug)
                    <tr>
                        <td>{{ $drug->date }}</td>
                        <td>{{ $drug->drug_name }}</td>
                        <td>{{ $drug->quantity }}</td>
                        <td>{{ $drug->expiry_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="no-data">No drug receive records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
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
