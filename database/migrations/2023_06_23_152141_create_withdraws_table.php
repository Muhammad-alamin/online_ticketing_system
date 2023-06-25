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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id',20)->default(0);
            $table->string('bank_info_id')->default(0);
            $table->string('transaction_id')->nullable();
            $table->string('withdraw_amount')->nullable();
            $table->string('complete_date')->nullable();
            $table->string('vendor_message')->nullable();
            $table->string('admin_message')->nullable();
            $table->enum('status',['Pending','Processing','Canceled','Complete'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
