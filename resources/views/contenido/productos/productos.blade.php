@extends('app')

@section('contenido')
<div class="container border p-4 mt-4">
    @if (session('success'))
        <h5 class="alert alert-success">{{session('success')}}</h5>
    @endif
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-11 pb-4">
                        <h4>Productos</h4>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('crearProducto')}}"><button type="button" class="btn btn-primary add-new"><i class="fa fa-plus"></i>Añadir</button></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Almacenes</th>
                        <th>Observaciones</th>
                        <th class="col-sm-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->precio}}</td>
                            @foreach ($categorias as $categoria)
                                @if ($categoria->id == $producto->id_categoria)
                                    <td>{{$categoria->nombre}}</td>
                                @endif
                            @endforeach
                            <td>
                                @foreach ($productos_almacenes as $producto_almacen)
                                    @if ($producto_almacen->id_producto == $producto->id)
                                        @foreach ($almacenes as $almacen)
                                            @if ($almacen->id == $producto_almacen->id_almacen)
                                                {{$almacen->nombre}}&nbsp;
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$producto->observaciones}}</td>
                            <td class="col-sm-1">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('mostrarProducto',$producto->id) }}" class="btn btn-warning" title="Editar" data-toggle="tooltip">Editar</a>
                                    <form action="{{ route('eliminarProducto',$producto->id) }}" method="POST" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Eliminar" data-toggle="tooltip">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection