<?php

// Create migration files (run in terminal):
// php artisan make:migration create_courts_table
// php artisan make:migration create_bookings_table
// etc.

// For frontend only, we'll use static data
// But here's the migration structure:

Schema::create('courts', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->enum('type', ['futsal', 'badminton', 'basket', 'tennis', 'others']);
    $table->text('description');
    $table->string('location');
    $table->decimal('price_per_hour', 10, 2);
    $table->time('open_time');
    $table->time('close_time');
    $table->json('images')->nullable();
    $table->json('facilities')->nullable();
    $table->float('rating')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->foreignId('court_id')->constrained();
    $table->date('booking_date');
    $table->time('start_time');
    $table->time('end_time');
    $table->integer('duration_hours');
    $table->decimal('total_price', 10, 2);
    $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'cancelled']);
    $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded']);
    $table->text('notes')->nullable();
    $table->timestamps();
});