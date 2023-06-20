<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ticket_listings', function (Blueprint $table) {
            $table->string('ticket_id')->nullable()->after('block_id');
            $table->text('address_for_collection')->nullable()->after('approval');
            $table->string('zip_code_for_collection')->nullable()->after('address_for_collection');
            $table->string('city_for_collection')->nullable()->after('zip_code_for_collection');
            $table->string('country_for_collection')->nullable()->after('city_for_collection');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_listings', function (Blueprint $table) {
            //
        });
    }
};
