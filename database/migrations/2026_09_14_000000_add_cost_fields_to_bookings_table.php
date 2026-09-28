<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table): void {
            if (! Schema::hasColumn('bookings', 'total_amount')) {
                $table->decimal('total_amount', 12, 2)->nullable()->after('status');
            }

            if (! Schema::hasColumn('bookings', 'advance_amount')) {
                $table->decimal('advance_amount', 12, 2)->nullable()->after('total_amount');
            }

            if (! Schema::hasColumn('bookings', 'payment_status')) {
                $table->string('payment_status')->default('Not Collected')->after('advance_amount');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table): void {
            $table->dropColumn(['total_amount', 'advance_amount', 'payment_status']);
        });
    }
};
