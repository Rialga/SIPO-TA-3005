<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    protected $primaryKey = 'user_nik';
    protected $fillable = [
        'user_nik', 'user_role', 'user_nama', 'user_mail', 'user_alamat', 'user_job','user_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    public $incrementing = false;

    // Koneksi field Foreign
    public function role() {
        return $this->belongsTo('App\Role', 'role_id', 'user_role');
    }

    // Koneksi PrimaryKey User di ForeignKey Tabel Lain :
    public function penyewaan() {
        return $this->hasMany('App\Penyewaan', 'sewa_user', 'user_nik');
    }


}
