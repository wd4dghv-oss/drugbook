<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Drug Receive Entry Form</title>
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
        .form {
            background: #fff;
            max-width: 500px;
            width: 100%;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #333;
        }
        h2 {
            color: #0072ff;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #0072ff;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            border-radius: 5px;
            border: 1px solid #0072ff;
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="text"]:focus, input[type="number"]:focus, input[type="date"]:focus {
            border-color: #00c6ff;
            box-shadow: 0 0 5px #00c6ff;
            outline: none;
        }
        .remove-drug {
            background-color: #ff4d4d;
            color: white;
            border: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s;
            height: 38px;
        }
        .remove-drug:hover {
            background-color: #e60000;
        }
        .drug-entry {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }
        #add-drug {
            background: #0072ff;
            color: #fff;
            border: none;
            padding: 3px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            display: block;
            margin: 10px 0;
        }
        #add-drug:hover {
            background: #005bb5;
        }
        button[type="submit1"] {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button[type="submit1"]:hover {
            background: #28a745;
        }
    </style>
</head>
<body>
    @include('layouts.navigation') <!-- Include navbar -->

    <div class="form">
        <h2>Drug Receive Entry Form</h2>
        <form action="{{ route('drug-receive.store') }}" method="POST">
            @csrf
        
            <!-- Fields for drug receive form -->
            <label>Date:</label>
            <input type="text" name="date" value="{{ now()->toDateString() }}" readonly>
        
            <label>Drug Name:</label>
            <input type="text" name="drug_name" required>
        
            <label>Quantity:</label>
            <input type="number" name="quantity" min="1" required>
        
            <label>Expiry Date:</label>
            <input type="date" name="expiry_date" required>
        
            <button type="submit1">Submit</button>
        </form>
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
