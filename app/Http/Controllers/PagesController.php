<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class PagesController extends Controller
{
    // public function inicio(){
    //     $notas = App\Nota::all();
    // 	return view('welcome',compact('notas'));
    // }
    // mostrar todo de bd
    public function inicio(){
        $notas = App\Nota::paginate(2);
        return view('welcome',compact('notas'));
    }

    public function detalle($id){
        // ssi no encuentra ese id manda a la pag 404
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }
     // request captura toda la informacion del formulario
    public function crear(Request $request){
        // return $request->all();
        // validar los campos vacios
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
            ]);

        $notaNueva = new App\Nota;
        $notaNueva->nombre =  $request->nombre;
        $notaNueva->descripcion =  $request->descripcion;
         // guardar en base de dato
        $notaNueva->save();
         // regresar de vuelta a pag anterior
        return back()->with('mensaje','Nota agregada');
    }

    public function editar($id){
        // buscar en base de dtos
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){

        $notaUpdate = App\Nota::findOrFail($id);

        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;

        $notaUpdate->save();

        return back()->with('mensaje', 'Nota actiualizada');

    }

    public function eliminar($id){
                         // modelo
        $notaeliminar = App\Nota::findOrFail($id);
        $notaeliminar->delete();

        return back()->with('mensaje', 'Nota Eliminada');
    }





    public function fotos(){
    	return view('fotos');
    }

    public function nosotros($nombre=null){


    $equipo = ['Ignacio','Juanito','Pedrito'];
        // array asociativo
	// return view('nosotros',['equipo'=>$equipo]);
	return view('nosotros',compact('equipo','nombre'));

    }
     
     public function noticias(){
    	return view('blog');
    }

}
