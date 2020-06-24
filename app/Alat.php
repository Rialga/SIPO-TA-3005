<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';
    protected $primaryKey = 'alat_kode';
    protected $fillable = [
        'alat_kode' , 'alat_jenis' , 'alat_merk' , 'alat_status' , 'alat_total'
    ];

    public $incrementing = false;

    // Koneksi field Foreign
    public function jenis_alat() {
        return $this->belongsTo('App\JenisAlat', 'alat_jenis', 'jenis_alat_id');
    }
    public function merk() {
        return $this->belongsTo('App\Merk', 'alat_merk', 'merk_id');
    }

    // Koneksi PrimaryKey Alat di ForeignKey Tabel Lain :
    public function gambar_alat() {
        return $this->hasMany('App\GambarAlat', 'gambar_kodealat', 'alat_kode');
    }

    //Many to many
    public function penyewaan_detail_sewa()
    {
        return $this->belongsToMany('App\Penyewaan','detail_sewa','detail_laporan_alat_kode','sewa_no');
    }
    public function penyewaan_pengembalian()
    {
        return $this->belongsToMany('App\Penyewaan','pengembalian','pengembalian_kodealat','sewa_no');
    }
}
