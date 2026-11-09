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
    Schema::create('produk', function (Blueprint $table) {
        $table->increments('produk_id');
        $table->string('nama_produk', 100);
        $table->integer('harga');
        $table->date('tanggal_produksi')->nullable();
        $table->enum('status', ['ada', 'kosong', 'Other'])->nullable();
        $table->integer('stok');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
