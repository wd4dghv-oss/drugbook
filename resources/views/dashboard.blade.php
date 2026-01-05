<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px; /* Adjust based on the height of the navbar */
            background: linear-gradient(135deg, #e9e8e8, #ffffff);

        }
       
    </style>
    </head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('daily.order') }}" class="btn btn-primary dashboard-btn">
                            Go to Daily Order
                        </a>
                        <a href="{{ route('daily.order.details') }}" class="btn btn-primary dashboard-btn">View Daily Orders</a>
                        <a href="{{ route('drug-receive.create') }}" class="btn btn-primary dashboard-btn">Drug Receive Entry</a>
                        <a href="{{ route('drug-receive.details') }}" class="btn btn-primary dashboard-btn">Drug Balance Details</a>
                        <a href="{{ route('drug-receive-details.index') }}" class="btn btn-primary dashboard-btn">Drug Receive Details</a>
                        <a href="{{ route('drug.close-expiry') }}" class="btn btn-primary dashboard-btn">Close Expiry Drugs</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div>
            
        </div>
    </x-app-layout>
    
    
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



