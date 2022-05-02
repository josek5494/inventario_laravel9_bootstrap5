@extends('app')

@section('contenido')
<div class="container col-md-4 mt-5">
    <div class="d-flex justify-content-center">
    <h4>Crear nuevo almacén</h4>
    </div>
</div>
<div class="container col-md-4 border p-4 mt-2">
    <form name="formularioCrearAlmacen" id="formularioCrearAlmacen">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="mb-3">
            <label for="localizacion" class="form-label">Localización</label>
            <input type="text" class="form-control" name="localizacion" id="localizacion">
        </div>
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary col-sm-3">Añadir</button>
        </div>
    </form>
    <div id="alertasError"></div>
    <data type="hidden" value="{{route('guardarAlmacen')}}" id="rutaCrearAlmacen"></data>
</div>
<script type="text/javascript">

    window.$( "#formularioCrearAlmacen" ).on("submit",function(event) {
        
        event.preventDefault();
        event.stopPropagation();

        let divAlertas = document.getElementById("alertasError");
        let valid = true;

        let nombre = document.getElementById("nombre").value;
        let localizacion = document.getElementById("localizacion").value;

        if(nombre==""||localizacion==""){
            
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
                url: document.getElementById('rutaCrearAlmacen').value,
                dataType: 'json',
                data: {
                    nombre: nombre,
                    localizacion: localizacion
                }
            })
            request.done(function(respuesta) {
                window.location = respuesta.ruta;
            });
            request.fail(function( jqXHR, estado, error) {
                divAlertas.innerHTML = "<h5 class='alert alert-danger mt-4'>Error al crear el almacén.</h5>";
            });

        }

    });
</script>
@endsection
