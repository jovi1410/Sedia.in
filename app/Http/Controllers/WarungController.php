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

class WarungController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $idPemilik = Auth::id();
    $idWarung = warung::where('user_id', $idPemilik)->pluck('id_warung')->first();

    $transaksi = Transaksi::where('warung_id', $idWarung)->count();
    $meja = Transaksi::select(DB::raw('no_meja'))->where('status_meja', 1)->where('warung_id', $idWarung)->groupBy('no_meja')->get();
    $meja = $meja->count();
    $item_terjual = Transaksi::where('warung_id', $idWarung)->sum('jumlah');
    $total_pendapatan = Transaksi::select(DB::raw('sum((transaksi.jumlah * menu_tabel.harga)) as pendapatan'))->join('menu_tabel', 'menu_tabel.id', '=', 'transaksi.menu_id')->where('warung_id', $idWarung)->pluck('pendapatan')->first();
    $jml_meja = Meja::where('warung_id', $idWarung)->count();
    $presentase_meja_reserved = $meja/$jml_meja*100;
    // dd();
    return view('layoutWarung.dashboard', compact(['transaksi', 'meja', 'item_terjual', 'total_pendapatan', 'presentase_meja_reserved']));
  }
  public function jumlahtable()
  {
    $idPemilik = Auth::id();
    $idWarung = warung::where('user_id', $idPemilik)->pluck('id_warung')->first();

    $meja_reserved = Transaksi::select('no_meja', 'nama_pembeli', 'status_meja')->where('warung_id', $idWarung)->where('status_meja', 1)->groupBy('no_meja', 'nama_pembeli', 'status_meja')->get();
    $meja_sisa_reserved = Transaksi::select('no_meja')->where('warung_id', $idWarung)->where('status_meja', 1)->groupBy('no_meja')->pluck('no_meja');
    $meja_free = Meja::where('warung_id', $idWarung)->whereNotIn('no_meja', $meja_sisa_reserved)->select('no_meja')->get();


    // NAMBAH KEY VALUE DI COLLECTION TABEL MEJA
    foreach ($meja_free as $mf) {
      $mf['nama_pembeli'] = "-";
      $mf['status_meja'] = 0;
    }

    // MEMBUAT ARRAY DARI TABEL MEJA DAN TRANSAKSI UNTUK kolom no_meja dll baru
    $meja = array_merge($meja_free->toArray(), $meja_reserved->toArray());
    $meja = collect($meja)->sortBy('no_meja')->toArray();


    // dd(json_encode($meja_free)." ".json_encode($meja_reserved));
    // dd($meja_reserved);

    return view('layoutWarung.pemesananmeja', compact('meja'));
  }
  public function pemesanan()
  {
    $idPemilik = Auth::id();
    $idWarung = warung::where('user_id', $idPemilik)->pluck('id_warung')->first();
    $makanan = Menu::where('id_warung', $idWarung)->where('jenis_menu', 'makanan')->where('isDelete', 0)->get();
    $minuman = Menu::where('id_warung', $idWarung)->where('jenis_menu', 'minuman')->where('isDelete', 0)->get();
    $meja_sisa_reserved = Transaksi::select('no_meja')->where('warung_id', $idWarung)->where('status_meja', 1)->groupBy('no_meja')->pluck('no_meja');
    $meja = Meja::where('warung_id', $idWarung)->whereNotIn('no_meja', $meja_sisa_reserved)->select('no_meja')->get();
    return view('layoutWarung.pemesanan', compact('makanan', 'minuman', 'meja'));
  }
  public function profile()
  {
    return view ('layoutwarung.profile');
  }
}
