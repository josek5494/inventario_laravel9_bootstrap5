@extends('app')

@section('contenido')
<div class="container col-md-4 mt-5">
    <div class="d-flex justify-content-center">
    <h4>Crear nuevo producto</h4>
    </div>
</div>
<div class="container col-md-4 border p-4 mt-2">
    <form name="formularioCrearProducto" id="formularioCrearProducto">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" min="0" value="0.00" step=".01">
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <div><textarea class="form-control" name="observaciones" id="observaciones" rows=2></textarea></div>
        </div>
        <div class="mb-3">
            <div class="col-sm-12">
                <label for="categoria" class="form-label">Categoría</label>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                    <select class="form-select" name="categoria" id="categoria">
                        @if ($categorias->isEmpty())
                            <option value=0 selected>No hay categorías</option>
                        @else
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('crearCategoria')}}"><button type="button" class="btn btn-primary">Añadir categoría</button></a>
                    </div>
                </div>
        </div>
        <div class="mb-4">
            <div class="col-sm-12">
            <label for="almacen" class="form-label">Almacén</label>
            </div>
            <div class="row">
                <div class="col-sm-8">
                <select class="form-select" name="almacen" id="almacen" multiple="multiple">
                    @if ($almacenes->isEmpty())
                            <option value=0 selected>No hay almacenes</option>
                        @else
                            @foreach ($almacenes as $almacen)
                                <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                            @endforeach
                        @endif
                </select>
                </div>
                <div class="col-sm-4">
                    <a href="{{route('crearAlmacen')}}"><button type="button" class="btn btn-primary">Añadir almacén</button></a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary col-sm-3">Añadir producto</button>
        <data type="hidden" value="{{route('guardarProducto')}}" id="rutaCrearProducto"></data>
        </div>
    </form>
    <div id="alertasError"></div>
</div>
<script type="text/javascript">

    window.$( "#formularioCrearProducto" ).on("submit",function(event) {
        
        event.preventDefault();
        event.stopPropagation();

        let divAlertas = document.getElementById("alertasError");
        let valid = true;

        let nombre = document.getElementById("nombre").value;
        let precio = document.getElementById("precio").value;
        // FORMATEA LA CIFRA DEL PRECIO CON DOS DECIMALES
        precio = Math.round(precio*100)/100;
        let observaciones = document.getElementById("observaciones").value;
        let categoria = document.getElementById("categoria").value;
        let almacenes = document.getElementById("almacen");

        if(nombre==""||precio==""||observaciones==""||categoria==""
            ||categoria == 0||almacenes.selectedOptions.length == 0||almacenes.selectedOptions[0] == 0){
            
            divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>Debe introducir todos los campos.</h5>";
            valid=false;

        } else if(nombre.length<3) {

            divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>El nombre debe tener al mínimo 3 caracteres</h5>";
            valid=false;

        }

        if(valid){

            // --- TRANSFORMA LOS CAMPOS VALUE DEL ELEMENTO HTML EN UN OBJETO JSON PARA AGILIZAR EL ENVÍO DE DATOS ---------
            let almacenesJson = {};
            let indice = 0;
            Array.from(almacenes.selectedOptions).forEach(function(opcion) 
            {
                almacenesJson[indice] = opcion.value;
                indice++;
            });
            // ------------------------------------------------------------------------------------------------------------
            let request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: document.getElementById('rutaCrearProducto').value,
                dataType: 'json',
                data: {
                    nombre: nombre,
                    precio: precio,
                    observaciones: observaciones,
                    categoria: categoria,
                    almacenes: JSON.stringify(almacenesJson)
                }
            })
            request.done(function(respuesta) {
                window.location = respuesta.ruta;
            });
            request.fail(function( jqXHR, estado, error) {
                divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>Error al crear el producto.</h5>";
            });

        }

    });
</script>
@endsection
