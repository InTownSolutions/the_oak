<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_tariffs', function (Blueprint $table): void {
            $table->id();
            $table->string('rule_name');
            $table->string('room_category');
            $table->date('starts_on');
            $table->date('ends_on');
            $table->string('tariff_type');
            $table->decimal('price_per_night', 10, 2);
            $table->text('note')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['room_category', 'starts_on', 'ends_on', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_tariffs');
    }
};
