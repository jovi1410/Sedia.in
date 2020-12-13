<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menu;
use App\Meja;
use App\Transaksi;
use App\Warung as warung;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use stdClass;

class CustomerController extends Controller {
    public function __consturct () {
      $this->middleware('auth');
    }
  public function index() {
    return view('layoutCustomer.index');
  }
  public function tentang()
  {
    return view('layoutCustomer.tentang');
  }
  public function profile()
  {
    return view ('layoutCustomer.profile');
  }
  public function pesanmenu()
  {
    $idPemilik = Auth::id();
    $idWarung = warung::where('user_id', $idPemilik)->pluck('id_warung')->first();
    $makanan = Menu::where('id_warung', $idWarung)->where('jenis_menu', 'makanan')->where('isDelete', 0)->get();
    $minuman = Menu::where('id_warung', $idWarung)->where('jenis_menu', 'minuman')->where('isDelete', 0)->get();
    $meja_sisa_reserved = Transaksi::select('no_meja')->where('warung_id', $idWarung)->where('status_meja', 1)->groupBy('no_meja')->pluck('no_meja');
    $meja = Meja::where('warung_id', $idWarung)->whereNotIn('no_meja', $meja_sisa_reserved)->select('no_meja')->get();
    return view('layoutCustomer.pesan_menu', compact('makanan', 'minuman', 'meja'));
  }
}
