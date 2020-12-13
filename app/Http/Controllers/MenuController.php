<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Warung as warung;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idPemilik = Auth::id();
        $idWarung = warung::where('user_id', $idPemilik)->pluck('id_warung')->first();

        $makanan = Menu::where('id_warung', $idWarung)->where('jenis_menu', 'makanan')->where('isDelete', 0)->get();
        $minuman = Menu::where('id_warung', $idWarung)->where('jenis_menu', 'minuman')->where('isDelete', 0)->get();

        return view('layoutWarung.daftarmenu',compact('makanan','minuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layoutWarung.tambahmenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         // dd($request->all());

        //  if ($request->file('avatar')) {
        //     $image_path = $request->file('avatar')->store('avatar_product', 'public');
        //     $data->avatar = $request->file('avatar')->getClientOriginalName();
        // } else $data->avatar = 'Tidak Ada Gambar';

        if($request->hasFile('avatar')){
          $request->file('avatar')->move('avatar_product/',$request->file('avatar')->getClientOriginalName());
        }

        $data = new Menu();
        $data->id_warung = Auth::id();
        $data->nama_menu = $request->namamenu;
        $data->jenis_menu = $request->jenismenu;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->avatar = $request->file('avatar')->getClientOriginalName();
        $data->created_by = Auth::id();
        $data->save();
        return redirect()->route('menu.index')->with('alert-success','Berhasil Menambahkan Data!');
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
        $data_menu = Menu::find($id);
        return view('layoutWarung.edit',compact('data_menu'));
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
        $data_menu = Menu::find($id);
        $data_menu->nama_menu = $request->namamenu;
        $data_menu->jenis_menu = $request->jenismenu;
        $data_menu->harga = $request->harga;
        $data_menu->stok = $request->stok;
        if($request->hasFile('avatar')){
          $request->file('avatar')->move('avatar_product/',$request->file('avatar')->getClientOriginalName());
          $data_menu->avatar = $request->file('avatar')->getClientOriginalName();
        }
        $data_menu->update();
        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data_menu = Menu::find($id);
        $data_menu->isDelete = 1;
        $data_menu->update();
        return redirect('/menu');
    }
}
