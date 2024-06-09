<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;
    protected $table = 'daftars';
    protected $primaryKey = 'id_daftar';

    protected $fillable = [

            'nama_lengkap',
            'tempat_lahir',
            'tanggal_lahir',
            'usia',
            'jenis_kelamin',
            'nama_orang_tua',
            'whatsapp',
            'whatsapportu',
            'alamat',
            'klinik',
            'riwayat_kesehatan',
            'id_user', // Pastikan field ini ada di tabel
    ];


    public function clinic()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
