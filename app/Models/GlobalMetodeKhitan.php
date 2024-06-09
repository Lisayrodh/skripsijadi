<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalMetodeKhitan extends Model
{
    use HasFactory;

    protected $table = 'metode_tabel';

    protected $fillable = [
        'id_metode',
        'name',
        'deskripsi',
        'kisaran_harga',
        'timestamps'
    ];
}
