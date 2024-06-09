<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $primaryKey = 'id_services';

    protected $fillable = [
        'name',
        'description',
        'id_admin'

    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
