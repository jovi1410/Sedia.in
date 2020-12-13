<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Warung extends Model
{
    protected $table = 'warung';

    protected $fillable = [
        'id_warung', 'nama_warung', 'stok_meja', 'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
