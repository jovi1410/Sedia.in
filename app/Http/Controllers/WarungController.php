<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarungController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    return view('layoutWarung.index');
  }
  
}
