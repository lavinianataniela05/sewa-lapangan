@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Dashboard</h1>
            <p class="text-muted mb-0">Welcome back, Admin!</p>
        </div>
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-calendar"></i> Today: {{ date('d M Y') }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">This Week</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-primary border-3 shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Booking</h6>
                            <h3 class="mb-0">1,248</h3>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> 12.5% from last month</small>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="bi bi-calendar-check fs-2 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-success border-3 shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Active Courts</h6>
                            <h3 class="mb-0">24</h3>
                            <small class="text-success"><i class="bi bi-check-circle"></i> 18 available</small>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="bi bi-shield-check fs-2 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-warning border-3 shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Pending Approval</h6>
                            <h3 class="mb-0">18</h3>
                            <small class="text-danger">Need immediate attention</small>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="bi bi-clock-history fs-2 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-info border-3 shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Revenue Today</h6>
                            <h3 class="mb-0">Rp 12.5M</h3>
                            <small class="text-success">Rp 8.2M from yesterday</small>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="bi bi-cash-coin fs-2 text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h6 class="mb-3">Quick Actions</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="/admin/courts" class="btn btn-outline-primary w-100">
                                <i class="bi bi-plus-circle"></i> Add Court
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/bookings" class="btn btn-outline-success w-100">
                                <i class="bi bi-eye"></i> View Bookings
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/monitoring" class="btn btn-outline-warning w-100">
                                <i class="bi bi-tv"></i> Court Monitoring
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/transactions" class="btn btn-outline-info w-100">
                                <i class="bi bi-receipt"></i> Transactions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Bookings & Court Status -->
    <div class="row g-4">
        <!-- Recent Bookings -->
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Recent Bookings</h6>
                    <a href="/admin/bookings" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Court</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>#B{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td>Customer {{ $i }}</td>
                                    <td>Court {{ $i }}</td>
                                    <td>{{ date('d M Y') }}, {{ ['08:00','10:00','14:00','16:00','18:00'][$i-1] }}</td>
                                    <td>
                                        @php
                                            $statuses = ['pending', 'approved', 'completed', 'rejected', 'pending'];
                                            $colors = ['warning', 'success', 'info', 'danger', 'warning'];
                                        @endphp
                                        <span class="badge bg-{{ $colors[$i-1] }}">{{ ucfirst($statuses[$i-1]) }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Court Status -->
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="mb-0">Court Status</h6>
                </div>
                <div class="card-body">
                    @for($i = 1; $i <= 6; $i++)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Court {{ $i }}</h6>
                            <small class="text-muted">{{ ['Futsal','Badminton','Basket'][$i%3] }}</small>
                        </div>
                        <div class="text-end">
                            <span class="badge {{ $i % 3 == 0 ? 'bg-danger' : 'bg-success' }}">
                                {{ $i % 3 == 0 ? 'Occupied' : 'Available' }}
                            </span>
                            @if($i % 3 == 0)
                            <div class="text-danger small">Until: {{ date('H:i', strtotime('+2 hours')) }}</div>
                            @endif
                        </div>
                    </div>
                    @if($i < 6)
                    <hr>
                    @endif
                    @endfor
                    
                    <div class="mt-4">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                            <div class="progress-bar bg-danger" style="width: 25%"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small class="text-muted">Available: 75%</small>
                            <small class="text-muted">Occupied: 25%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection