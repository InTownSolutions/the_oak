<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('enquiries')
            ->where('status', 'Converted')
            ->update(['status' => 'Booked']);
    }

    public function down(): void
    {
        DB::table('enquiries')
            ->where('status', 'Booked')
            ->update(['status' => 'Converted']);
    }
};
