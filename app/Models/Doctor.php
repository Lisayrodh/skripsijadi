<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';

    protected $primaryKey = 'id_doctor';

    protected $fillable = [
        'name',
        'position',
        'description',
        'photo',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'id_admin'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
