@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Editar Producto</div>
          <div class="card-body">
            @if (session('message'))
              <div class="alert alert-success" role="alert">
                {{ session('message') }}
              </div>
            @endif
            <hr>

              <form method="post" action="{{ route('actulizar',$producto->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" value="{{$producto->nombre}}" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea id="descripcion" class="form-control"  name="descripcion" style="resize: none">{{$producto->descripcion}}</textarea>
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="text" class="form-control" name="precio" value="{{$producto->precio}}" id="precio">
                </div>
                <div class="form-group">
                  <img src="{{ url('img/products/'.$producto->imagen) }}" style="width:20%" class="card-img-top" alt="{{$producto->nombre}}">
                </div>
                <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <input type="file" class="form-control" name="imagen" id="imagen">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Actulizar</button>
                </div>
              </form>
              <div class="form-group float-right">
                <form class="user"  action="{{route('borrar', $producto->id)}}" method="post">
                  {{ method_field('delete') }}
                  {{csrf_field()}}
                  <button class="btn btn-danger pull-right" onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

