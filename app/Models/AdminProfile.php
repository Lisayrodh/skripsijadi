<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    protected $table = 'adminprofile';
    protected $primaryKey = 'id_adminprofile';

    protected $fillable = [

            'username',
            'email',
            'nama_klinik',
            'alamat_lengkap',
            'kecamatan',
            'kabupaten',
            'kode_pos',
            'whatsapp',
            'telephone',
            'instagram',
            'facebook',
            'website_klinik',
            'tentangklinik',
            'id_admin', // Pastikan field ini ada di tabel

    ];

    public function admin()
    {
        // Jika nama kolom yang benar adalah admin_id
        return $this->belongsTo(Admin::class, 'id_admin');
    }

}
