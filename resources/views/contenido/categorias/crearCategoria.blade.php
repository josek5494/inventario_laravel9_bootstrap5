@extends('app')

@section('contenido')
<div class="container col-md-4 mt-5">
    <div class="d-flex justify-content-center">
    <h4>Crear nueva categoría</h4>
    </div>
</div>
<div class="container col-md-4 border p-4 mt-2">
    <form name="formularioCrearCategoria" id="formularioCrearCategoria">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <div><textarea class="form-control" name="descripcion" id="descripcion" rows=2></textarea></div>
        </div>
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary col-sm-3">Añadir</button>
        <data type="hidden" value="{{route('guardarCategoria')}}" id="rutaCrearCategoria"></data>
        </div>
    </form>
    <div id="alertasError"></div>
</div>
<script type="text/javascript">

    window.$( "#formularioCrearCategoria" ).on("submit",function(event) {
        
        event.preventDefault();
        event.stopPropagation();

        let divAlertas = document.getElementById("alertasError");
        let valid = true;

        let nombre = document.getElementById("nombre").value;
        let descripcion = document.getElementById("descripcion").value;

        if(nombre==""||descripcion==""){
            
            divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>Debe introducir todos los campos.</h5>";
            valid=false;

        } else if(nombre.length<3) {

            divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>El nombre debe tener al mínimo 3 caracteres</h5>";
            valid=false;

        }

        if(valid){

            let request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: document.getElementById('rutaCrearCategoria').value,
                dataType: 'json',
                data: {
                    nombre: nombre,
                    descripcion: descripcion
                }
            })
            request.done(function(respuesta) {
                window.location = respuesta.ruta;
            });
            request.fail(function( jqXHR, estado, error) {
                divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>Error al crear la categoría.</h5>";
            });

        }

    });
</script>
@endsection
