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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',20)->default(0);
            $table->string('invoice_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('ticket_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('sub_cat_id')->nullable();
            $table->string('child_sub_cat_id')->nullable();
            $table->string('venue_id')->nullable();
            $table->string('event_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('block_id')->nullable();
            $table->string('order_ticket_id')->nullable();
            $table->string('ticket_quantity')->nullable();
            $table->longText('ticket_image')->nullable();
            $table->string('fee')->nullable();
            $table->float('total_price',9,2)->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->string('post_code')->nullable();
            $table->float('ticket_price',9,2)->nullable();
            $table->float('total_ticket_price',9,2)->nullable();
            $table->string('status')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
