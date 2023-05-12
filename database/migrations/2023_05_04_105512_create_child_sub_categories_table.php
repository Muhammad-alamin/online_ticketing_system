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
        Schema::create('child_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->foreign('parent_category_id')->references('id')->on('categories')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->foreign('sub_cat_id')->references('id')->on('parent_sub_categories')->nullable()->onDelete('cascade');
            $table->string('child_sub_cat_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_sub_categories');
    }
};
