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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->foreign('sub_cat_id')->references('id')->on('parent_sub_categories')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('child_sub_cat_id')->nullable();
            $table->foreign('child_sub_cat_id')->references('id')->on('child_sub_categories')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('venue_id')->nullable();
            $table->foreign('venue_id')->references('id')->on('venues')->nullable()->onDelete('cascade');
            $table->string('match_name',255);
            $table->string('match_date_time')->nullable();
            $table->longText('description')->nullable();
            $table->text('location')->nullable();
            $table->string('image')->nullable();
            $table->string('stadium_image')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
