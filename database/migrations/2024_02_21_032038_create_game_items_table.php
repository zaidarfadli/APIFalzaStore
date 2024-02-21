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
        Schema::create('game_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->unsignedBigInteger('item_type_id');
            $table->foreign('item_type_id')->references('id')->on('item_types');
            $table->string('name');
            $table->integer('amount_item');
            $table->string('image');
            $table->integer('bonus')->nullable();
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_items');
    }
};
