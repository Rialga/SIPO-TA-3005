<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSewa extends Model
{
    protected $table = 'jenis_sewa';
    protected $primaryKey = 'jenis_id';
    protected $fillable = [
        'jenis_nama'
    ];

    // Koneksi PrimaryKey JenisSewa di ForeignKey Tabel Lain :
    public function penyewaan() {
        return $this->hasMany('App\Penyewaan', 'sewa_jenis', 'jenis_id');
    }
}
