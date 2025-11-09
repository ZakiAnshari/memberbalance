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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            // relasi ke tabel members
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            // tipe transaksi: topup atau pengurangan
            $table->string('tipe');
            // nominal transaksi
            $table->decimal('nominal', 15, 2);
            // keterangan transaksi (optional)
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
