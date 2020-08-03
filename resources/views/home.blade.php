@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Lista de Productos</div>
          <div class="card-body">
            @if (session('message'))
              <div class="alert alert-success" role="alert">
                {{ session('message') }}
              </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Agregar Producto
            </button>
            <hr>
            <div class="row">
              @foreach($productos as $product)
              <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                  <img src="{{ url('img/products/'.$product->imagen) }}" class="card-img-top" alt="{{$product->nombre}}">
                  <div class="card-body">
                  <h5 class="card-title">{{$product->nombre}}</h5>
                  <p class="card-text">{{$product->descripcion}}</p>
                  <p class="card-text">{{$product->precio}}</p>
                  <a href="{{route('editar',$product->id)}}" class="btn btn-primary">Ver Detalles</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('crear')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" class="form-control"  name="descripcion" style="resize: none"></textarea>
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio">
          </div>
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
