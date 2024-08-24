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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('password')->nullable();

            $table->string('foto')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('kecamatan')->nullable();
            $table->unsignedBigInteger('id_kabupaten_kota_alamat')->nullable();
            $table->unsignedBigInteger('id_provinsi_alamat')->nullable();
            $table->string('alamat_saat_ini')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('negara_asal')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->unsignedBigInteger('id_kabupaten_kota_lahir')->nullable();
            $table->unsignedBigInteger('id_provinsi_lahir')->nullable();
            $table->string('negara_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_menikah')->nullable();
            $table->unsignedBigInteger('id_agama')->nullable();

            $table->double('nilai_mtk')->nullable();
            $table->double('nilai_bing')->nullable();
            $table->double('nilai_bindo')->nullable();
            $table->double('nilai_rata')->nullable();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_kabupaten_kota_alamat')->references('id')->on('kabupaten_kota')->onDelete('cascade');
            $table->foreign('id_kabupaten_kota_lahir')->references('id')->on('kabupaten_kota')->onDelete('cascade');
            $table->foreign('id_provinsi_alamat')->references('id')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_provinsi_lahir')->references('id')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_agama')->references('id')->on('agama')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
