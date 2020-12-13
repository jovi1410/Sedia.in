<?php

namespace App\Http\Controllers;
use App\User;
use App\Warung;
use App\Meja;
use Illuminate\Http\Request;

class AdminController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    return view('layoutAdmin.index');
  }
  public function create(Request $request)
    {
        $user = User::create([
            "name" => $request->input('name'),
            "alamat" => $request->input('alamat'),
            "no_hp" => $request->input('no_hp'),
            "email" => $request->input('email'),
            "password" => bcrypt('12345678'),
            "role" => 2
        ]);

// dd($user->id);
        $warung = Warung::create([
            "user_id" => $user->id,
            "nama_warung" => $request->input('nama_warung'),
            "stok_meja" => $request->input('stok_meja')
        ]);

        for($x = 0; $x < $warung->stok_meja; $x++){
          $meja = Meja::create([
            "no_meja" => $x+1,
            "warung_id" => $warung->id
          ]);
        }
        return back();
    }
    public function warung()
    {
      $warung= User::where('role',2)->get();
      return view('layoutAdmin.data_warung',compact('warung'));
    }
    public function customer()
    {
      $customer= User::where('role',3)->get();
      return view('layoutAdmin.data_customer',compact('customer'));
    }
}
