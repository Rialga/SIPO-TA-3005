<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements JWTSubject
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id', 'user_role', 'user_nama', 'user_mail', 'user_alamat', 'user_job','user_password',
    ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public $incrementing = false;

    // Koneksi field Foreign
    public function role() {
        return $this->belongsTo('App\Role', 'role_id', 'user_role');
    }

    // Koneksi PrimaryKey User di ForeignKey Tabel Lain :
    public function penyewaan() {
        return $this->hasMany('App\Penyewaan', 'sewa_user', 'user_nik');
    }

    public function getAuthPassword(){
        return $this->user_password;
    }

    // Pendeklarasian Role
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();

        if($this->have_role->role_nama == ['Admin','Penyewa']) {
            return true;
        }
        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->cekUserRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->cekUserRole($roles);
        }
        return false;
    }

    //Get User ROle
    private function getUserRole()
    {
        return $this->role()->getResults();
    }

    //Validasi Role User
    private function cekUserRole($role)
    {
        return (strtolower($role)==strtolower($this->have_role->role_nama)) ? true : false;
    }


}
