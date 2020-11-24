<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller {
    public function __consturct () {
      $this->middleware('auth');
    }
  public function index() {
    return view('layoutCustomer.home');
  }
  public function tentang()
  {
    return view('layoutCustomer.tentang');
  }
}
