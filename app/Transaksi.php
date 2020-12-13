<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    
    public $timestamps = true;

    protected $table = 'transaksi';

    // protected $dates = [
    //     'created_at',
    //     'updated_at'
    // ];
    protected $fillable = [
        'nama_pembeli', 'no_meja', 'menu_id', 'jumlah', 'metode_pemesanan', 'warung_id', 'status_meja'
    ];
}
