<!-- Bootstrap CSS (in the <head> section) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px; /* Adjust based on the height of the navbar */
        }
    </style>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Drug Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daily.order') }}">Daily Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daily.order.details') }}">View Daily Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('drug-receive.create') }}">Drug Receive Entry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('drug-receive.details') }}">Drug Balance Details</a>
                    </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('drug-receive-details.index') }}">Drug Receive Details</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('drug.close-expiry') }}">Close Expiry Drugs</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    