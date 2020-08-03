<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
  public function index(Request $request)
  {
    $productos = Productos::all();
    return view('home', compact('productos'));
  }

  public function store(Request $request)
  {
    $producto = new Productos;
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    if ($request->hasFile('imagen')) {
      $file = $request->file('imagen');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/products/', $name1);
      $producto->imagen = $name1;
    }
    $producto->save();
    Session::flash('message', 'El producto se guardo con exito');
    return redirect()->route('home');
  }

  public function edit($id)
  {
    $producto = Productos::find($id);
    return view('editar', compact('producto'));
  }

  public function update(Request $request, $id)
  {
    $producto = Productos::find($id);
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    if ($request->hasFile('imagen')) {
      $file = $request->file('imagen');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/products/', $name1);
      $producto->imagen = $name1;
    }
    $producto->update();

    Session::flash('message', 'El prodcuto se edito con exito');
    return redirect()->route('home');
  }


  public function destroy($id)
  {
    Productos::find($id)->delete();
    Session::flash('message', 'El prodcuto se elimino con exito');
    return redirect()->route('home');
  }
}
