<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/courts', function () {
    return view('courts.index');
})->name('courts.index');

Route::get('/courts/{id}', function ($id) {
    return view('courts.show', ['courtId' => $id]);
})->name('courts.show');

Route::get('/scoreboard', function () {
    return view('scoreboard');
})->name('scoreboard');

Route::get('/shuffle', function () {
    return view('shuffle');
})->name('shuffle');

// User Routes (after login)
Route::middleware(['auth'])->group(function () {
    Route::get('/booking/create', function () {
        return view('booking.create');
    })->name('booking.create');
    
    Route::get('/payment/{id}', function ($id) {
        return view('payment.index', ['bookingId' => $id]);
    })->name('payment');
    
    Route::get('/my-bookings', function () {
        return view('booking.my-bookings');
    })->name('my-bookings');
    
    Route::get('/rating/{id}', function ($id) {
        return view('rating.create', ['bookingId' => $id]);
    })->name('rating.create');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');
    
    // Simulate admin authentication
    Route::post('/login', function () {
        return redirect('/admin');
    });
    
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/courts', function () {
        return view('admin.courts.index');
    })->name('courts.index');
    
    Route::get('/bookings', function () {
        return view('admin.bookings.index');
    })->name('bookings.index');
    
    Route::get('/monitoring', function () {
        return view('admin.monitoring');
    })->name('monitoring');
    
    Route::get('/transactions', function () {
        return view('admin.transactions');
    })->name('transactions');
    
    Route::get('/logout', function () {
        return redirect('/admin/login');
    })->name('logout');
});

// Auth Routes (Laravel UI)
Auth::routes(['verify' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');