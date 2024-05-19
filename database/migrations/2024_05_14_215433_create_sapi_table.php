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
        Schema::create('sapi', function (Blueprint $table) {
            $table->id();
            $table->string('tipe',50);
            $table->integer('umur');
            $table->integer('harga_jual');
            $table->integer('harga_beli');
            $table->integer('foto');
            $table->string('status',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sapi');
    }
};
