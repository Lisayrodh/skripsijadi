<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metode extends Model
{
    use HasFactory;

    protected $table = 'metode_tabel';
    protected $primaryKey = 'id_metode';

    protected $fillable = [

        'name',
        'deskripsi',
        'kisaran_harga'
    ];
}
