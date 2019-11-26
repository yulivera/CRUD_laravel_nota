@extends('plantilla')

@section('seccion')

<div class="row my-4">
  <div class="col-12">
     <h1>Notas</h1>   
   @if(session('mensaje'))
   <div class="alert alert-success">
       {{ session('mensaje') }}
   </div>
   @endif
    <form action="{{ route('notas.crear') }}" method="POST">
        <!-- name mismo nombre que base de datos -->
        @csrf
         <!-- validar campos vacios -->
        @error('nombre')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            El nombre es obligatorio
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" >&times;</span>
            </button>
          </div>
        @enderror

        @error('descripcion')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            La descripcion es obligatorio
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" >&times;</span>
            </button>
          </div>
        @enderror

        <!-- old recordar la que escribio el cliente -->
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}">

        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ old('descripcion') }}">

        <button class="btn btn-primary btn-block" type="submit">agregar</button>

</div>

  </div>
    <div class="col-12">
       </form>


   <table class="table">
       <thead>
           <tr>
               <th scope="col">#id</th>
               <th scope="col">Nombre</th>
               <th scope="col">descripcion</th>
               <th scope="col">Acciones</th>
           </tr>
       </thead>
       <tbody>
        @foreach($notas as $item)
           <tr>
               <th scope="row">{{ $item->id }}</th>
               <th>
                  <a href="{{ route('notas.detalle',$item) }}">
                       {{$item->nombre}}
                  </a>
              </th>
               <th>{{$item->descripcion}}</th>
               
               <th>
                 <a href="{{ route('notas.editar', $item) }}" class="btn btn-warning btn-sm">Aditar</a>

                 <form action="{{ route('notas.eliminar', $item) }}" method="POST"
                 class="d-inline">

                  @method('DELETE')
                  @csrf
                   <button class="btn btn-danger btn-sm" type="submit">
                     Eliminar
                   </button>
                 </form>
               </th>

           </tr>
           @endforeach()
       </tbody>
   </table> 
    </div>
   

{{ $notas->links() }}

@endsection