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
                        <h4>Categorías</h4>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('crearCategoria')}}"><button type="button" class="btn btn-primary add-new"><i class="fa fa-plus"></i>Añadir</button></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th class="col-sm-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->descripcion}}</td>
                        <td class="col-sm-1">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('mostrarCategoria',$categoria->id) }}" class="btn btn-warning" title="Editar" data-toggle="tooltip">Editar</a>
                                <form action="{{ route('eliminarCategoria',$categoria->id) }}" method="POST" class="ms-2">
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