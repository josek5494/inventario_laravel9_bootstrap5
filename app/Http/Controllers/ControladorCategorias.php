<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Categoria;

class ControladorCategorias extends Controller
{
    public function index(){

        $categorias = Categoria::all();
        return view('contenido.categorias.categorias',['categorias'=>$categorias]);
    }

    public function show($id){

        $categoria = Categoria::find($id);
        return view('contenido.categorias.editarCategoria',['categoria'=>$categoria]);

    }

    public function store(Request $request){

        $categoria = new Categoria;
        $categoria -> nombre = $request->nombre;
        $categoria -> descripcion = $request->descripcion;
        $categoria -> save();
        $request->session()->flash('success', 'Categoría añadida correctamente.');
        return response()->json(["ruta"=>route('categorias')]);
    }

    public function update(Request $request, $id){

        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->update();
        $request->session()->flash('success', 'Los datos de la categoría se han actualizado correctamente.');
        return response()->json(["ruta"=>route('categorias')]);

    }

    public function destroy($id){

        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias')->with('success','La categoría se ha borrado correctamente.');

    }

}
