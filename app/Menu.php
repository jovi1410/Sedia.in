<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  
  protected $table = 'menu_tabel';
  protected $fillable = ['id_warung','nama_menu','jenis_menu','harga','stok','avatar'];
  public $timestamps = true;
}
