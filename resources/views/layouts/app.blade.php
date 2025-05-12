<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ATUN TAILOR')</title>

    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Custom styles for the navbar */
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #007bff;
        }

        .nav-link {
            color: #555;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 30px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }

        /* Add margin between navbar and content */
        .content-container {
            margin-top: 60px;
        }

        /* Custom card styles */
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }

        /* Custom footer styles */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            font-size: 0.75rem;
            padding: 0.3rem 0.6rem;
        }
    </style>
</head>

<body>
    <!-- Main Container -->
    <div class="container-fluid">
        <!-- Navbar Section -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">ATUN TAILOR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                        </li>
                        <!-- Cart Link -->
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
                                @if(session()->has('cart') && count(session()->get('cart')) > 0)
                                    <span class="cart-count">{{ count(session()->get('cart')) }}</span>
                                @else
                                    <span class="cart-count">0</span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content Section -->
        <div class="content-container">
            @yield('content')
        </div>

        <!-- Footer Section -->
        <footer>
            <div class="container">
                <p class="text-muted mb-0">&copy; 2025 ATUN TAILOR. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
