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
        Schema::create('ticket_listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->foreign('sub_cat_id')->references('id')->on('parent_sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('child_sub_cat_id')->nullable();
            $table->foreign('child_sub_cat_id')->references('id')->on('child_sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('venue_id')->nullable();
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->unsignedBigInteger('block_id')->nullable();
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
            $table->string('ticket_count',255);
            $table->string('ticket_varient')->nullable();
            $table->string('ticket_types')->nullable();
            $table->longText('ticket_restriction')->nullable();
            $table->string('ticket_have')->nullable();
            $table->longText('image')->nullable();
            $table->string('row')->nullable();
            $table->float('price',9,2)->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->enum('approval',['Approved','Unapproved'])->default('Approved');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_listings');
    }
};
