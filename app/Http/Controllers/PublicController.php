<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;

class PublicController extends Controller
{
  public function index()
  {
    $productos = Productos::all();
    return view('welcome', compact('productos'));
  }
}
