<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';
    protected $primaryKey = 'merk_id';
    protected $fillable = [
        'merk_nama'
    ];


    // Koneksi PrimaryKey Merk di ForeignKey Tabel Lain :
    public function gambar() {
        return $this->hasMany('App\Alat', 'alat_merk', 'merk_id');
    }
}
