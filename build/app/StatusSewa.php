<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusSewa extends Model
{
    protected $table = 'status_sewa';
    protected $primaryKey = 'status_id';
    protected $fillable = [
        'status_detail'
    ];

    // Koneksi PrimaryKey StatusSewa di ForeignKey Tabel Lain :
    public function penyewaan() {
        return $this->hasMany('App\Penyewaan', 'sewa_status', 'status_id');
    }
}
