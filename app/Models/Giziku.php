<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giziku extends Model
{
    use HasFactory;
    public $table ="gizikus";
    protected $fillable = [
        'id_santris',
        'perubahan',
        'gastrointestinal',
        'bab',
        'ket_bab',
        'bak',
        'ket_bak',
        'rata_tidur',
        'sulit_tidur',
        'ket_sulittidur',
        'ketergantungan',
        'ket_ketergantungan',
        'keperawatan',
        'ket_keperawatan',
        'alergi',
        'ket_alergi',
        'created_at',
    ];
}
