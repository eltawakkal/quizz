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
        Schema::create('certificate_details', function (Blueprint $table) {
            //deskripsi
            $table->id();
            $table->string('type')->unique();
            $table->string('energi');
            $table->string('tempramen');
            $table->string('pola_pikir');
            $table->text('description');
            //tabel karakteristik
            $table->text('gaya_komunikasi');
            $table->text('gaya_pendekatan_mengajar');
            $table->text('intruksi_sosial');
            $table->text('pengambilan_keputusan');
            $table->text('manajemen_konflik');
            $table->text('kelebihan');
            $table->text('potensi_tantangn');
            //tabel potensi kekuatan & area perlu pengembangan
            $table->text('potensi');
            //Gaya Kerja
            $table->text('membuka_kelas');
            $table->text('penyampaian_materi');
            $table->text('pengelolaan_kelas');
            $table->text('kerja_tim');
            $table->text('penghadapi_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_details');
    }
};
