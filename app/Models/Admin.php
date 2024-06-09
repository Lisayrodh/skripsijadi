<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = "admin";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $primaryKey = 'id_admin';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'picture',
        'address',
        'phone',
        'email_verified_at',
        'verified',
        'status'
    ];



    public function profile()
    {
        return $this->hasOne(AdminProfile::class, 'id_admin');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'id_admin');
    }

    /**
     * Get the services for the admin/clinic.
     */
    public function services()
    {
        return $this->hasMany(Services::class, 'id_admin');
    }

    /**
     * Get the methods for the admin/clinic.
     */
    public function methods()
    {
        return $this->hasMany(klinik_metode::class, 'id_adminprofile');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
