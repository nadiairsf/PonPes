<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    public $table ="keluhans";
    protected $fillable = [
        'id_santris',
        'riwayat_konsumsi', 
        'makanan_terakhir', 
        'minuman_terakhir',
        'keluhan',
        'ket_keluhan', 
        'kondisi_umum',
        'ket_kondisi', 
        'nyeri_haid', 
        'lama_nyeri',
        'lama_haid', 
        'warna_haid',
        'nyeri_payudara',
        'benjolan_payudara',
        'warna_cairan', 
        'bau_cairan', 
        'fisik_pria',
        'mastrubasi',
        'jml_mastrubasi',
        'gatal',
        'ket_gatal',
        'waktu_gatal', 
        'lama_gatal', 
        'bentuk_kulit',
        'created_at',
    ];
}
