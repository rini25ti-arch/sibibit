<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom kategori_lahan, harga, stok, cara_penanaman, gambar ke tabel varietas Anda
        Schema::table('varietas', function (Blueprint $table) {
            $table->string('kategori_lahan')->default('Lahan Kering & Mineral (Daratan)')->after('nama_varietas');
            $table->integer('harga')->default(50000)->after('kategori_lahan');
            $table->integer('stok')->default(100)->after('harga');
            $table->text('cara_penanaman')->nullable()->after('keunggulan');
            $table->string('gambar')->nullable()->after('cara_penanaman');
        });

        // Tambah kolom no_hp & role ke tabel users (password dibuat nullable agar pembeli bisa login cepat)
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_hp')->nullable()->after('email');
            $table->enum('role', ['admin', 'pembeli'])->default('pembeli')->after('no_hp');
            $table->string('password')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('varietas', function (Blueprint $table) {
            $table->dropColumn(['kategori_lahan', 'harga', 'stok', 'cara_penanaman', 'gambar']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['no_hp', 'role']);
        });
    }
};
