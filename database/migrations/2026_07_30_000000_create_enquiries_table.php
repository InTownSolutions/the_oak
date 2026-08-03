<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table): void {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('service');
            $table->string('enquiry_type')->nullable();
            $table->unsignedInteger('guests')->nullable();
            $table->date('preferred_date')->nullable();
            $table->string('status')->default('New');
            $table->json('details')->nullable();
            $table->text('message')->nullable();
            $table->text('admin_notes')->nullable();
            $table->date('next_follow_up')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
