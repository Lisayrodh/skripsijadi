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
        Schema::create('adminprofile', function (Blueprint $table) {
            $table->id('id_adminprofile'); //ini merupakan kolom unik untuk mengidentifikasi setiap data klinik.
            $table->integer('id_admin');
            $table->string('username'); //menyimpan username.
            $table->string('email')->unique(); //menyimpan alamat email, dengan opsi unik.
            $table->string('nama_klinik'); //menyimpan nama klinik.
            $table->string('alamat_lengkap'); //menyimpan alamat lengkap klinik.
            $table->string('kecamatan'); //untuk menyimpan kecamatan.
            $table->string('kabupaten'); //untuk menyimpan kabupaten.
            $table->string('kode_pos'); //menyimpan kode pos.
            $table->string('whatsapp'); //menyimpan nomor WhatsApp.
            $table->string('telephone')->nullable();; //menyimpan nomor Telepon.
            $table->string('instagram')->nullable(); //untuk menyimpan akun Instagram (opsional).
            $table->string('facebook')->nullable(); //menyimpan akun Facebook (opsional).
            $table->string('website_klinik')->nullable(); //menyimpan akun web klinik (opsional).
            $table->text('tentangklinik')->nullable(); //menyimpan informasi tentang klinik (opsional).
            $table->timestamps();

             // Jika id_admin adalah foreign key
            //  $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminprofile');
    }
};
