<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('varietas_id')->constrained('varietas')->onDelete('cascade');
            $table->integer('jumlah_beli');
            $table->integer('total_harga');
            $table->enum('status', [
                'MENUNGGU KONFIRMASI',
                'SUDAH DI TERIMA',
                'SUDAH DI KEMAS',
                'SUDAH DI KIRIM',
                'MASIH DALAM PERJALANAN',
                'SELESAI'
            ])->default('MENUNGGU KONFIRMASI');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
