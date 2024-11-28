<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Reference to users table
            $table->unsignedBigInteger('item_id'); // Reference to shop items table
            $table->timestamps();

            // Foreign key constraints (optional, but recommended)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('shop_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_items');
    }

};
