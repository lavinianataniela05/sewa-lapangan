@extends('layouts.app')

@section('title', 'Home - Sports Arena Booking')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .hero-section {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%), 
                    url('https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 25px;
        overflow: hidden;
        position: relative;
        margin-top: 1rem;
    }
    
    .hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
        animation: pattern-move 20s infinite linear;
    }
    
    @keyframes pattern-move {
        0% { transform: translateX(0) translateY(0); }
        100% { transform: translateX(-50px) translateY(-50px); }
    }
    
    .floating-badge {
        animation: float 3s ease-in-out infinite;
    }
    
    .floating-badge:hover {
        animation-play-state: paused;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-10px) rotate(-2deg); }
        66% { transform: translateY(-5px) rotate(2deg); }
    }
    
    .card-court {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border-radius: 20px;
        overflow: hidden;
    }
    
    .card-court:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
    }
    
    .search-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.1);
        border: none;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
    }
    
    .feature-icon {
        width: 100px;
        height: 100px;
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        background: var(--primary-gradient);
        color: white;
        font-size: 2.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .feature-icon::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: 0.5s;
    }
    
    .feature-icon:hover::after {
        left: 100%;
    }
    
    .feature-icon:hover {
        transform: rotate(5deg) scale(1.1);
    }
    
    .stats-card {
        background: var(--secondary-gradient);
        border-radius: 25px;
        color: white;
        padding: 3rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    
    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .badge-pill {
        padding: 0.6rem 1.2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .badge-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: 0.5s;
    }
    
    .badge-pill:hover::before {
        left: 100%;
    }
    
    .badge-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .court-image {
        height: 250px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .card-court:hover .court-image {
        transform: scale(1.1);
    }
    
    .price-tag {
        background: var(--primary-gradient);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-weight: bold;
        font-size: 1.1rem;
        display: inline-block;
        transition: all 0.3s ease;
    }
    
    .price-tag:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }
    
    .testimonial-card {
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border-radius: 20px;
        padding: 2.5rem;
        border: none;
        box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 25px 25px 70px #d9d9d9, -25px -25px 70px #ffffff;
    }
    
    .star-rating i {
        color: #ffc107;
        font-size: 1.3rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .category-card {
        transition: all 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        height: 150px;
    }
    
    .category-card:hover {
        transform: translateY(-5px);
    }
    
    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
        z-index: 1;
    }
    
    .category-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5rem;
        color: white;
        z-index: 2;
    }
    
    .stat-counter {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
    }
    
    .parallax-section {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        padding: 5rem 0;
        border-radius: 25px;
        margin: 4rem 0;
    }
    
    .progress-ring {
        width: 80px;
        height: 80px;
    }
    
    .progress-ring__circle {
        stroke: #667eea;
        stroke-width: 4;
        fill: transparent;
        stroke-linecap: round;
        transform: rotate(-90deg);
        transform-origin: 50% 50%;
    }
    
    .pulse {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
        70% { box-shadow: 0 0 0 20px rgba(102, 126, 234, 0); }
        100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
    }
    
    .typewriter h1 {
        overflow: hidden;
        border-right: .15em solid #667eea;
        white-space: nowrap;
        margin: 0 auto;
        animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
    }
    
    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }
    
    @keyframes blink-caret {
        from, to { border-color: transparent }
        50% { border-color: #667eea; }
    }
    
    .hover-3d {
        transition: transform 0.5s ease;
    }
    
    .hover-3d:hover {
        transform: perspective(1000px) rotateX(5deg) rotateY(5deg);
    }
    
    .marquee {
        overflow: hidden;
        white-space: nowrap;
        box-sizing: border-box;
        animation: marquee 30s linear infinite;
    }
    
    .marquee:hover {
        animation-play-state: paused;
    }
    
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-0">
    <!-- Hero Section -->
    <div class="hero-section position-relative mb-5 mx-3">
        <div class="hero-pattern"></div>
        <div class="row align-items-center py-5 px-4 position-relative">
            <div class="col-lg-6 text-white">
                <div class="floating-badge mb-4">
                    <span class="badge bg-warning text-dark px-4 py-3 rounded-pill shadow-lg">
                        <i class="bi bi-fire me-2"></i> #1 Sports Booking Platform 2024
                    </span>
                </div>
                
                <div class="typewriter mb-4">
                    <h1 class="display-3 fw-bold mb-3">
                        Find Your Perfect<br>
                        <span class="text-warning">Sports Arena</span>
                    </h1>
                </div>
                
                <p class="lead mb-4 opacity-90" style="font-size: 1.25rem;">
                    Book sports facilities in seconds. Real-time availability, instant confirmation, 
                    and seamless payment system.
                </p>
                
                <div class="d-flex gap-3 flex-wrap mb-5">
                    <a href="/courts" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow-lg pulse">
                        <i class="bi bi-search me-2"></i>Explore Courts
                    </a>
                    <a href="#how-it-works" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">
                        <i class="bi bi-play-circle me-2"></i>How It Works
                    </a>
                </div>
                
                <!-- Live Stats -->
                <div class="row mt-4 pt-4 border-top border-white border-opacity-25">
                    <div class="col-4 text-center">
                        <div class="stat-counter">500+</div>
                        <small class="opacity-75">Sports Arenas</small>
                    </div>
                    <div class="col-4 text-center">
                        <div class="stat-counter">15K+</div>
                        <small class="opacity-75">Active Users</small>
                    </div>
                    <div class="col-4 text-center">
                        <div class="stat-counter">98%</div>
                        <small class="opacity-75">Satisfaction Rate</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="position-relative hover-3d">
                    <img src="https://images.unsplash.com/photo-1549060279-7e168fce7090?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         class="img-fluid rounded-4 shadow-lg" alt="Sports Arena">
                    <div class="position-absolute bottom-0 start-0 m-4">
                        <div class="bg-dark bg-opacity-75 text-white p-3 rounded-3">
                            <div class="d-flex align-items-center">
                                <div class="progress-ring me-3">
                                    <svg class="progress-ring__circle" width="80" height="80">
                                        <circle cx="40" cy="40" r="38" stroke-dasharray="239" stroke-dashoffset="50"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fw-bold">Live Availability</div>
                                    <small>82% courts available now</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Search Enhanced -->
    <div class="container">
        <div class="card search-card mb-5 p-4 border-0 position-relative" style="top: -50px;">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-2">Find Your Perfect Match</h3>
                    <p class="text-muted">Select your preferences and discover the best courts</p>
                </div>
                
                <form action="/courts/search" method="GET">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-sports-basketball text-primary me-2"></i>Sport Type
                            </label>
                            <select class="form-select form-select-lg" name="sport">
                                <option value="">All Sports</option>
                                <option value="futsal">⚽ Futsal</option>
                                <option value="badminton">🏸 Badminton</option>
                                <option value="basketball">🏀 Basketball</option>
                                <option value="tennis">🎾 Tennis</option>
                                <option value="volleyball">🏐 Volleyball</option>
                            </select>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-geo-alt text-danger me-2"></i>Location
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control form-control-lg border-start-0" 
                                       placeholder="Enter location..." name="location">
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-6">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-calendar-event text-success me-2"></i>Date
                            </label>
                            <input type="date" class="form-control form-control-lg" name="date" 
                                   min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                        </div>
                        
                        <div class="col-lg-2 col-md-6">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-clock text-warning me-2"></i>Time Slot
                            </label>
                            <select class="form-select form-select-lg" name="time">
                                <option value="">All Day</option>
                                <option value="morning">🌅 Morning (06:00 - 12:00)</option>
                                <option value="afternoon">☀️ Afternoon (12:00 - 18:00)</option>
                                <option value="evening">🌙 Evening (18:00 - 24:00)</option>
                            </select>
                        </div>
                        
                        <div class="col-lg-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-lg">
                                <i class="bi bi-search me-2"></i>Search Courts
                            </button>
                        </div>
                    </div>
                    
                    <div class="row mt-3 g-2">
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="indoor" name="features[]" value="indoor">
                                <label class="form-check-label text-muted" for="indoor">
                                    <i class="bi bi-building me-1"></i> Indoor
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lighting" name="features[]" value="lighting">
                                <label class="form-check-label text-muted" for="lighting">
                                    <i class="bi bi-lightbulb me-1"></i> Good Lighting
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="parking" name="features[]" value="parking">
                                <label class="form-check-label text-muted" for="parking">
                                    <i class="bi bi-car-front me-1"></i> Parking Available
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sports Categories -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">🎯 Popular Sports</h2>
                    <p class="text-muted mb-0">Browse by your favorite sport</p>
                </div>
                <a href="/categories" class="btn btn-link text-decoration-none">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
            
            <div class="row g-4">
                @php
                    $categories = [
                        ['name' => 'Futsal', 'count' => '150+ Courts', 'icon' => '⚽', 'color' => 'primary', 'img' => 'photo-1495568995593-8b4b1786d0c7'],
                        ['name' => 'Badminton', 'count' => '120+ Courts', 'icon' => '🏸', 'color' => 'success', 'img' => 'photo-1626224583764-f87db24ac4ea'],
                        ['name' => 'Basketball', 'count' => '80+ Courts', 'icon' => '🏀', 'color' => 'danger', 'img' => 'photo-1546519638-68e109498ffc'],
                        ['name' => 'Tennis', 'count' => '60+ Courts', 'icon' => '🎾', 'color' => 'warning', 'img' => 'photo-1554068865-24cecd4e34b8'],
                        ['name' => 'Volleyball', 'count' => '45+ Courts', 'icon' => '🏐', 'color' => 'info', 'img' => 'photo-1612872087720-bb876e2e67d1'],
                        ['name' => 'Swimming', 'count' => '25+ Pools', 'icon' => '🏊', 'color' => 'purple', 'img' => 'photo-1544620347-c4fd4a3d5957'],
                    ];
                @endphp
                
                @foreach($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <a href="/courts?sport={{ strtolower($category['name']) }}" class="text-decoration-none">
                        <div class="category-card shadow-sm" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/{{$category['img']}}?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'); background-size: cover;">
                            <div class="category-content">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <h4 class="fw-bold mb-1">{{$category['name']}}</h4>
                                        <p class="mb-0 opacity-75">{{$category['count']}}</p>
                                    </div>
                                    <span class="display-4">{{$category['icon']}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- How It Works -->
        <div id="how-it-works" class="py-5 mb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">🚀 How It Works</h2>
                <p class="text-muted">Book your court in 3 simple steps</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="position-relative mb-4">
                            <div class="feature-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <span class="position-absolute top-0 start-50 translate-middle badge bg-primary rounded-circle" style="width: 40px; height: 40px; line-height: 40px;">1</span>
                        </div>
                        <h5 class="fw-bold mb-3">Search & Select</h5>
                        <p class="text-muted">Find your preferred court using filters like location, sport type, and availability</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="position-relative mb-4">
                            <div class="feature-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <span class="position-absolute top-0 start-50 translate-middle badge bg-primary rounded-circle" style="width: 40px; height: 40px; line-height: 40px;">2</span>
                        </div>
                        <h5 class="fw-bold mb-3">Book & Pay</h5>
                        <p class="text-muted">Choose your time slot and make secure payment with multiple options available</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="position-relative mb-4">
                            <div class="feature-icon">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <span class="position-absolute top-0 start-50 translate-middle badge bg-primary rounded-circle" style="width: 40px; height: 40px; line-height: 40px;">3</span>
                        </div>
                        <h5 class="fw-bold mb-3">Play & Enjoy</h5>
                        <p class="text-muted">Get instant confirmation and enjoy your game with our premium facilities</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Courts Enhanced -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <div class="d-flex align-items-center gap-3">
                        <h2 class="fw-bold mb-0">🔥 Trending Courts</h2>
                        <span class="badge bg-danger rounded-pill px-3 py-2">
                            <i class="bi bi-lightning me-1"></i> HOT
                        </span>
                    </div>
                    <p class="text-muted mb-0">Most booked courts this week</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill me-2" id="prevCourts">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-outline-primary rounded-pill" id="nextCourts">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <div class="row g-4" id="courtsContainer">
                @php
                    $courts = [
                        ['name' => 'Pro Futsal Arena', 'type' => 'Futsal', 'location' => 'Central Jakarta', 'price' => 200000, 'rating' => 4.9, 'badge' => 'Premium', 'img' => 'photo-1551958219-acbc608c6377', 'reviews' => 245],
                        ['name' => 'Elite Badminton Center', 'type' => 'Badminton', 'location' => 'South Jakarta', 'price' => 150000, 'rating' => 4.8, 'badge' => 'Best Seller', 'img' => 'photo-1626224583764-f87db24ac4ea', 'reviews' => 189],
                        ['name' => 'Max Basketball Court', 'type' => 'Basketball', 'location' => 'West Jakarta', 'price' => 250000, 'rating' => 4.7, 'badge' => 'New', 'img' => 'photo-1546519638-68e109498ffc', 'reviews' => 156],
                        ['name' => 'Pro Tennis Academy', 'type' => 'Tennis', 'location' => 'East Jakarta', 'price' => 300000, 'rating' => 4.9, 'badge' => 'Premium', 'img' => 'photo-1554068865-24cecd4e34b8', 'reviews' => 212],
                        ['name' => 'Indoor Volleyball Stadium', 'type' => 'Volleyball', 'location' => 'North Jakarta', 'price' => 180000, 'rating' => 4.6, 'badge' => 'Hot', 'img' => 'photo-1612872087720-bb876e2e67d1', 'reviews' => 134],
                        ['name' => '24/7 Futsal Express', 'type' => 'Futsal', 'location' => 'South Jakarta', 'price' => 175000, 'rating' => 4.8, 'badge' => '24/7', 'img' => 'photo-1518604964513-e67f05178f3c', 'reviews' => 278],
                    ];
                @endphp
                
                @foreach($courts as $index => $court)
                <div class="col-xl-4 col-lg-6">
                    <div class="card card-court h-100">
                        <div class="position-relative overflow-hidden">
                            <div class="court-image-container" style="height: 250px; overflow: hidden;">
                                <img src="https://images.unsplash.com/{{$court['img']}}?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                     class="court-image w-100" alt="{{$court['name']}}">
                            </div>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-3 px-3 py-2">{{$court['badge']}}</span>
                            <div class="position-absolute bottom-0 start-0 m-3">
                                <span class="badge bg-dark px-3 py-2">{{$court['type']}}</span>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0 flex-grow-1">{{$court['name']}}</h5>
                                <div class="star-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <span class="fw-semibold ms-1">{{$court['rating']}}</span>
                                </div>
                            </div>
                            
                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{$court['location']}}
                            </p>
                            
                            <div class="d-flex gap-2 mb-3 flex-wrap">
                                <small class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                    <i class="bi bi-wifi me-1"></i> Free WiFi
                                </small>
                                <small class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                    <i class="bi bi-droplet me-1"></i> Air Conditioned
                                </small>
                                <small class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                    <i class="bi bi-shop me-1"></i> Cafe
                                </small>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <small class="text-muted d-block">Starting from</small>
                                    <span class="price-tag">Rp {{number_format($court['price'], 0, ',', '.')}}/hour</span>
                                </div>
                                <div>
                                    <a href="/courts/{{$index + 1}}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-calendar-plus me-1"></i> Book Now
                                    </a>
                                </div>
                            </div>
                            
                            <div class="mt-3 pt-3 border-top">
                                <small class="text-muted">
                                    <i class="bi bi-chat-left-text me-1"></i> {{$court['reviews']}} reviews
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="parallax-section text-white text-center mb-5">
            <div class="container">
                <h2 class="fw-bold mb-4">Trusted by Thousands of Athletes</h2>
                <div class="row g-4">
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="display-4 fw-bold mb-2">15K+</div>
                            <p class="mb-0 opacity-75">Monthly Active Users</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="display-4 fw-bold mb-2">98%</div>
                            <p class="mb-0 opacity-75">Satisfaction Rate</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="display-4 fw-bold mb-2">24/7</div>
                            <p class="mb-0 opacity-75">Customer Support</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="display-4 fw-bold mb-2">4.8★</div>
                            <p class="mb-0 opacity-75">Average Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials Enhanced -->
        <div class="py-5 mb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">💬 What Our Users Say</h2>
                <p class="text-muted">Real stories from real users</p>
            </div>
            
            <div class="row g-4">
                @php
                    $testimonials = [
                        ['name' => 'Alex Johnson', 'role' => 'Professional Athlete', 'rating' => 5, 'text' => 'The booking process is incredibly smooth. Real-time availability and instant confirmation make planning so much easier!', 'avatar' => 'A'],
                        ['name' => 'Maria Garcia', 'role' => 'Fitness Coach', 'rating' => 5, 'text' => 'As a coach who books multiple courts weekly, this platform has saved me hours of administrative work. Highly recommended!', 'avatar' => 'M'],
                        ['name' => 'David Chen', 'role' => 'Sports Enthusiast', 'rating' => 5, 'text' => 'The shuffle player feature is genius! Met so many new playing partners through this platform.', 'avatar' => 'D'],
                    ];
                @endphp
                
                @foreach($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" 
                                 style="width: 60px; height: 60px; font-size: 1.5rem;">
                                {{$testimonial['avatar']}}
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">{{$testimonial['name']}}</h6>
                                <small class="text-muted">{{$testimonial['role']}}</small>
                            </div>
                        </div>
                        
                        <div class="star-rating mb-3">
                            @for($i = 1; $i <= $testimonial['rating']; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                        
                        <p class="mb-0 fst-italic">"{{$testimonial['text']}}"</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Live Booking Marquee -->
        <div class="alert alert-info mb-5">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <i class="bi bi-lightning-charge-fill text-warning fs-4"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <div class="marquee">
                        <span class="me-5">🏸 Badminton Court #12 booked by <strong>John D.</strong></span>
                        <span class="me-5">⚽ Futsal Arena #5 booked by <strong>Team Velocity</strong></span>
                        <span class="me-5">🏀 Basketball Court #8 booked by <strong>City Hoops</strong></span>
                        <span class="me-5">🎾 Tennis Court #3 booked by <strong>Sarah M.</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Final CTA -->
        <div class="stats-card text-center py-5 mb-5">
            <div class="position-relative z-1">
                <h2 class="fw-bold mb-3 display-5">Ready to Play?</h2>
                <p class="lead mb-4 opacity-90" style="font-size: 1.25rem;">
                    Join thousands of players who've discovered the easiest way to book sports facilities
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="/register" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold shadow-lg">
                        <i class="bi bi-person-plus me-2"></i>Start Free Trial
                    </a>
                    <a href="/contact" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-semibold">
                        <i class="bi bi-question-circle me-2"></i>Need Help?
                    </a>
                </div>
                <p class="mt-4 mb-0 opacity-75">
                    <small>No credit card required • Cancel anytime</small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Courts carousel navigation
    document.addEventListener('DOMContentLoaded', function() {
        const courtsContainer = document.getElementById('courtsContainer');
        const prevBtn = document.getElementById('prevCourts');
        const nextBtn = document.getElementById('nextCourts');
        
        if (courtsContainer && prevBtn && nextBtn) {
            let scrollPosition = 0;
            const cardWidth = courtsContainer.children[0].offsetWidth + 32; // width + gap
            
            nextBtn.addEventListener('click', () => {
                const maxScroll = courtsContainer.scrollWidth - courtsContainer.clientWidth;
                scrollPosition = Math.min(scrollPosition + cardWidth, maxScroll);
                courtsContainer.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            });
            
            prevBtn.addEventListener('click', () => {
                scrollPosition = Math.max(scrollPosition - cardWidth, 0);
                courtsContainer.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            });
        }
        
        // Animate progress ring
        const progressRing = document.querySelector('.progress-ring__circle');
        if (progressRing) {
            const circumference = 2 * Math.PI * 38;
            progressRing.style.strokeDasharray = `${circumference} ${circumference}`;
            progressRing.style.strokeDashoffset = circumference;
            
            const offset = circumference - (82 / 100) * circumference;
            setTimeout(() => {
                progressRing.style.transition = 'stroke-dashoffset 1.5s ease-in-out';
                progressRing.style.strokeDashoffset = offset;
            }, 500);
        }
        
        // Add hover effect to category cards
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Auto-rotate featured courts
        let autoRotateInterval;
        
        function startAutoRotate() {
            autoRotateInterval = setInterval(() => {
                if (courtsContainer) {
                    const maxScroll = courtsContainer.scrollWidth - courtsContainer.clientWidth;
                    let newPosition = courtsContainer.scrollLeft + cardWidth;
                    
                    if (newPosition >= maxScroll) {
                        newPosition = 0;
                    }
                    
                    courtsContainer.scrollTo({
                        left: newPosition,
                        behavior: 'smooth'
                    });
                }
            }, 5000);
        }
        
        // Start auto-rotate
        startAutoRotate();
        
        // Pause on hover
        courtsContainer?.addEventListener('mouseenter', () => {
            clearInterval(autoRotateInterval);
        });
        
        courtsContainer?.addEventListener('mouseleave', () => {
            startAutoRotate();
        });
        
        // Dynamic date input min value
        const dateInput = document.querySelector('input[type="date"]');
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.min = today;
            dateInput.value = today;
        }
        
        // Add typing animation to search placeholders
        const searchInput = document.querySelector('input[placeholder="Enter location..."]');
        if (searchInput) {
            const locations = ['Jakarta', 'Bandung', 'Surabaya', 'Bali', 'Yogyakarta'];
            let currentIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            
            function typeWriter() {
                const currentLocation = locations[currentIndex];
                
                if (isDeleting) {
                    searchInput.placeholder = `Search in ${currentLocation.substring(0, charIndex--)}...`;
                    if (charIndex < 0) {
                        isDeleting = false;
                        currentIndex = (currentIndex + 1) % locations.length;
                        setTimeout(typeWriter, 500);
                    } else {
                        setTimeout(typeWriter, 50);
                    }
                } else {
                    searchInput.placeholder = `Search in ${currentLocation.substring(0, charIndex++)}...`;
                    if (charIndex > currentLocation.length) {
                        isDeleting = true;
                        setTimeout(typeWriter, 2000);
                    } else {
                        setTimeout(typeWriter, 100);
                    }
                }
            }
            
            // Start typing effect after page load
            setTimeout(typeWriter, 1000);
        }
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe elements
    document.querySelectorAll('.card-court, .feature-icon, .testimonial-card').forEach(el => {
        observer.observe(el);
    });
</script>
@endpush