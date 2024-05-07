<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_santri',
        'id_kat',
        'id_mapel',
        'tg1',
        'tg2',
        'tg3',
        'ph1',
        'ph2',
        'ph3',
        'final',
    ];
}
