<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klinik_metode extends Model
{
    use HasFactory;

    protected $table = 'klinik_metode';
    protected $primaryKey = 'id_metodeadminprofil';

    protected $fillable = [

        'id_metode',
        'id_adminprofile',
        'harga',
        'keterangan'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
