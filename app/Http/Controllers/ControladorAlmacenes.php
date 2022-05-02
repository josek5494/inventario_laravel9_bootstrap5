<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Almacen;

class ControladorAlmacenes extends Controller
{
    public function index(){

        $almacenes = Almacen::all();
        return view('contenido.almacenes.almacenes',['almacenes'=>$almacenes]);
    }

    public function show($id){

        $almacen = Almacen::find($id);
        return view('contenido.almacenes.editarAlmacen',['almacen'=>$almacen]);

    }

    public function store(Request $request){

        $almacen = new Almacen;
        $almacen -> nombre = $request->nombre;
        $almacen -> localizacion = $request->localizacion;
        $almacen -> save();
        $request->session()->flash('success', 'Almacén añadido correctamente.');
        return response()->json(["ruta"=>route('almacenes')]);
    }

    public function update(Request $request, $id){

        $almacen = Almacen::find($id);
        $almacen->nombre = $request->nombre;
        $almacen->localizacion = $request->localizacion;
        $almacen->update();
        $request->session()->flash('success', 'Los datos del almacén se han actualizado correctamente.');
        return response()->json(["ruta"=>route('almacenes')]);

    }

    public function destroy($id){

        $almacen = Almacen::find($id);
        $almacen->delete();
        return redirect()->route('almacenes')->with('success','El almacén se ha borrado correctamente.');

    }

}
