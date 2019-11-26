@extends('plantilla')

@section('seccion')

   <h1>Editar nota {{ $nota->id }}</h1>

    @if (session('mensaje')) 
     <div class="alert alert-success">{{ (session('mensaje')) }}</div>

    @endif

   <form action="{{ route('notas.update', $nota->id ) }}" method="POST">
        <!-- name mismo nombre que base de datos -->
        <!-- ocultamente este form usa PUT -->
        @method('PUT')
        @csrf
    

        <!-- old recordar la que escribio el cliente -->
        <input type="text" name="nombre" 
        placeholder="Nombre" 
        class="form-control mb-2" 
        value="{{ $nota->nombre }}">

        <input type="text" name="descripcion"
         placeholder="Descripcion" 
         class="form-control mb-2" 
         value="{{ $nota->descripcion }}">

        <button class="btn btn-warning btn-block" type="submit">Editar</button>
    </form>

@endsection