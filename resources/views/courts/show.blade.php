@extends('layouts.app')

@section('title', 'Detail Lapangan')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/courts">Lapangan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Lapangan</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Main Content -->
        <div class="col-md-8">
            <!-- Images -->
            <div class="card shadow mb-4">
                <div class="card-body p-0">
                    <div id="courtImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.unsplash.com/photo-1518609878373-06d740f60d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                     class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Lapangan 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                     class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Lapangan 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1521412644187-c49fa049e84d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                     class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Lapangan 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#courtImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#courtImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Court Info -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h2 class="mb-1">Lapangan Futsal Premium {{ $courtId ?? 1 }}</h2>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-geo-alt text-muted me-2"></i>
                                <span class="text-muted">Jl. Sudirman No.123, Jakarta Pusat</span>
                                <span class="badge bg-info ms-3">Futsal</span>
                            </div>
                        </div>
                        <div class="text-end">
                            <h3 class="text-primary mb-1">Rp 200.000<span class="fs-6">/jam</span></h3>
                            <small class="text-muted">Termasuk pajak</small>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="d-flex align-items-center mb-4">
                        <div class="rating-stars me-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <span class="fw-bold me-2">4.5</span>
                        <span class="text-muted">(128 reviews)</span>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h5>Deskripsi</h5>
                        <p>Lapangan futsal dengan standar internasional, menggunakan rumput sintetis terbaru yang aman untuk bermain. Dilengkapi dengan lighting LED 500 lux untuk kenyamanan bermain malam hari.</p>
                        <ul>
                            <li>Ukuran: 25m x 15m</li>
                            <li>Rumput sintetis grade A</li>
                            <li>Lighting LED 500 lux</li>
                            <li>Dilengkapi papan skor digital</li>
                            <li>Toilet dan shower bersih</li>
                            <li>Parkir luas (mampu menampung 50 mobil)</li>
                        </ul>
                    </div>

                    <!-- Reviews -->
                    <div>
                        <h5>Ulasan</h5>
                        <div class="border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <strong>Budi Santoso</strong>
                                    <div class="rating-stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <small class="text-muted">2 hari lalu</small>
                            </div>
                            <p>Lapangan sangat bagus, rumputnya empuk dan nyaman untuk bermain. Pelayanannya juga ramah.</p>
                        </div>
                        <div class="border rounded p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <strong>Andi Wijaya</strong>
                                    <div class="rating-stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                                <small class="text-muted">1 minggu lalu</small>
                            </div>
                            <p>Fasilitas lengkap, toilet bersih, dan parkir luas. Recommended!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Sidebar -->
        <div class="col-md-4">
            <div class="card shadow sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h4 class="card-title mb-4">Booking Lapangan</h4>
                    
                    <form id="bookingForm">
                        <!-- Date Picker -->
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="bookingDate" required>
                        </div>

                        <!-- Time Slot -->
                        <div class="mb-3">
                            <label class="form-label">Jam</label>
                            <div class="time-slots">
                                @php
                                    $timeSlots = [
                                        '08:00 - 10:00' => 'available',
                                        '10:00 - 12:00' => 'booked',
                                        '12:00 - 14:00' => 'available',
                                        '14:00 - 16:00' => 'available',
                                        '16:00 - 18:00' => 'available',
                                        '18:00 - 20:00' => 'available',
                                        '20:00 - 22:00' => 'available'
                                    ];
                                @endphp
                                @foreach($timeSlots as $time => $status)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="timeSlot" 
                                           id="slot{{ $loop->index }}" {{ $status == 'booked' ? 'disabled' : '' }}>
                                    <label class="form-check-label d-flex justify-content-between" for="slot{{ $loop->index }}">
                                        <span>{{ $time }}</span>
                                        <span class="badge bg-{{ $status == 'available' ? 'success' : 'danger' }}">
                                            {{ $status == 'available' ? 'Tersedia' : 'Booked' }}
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="mb-3">
                            <label class="form-label">Durasi (jam)</label>
                            <select class="form-select" id="duration">
                                <option value="1">1 jam</option>
                                <option value="2" selected>2 jam</option>
                                <option value="3">3 jam</option>
                                <option value="4">4 jam</option>
                            </select>
                        </div>

                        <!-- Summary -->
                        <div class="border rounded p-3 mb-4">
                            <h6>Ringkasan Booking</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td>Harga per jam</td>
                                    <td class="text-end">Rp 200.000</td>
                                </tr>
                                <tr>
                                    <td>Durasi</td>
                                    <td class="text-end">2 jam</td>
                                </tr>
                                <tr>
                                    <td>Pajak (10%)</td>
                                    <td class="text-end">Rp 40.000</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Total</td>
                                    <td class="text-end text-primary">Rp 440.000</td>
                                </tr>
                            </table>
                        </div>

                        @auth
                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="bi bi-calendar-check"></i> Booking Sekarang
                            </button>
                        @else
                            <a href="/login" class="btn btn-primary w-100 btn-lg">
                                <i class="bi bi-box-arrow-in-right"></i> Login untuk Booking
                            </a>
                        @endauth
                        
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-info-circle"></i> Pembatalan gratis 24 jam sebelum booking
                            </small>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Operating Hours -->
            <div class="card shadow mt-4">
                <div class="card-body">
                    <h6>Jam Operasional</h6>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span>Senin - Jumat</span>
                            <span class="fw-bold">08:00 - 22:00</span>
                        </li>
                        <li class="d-flex justify-content-between py-2 border-bottom">
                            <span>Sabtu</span>
                            <span class="fw-bold">07:00 - 23:00</span>
                        </li>
                        <li class="d-flex justify-content-between py-2">
                            <span>Minggu</span>
                            <span class="fw-bold">07:00 - 22:00</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('duration').addEventListener('change', function() {
        const pricePerHour = 200000;
        const duration = parseInt(this.value);
        const tax = 0.1;
        const subtotal = pricePerHour * duration;
        const total = subtotal * (1 + tax);
        
        // Update summary
        document.querySelector('table tbody').innerHTML = `
            <tr>
                <td>Harga per jam</td>
                <td class="text-end">Rp ${pricePerHour.toLocaleString('id-ID')}</td>
            </tr>
            <tr>
                <td>Durasi</td>
                <td class="text-end">${duration} jam</td>
            </tr>
            <tr>
                <td>Pajak (10%)</td>
                <td class="text-end">Rp ${(subtotal * tax).toLocaleString('id-ID')}</td>
            </tr>
            <tr class="fw-bold">
                <td>Total</td>
                <td class="text-end text-primary">Rp ${total.toLocaleString('id-ID')}</td>
            </tr>
        `;
    });

    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const date = document.getElementById('bookingDate').value;
        const timeSlot = document.querySelector('input[name="timeSlot"]:checked');
        
        if (!date || !timeSlot) {
            alert('Silakan pilih tanggal dan jam terlebih dahulu');
            return;
        }
        
        // Redirect to booking page (simulated)
        window.location.href = '/booking/create?court=1&date=' + date + '&time=' + timeSlot.id;
    });
</script>
@endpush
@endsection