<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisAlat extends Model
{
    protected $table = 'jenis_alat';
    protected $primaryKey = 'jenis_alat_id';
    protected $fillable = [
        'jenis_alat_nama' , 'jenis_alat_harga'
    ];

    // Koneksi PrimaryKey JenisAlat di ForeignKey Tabel Lain :
    public function alat() {
        return $this->hasMany('App\Alat', 'alat_jenis', 'jenis_alat_id');
    }
}
