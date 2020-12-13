<?php

namespace App\Http\Controllers;

use App\Meja;
use Illuminate\Http\Request;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Warung as warung;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create($request->all());
        return response()->json(['success' => 'Transaksi Berhasil !!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function emptyItMeja($no_meja)
    {
        $meja = Transaksi::where('no_meja', $no_meja)->where('status_meja', 1)->update([
            'status_meja' => 0
        ]);
        // $meja->status_meja = 0;
        // $meja->update;
        // dd($meja);
    }

    public function dataPesanan()
    {

        $idPemilik = Auth::id();
        $idWarung = warung::where('user_id', $idPemilik)->pluck('id_warung')->first();
        $transaksi = Transaksi::select('transaksi.nama_pembeli', 'transaksi.no_meja', 'menu_tabel.nama_menu', 'transaksi.jumlah', DB::raw('(transaksi.jumlah * menu_tabel.harga) as total_harga') , 'transaksi.metode_pemesanan', 'transaksi.created_at', 'transaksi.updated_at', 'transaksi.status_meja')->join('menu_tabel', 'menu_tabel.id', '=', 'transaksi.menu_id')->where('warung_id', $idWarung)->get();

        // $query = "select t.nama_pembeli, t.no_meja, nama_menu, (jumlah * harga) as toal_harga, jumlah, metode_pemesanan, t.created_at, t.updated_at, t.status_meja from transaksi as t join menu_tabel as m on m.id = t.menu_id where warung_id = :idWarung";
        // $transaksi = DB::select(DB::raw($query), ['idWarung' => $idWarung]);
        // dd($transaksi);
        return view('layoutWarung.datapesanan', compact('transaksi'));
    }
}
