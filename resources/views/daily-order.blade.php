<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daily Order Entry Form</title>
    <style>
        body {
            padding-top: 56px; /* Adjust based on the height of the navbar */
        }
    </style>
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
        input[type="text"], input[type="number"] {
            border-radius: 5px;
            border: 1px solid #0072ff;
        }
        input[type="text"]:focus, input[type="number"]:focus {
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
            padding: 5px 15px;
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
        
        
    </style>
     @include('layouts.navigation') <!-- Include navbar -->
</head>
<body>
    <div class="form">
        <h2>Daily Order Entry Form</h2>

        <form action="/daily-orders/store" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Auto-fill Date -->
            <label>Date:</label>
            <input type="text" name="date" value="<?= date('Y-m-d') ?>" readonly class="form-control mb-3">

            <!-- BHT No Input -->
            <label>BHT No:</label>
            <input type="text" name="bht_no" required class="form-control mb-3">

            <!-- Drug Name and Quantity (Initially one field) -->
            <div id="drug-fields">
                <label>Drugs:</label>
                <div class="drug-entry">
                    <input type="text" name="drug_names[]" placeholder="Drug Name" required class="form-control">
                    <input type="number" name="quantities[]" placeholder="Quantity" min="1" required class="form-control">
                </div>
            </div>

            <!-- Add More Drugs Button (Small Size) -->
            <button type="button" id="add-drug">Add More Drugs</button>

            <button type="submit1">Submit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add More Drugs Button Click Event
            document.getElementById('add-drug').addEventListener('click', function() {
                const newDrugField = document.createElement('div');
                newDrugField.classList.add('drug-entry');

                newDrugField.innerHTML = `
                    <input type="text" name="drug_names[]" placeholder="Drug Name" required class="form-control">
                    <input type="number" name="quantities[]" placeholder="Quantity" min="1" required class="form-control">
                    <button type="button" class="remove-drug">Remove</button>
                `;

                document.getElementById('drug-fields').appendChild(newDrugField);
            });

            // Close Drug Field Event
            document.getElementById('drug-fields').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-drug')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <<style>
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
