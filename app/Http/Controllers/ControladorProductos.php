<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Almacen;
use App\Models\ProductoAlmacen;

class ControladorProductos extends Controller
{

    public function index()
    {

        $productos = Producto::all();
        $categorias = Categoria::all();
        $almacenes = Almacen::all();
        $productos_almacenes = ProductoAlmacen::all();
        return view('contenido.productos.productos', ['productos' => $productos, 'categorias' => $categorias,
         'almacenes' => $almacenes, 'productos_almacenes' => $productos_almacenes]);
    }

    // FUNCIÓN QUE DEVUELVE LA CONSULTA DE LAS OTRAS TABLAS PARA RELLENAR LOS SELECT EN LA VISTA DE CREACIÓN DE PRODUCTOS
    public function createProductHelper()
    {

        $categorias = Categoria::all();
        $almacenes = Almacen::all();
        return view('contenido.productos.crearProducto', ['categorias' => $categorias,'almacenes' => $almacenes]);
    }

    public function show($id)
    {

        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $almacenes = Almacen::all();
        $productos_almacenes = DB::table('productos_almacenes')->where('id_producto', '=', $id)->get();
        return view('contenido.productos.editarProducto', ['producto' => $producto, 'categorias' => $categorias,
         'almacenes' => $almacenes, 'productos_almacenes' => $productos_almacenes]);
    }

    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->observaciones = $request->observaciones;
        $producto->id_categoria = $request->categoria;
        $producto->save();
        $almacenes=json_decode($request->almacenes);
        foreach ($almacenes as $almacen) {
            $producto_almacen = new ProductoAlmacen();
            $producto_almacen->id_producto = $producto->id;
            $producto_almacen->id_almacen = $almacen;
            $producto_almacen->save();
        }
        $request->session()->flash('success', 'Producto añadido correctamente.');
        return response()->json(["ruta"=>route('productos')]);
    }

    public function update(Request $request, $id)
    {

        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->observaciones = $request->observaciones;
        $producto->id_categoria = $request->categoria;
        $producto->update();
        $almacenes=json_decode($request->almacenes);
        $borrarRegistros = DB::table('productos_almacenes')->where('id_producto', '=', $id)->delete();
        foreach ($almacenes as $almacen) {
            $producto_almacen = new ProductoAlmacen();
            $producto_almacen->id_producto = $id;
            $producto_almacen->id_almacen = $almacen;
            $producto_almacen->save();
        }
        $request->session()->flash('success', 'Los datos del producto se han actualizado correctamente.');
        return response()->json(["ruta"=>route('productos')]);
    }

    public function destroy($id)
    {

        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos')->with('success','El producto se ha borrado correctamente.');
    }
}
