<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('enquiry_id')->nullable()->constrained()->nullOnDelete();
            $table->string('customer_name');
            $table->string('phone');
            $table->json('services');
            $table->json('details')->nullable();
            $table->date('banquet_event_date')->nullable();
            $table->string('banquet_hall')->nullable();
            $table->string('status')->default('Confirmed');
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->unique(['banquet_event_date', 'banquet_hall']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
