<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sewa Lapangan</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2E8B57;
            --secondary-color: #FFD700;
            --accent-color: #228B22;
        }
        
        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color) !important;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .card-court {
            transition: transform 0.3s;
            border: 1px solid #e0e0e0;
        }
        
        .card-court:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .rating-stars {
            color: var(--secondary-color);
        }
        
        .badge-available {
            background-color: #28a745;
        }
        
        .badge-booked {
            background-color: #dc3545;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-house-door"></i> Sewa Lapangan
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/courts">Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/scoreboard">Scoreboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shuffle">Shuffle Player</a>
                    </li>
                    
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/my-bookings">Booking Saya</a>
                    </li>
                    @endauth
                </ul>
                
                <div class="d-flex">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/my-bookings">Booking Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                        <a href="/register" class="btn btn-primary">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Sewa Lapangan</h5>
                    <p>Platform penyewaan lapangan olahraga terpercaya</p>
                </div>
                <div class="col-md-3">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white-50 text-decoration-none">Home</a></li>
                        <li><a href="/courts" class="text-white-50 text-decoration-none">Lapangan</a></li>
                        <li><a href="/scoreboard" class="text-white-50 text-decoration-none">Scoreboard</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Kontak</h5>
                    <p><i class="bi bi-telephone"></i> 0812-3456-7890</p>
                    <p><i class="bi bi-envelope"></i> info@sewalapangan.com</p>
                </div>
            </div>
            <hr class="bg-white">
            <div class="text-center">
                &copy; 2024 Sewa Lapangan. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>