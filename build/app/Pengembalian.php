<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $fillable = [
        'pengembalian_nosewa' , 'pengembalian_kodealat' , 'pengembalian_kondisi' , 'pengembalian_totalalat' , 'pengembalian_waktu' , 'pengembalian_dendaterlambat'
    ];



    // Koneksi field Foreign
    public function alat() {
        return $this->belongsTo('App\Alat', 'pengembalian_kodealat', 'alat_kode');
    }
    public function penyewaan() {
        return $this->belongsTo('App\Penyewaan', 'pengembalian_nosewa', 'sewa_no');
    }
    public function kondisi_alat() {
        return $this->belongsTo('App\KondisiAlat', 'pengembalian_kondisi', 'kondisi_id');
    }
}
