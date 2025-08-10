<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateDetail extends Model
{
    protected $casts = [
        'potensi' => 'array',
    ];

    protected $fillable = [
        'type',
        'energi',
        'tempramen',
        'pola_pikir',
        'description',
        //tabel karakteristik
        'gaya_komunikasi',
        'gaya_pendekatan_mengajar',
        'intruksi_sosial',
        'pengambilan_keputusan',
        'manajemen_konflik',
        'kelebihan',
        'potensi_tantangn',
        //tabel potensi kekuatan & area perlu pengembangan
        'potensi',
        //Gaya Kerja
        'membuka_kelas',
        'penyampaian_materi',
        'pengelolaan_kelas',
        'kerja_tim',
        'penghadapi_siswa',
    ];
}