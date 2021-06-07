$(document).ready(mostrar());
$('#tablasVistas').bootstrapTable();
$('#tablasNoVistas').bootstrapTable();
$('#insertar').bootstrapTable();
//DAVID SOS MARICON PASAME DE EDA XD
function suscrito(id) {
    var formData = {
        miid: id,
        estadoSub: document.getElementById("sus" + id).value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/ListarUsuarios/suscrito",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#recargarTabla").load(window.location.href + " #recargarTabla"); //Reload altas
        $("#recargarTablaBaja").load(window.location.href + " #recargarTablaBaja"); //Reload bajas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
    })
}
function restaurar(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/ListarUsuarios/restaurar",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        complete: mostrar(),
        encode: true,
    }).done(function (resultado) {
        $("#recargarTabla").load(window.location.href + " #recargarTabla"); //Reload altas
        $("#recargarTablaBaja").load(window.location.href + " #recargarTablaBaja"); //Reload bajas
        window.onload = mostrar();
        if (resultado.baja == true) {
            swal("Usuario restaurado");
        } else {
            swal("Fallo al restaurar");
        }
    })
}
function mostrar() {
    if (document.getElementById("botonOcultar").innerHTML == "Mostrar de alta") {
        //
        document.getElementById("botonOcultar").innerHTML = "Mostrar de baja";
        document.getElementById("recargarTablaBaja").hidden = true;
        document.getElementById("recargarTabla").hidden = false;
        document.getElementById("botonOcultar").className = "btn btn-primary";
        //
    } else {
        document.getElementById("recargarTablaBaja").hidden = false;
        document.getElementById("botonOcultar").innerHTML = "Mostrar de alta";
        document.getElementById("botonOcultar").className = "btn btn-success";
        document.getElementById("recargarTabla").hidden = true;
    }
}
function eliminar(id) {
    var formData = {
        miid: id
    };
    $.ajax({
        type: "POST",
        url: "/ListarUsuarios/eliminar",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#recargarTabla").load(window.location.href + " #recargarTabla"); //Reload altas
        $("#recargarTablaBaja").load(window.location.href + " #recargarTablaBaja"); //Reload bajas
        if (resultado.baja == true) {
            swal("Usuario dado de baja");
        } else {
            swal("Fallo al dar de baja");
        }
    })
}
function editar(id) {
    if (document.getElementById("bttnEditar" + id).innerHTML == "Guardar") {
        var formData = {
            miid: id,
            nombre: document.getElementById("nom" + id).value,
            apellido: document.getElementById("ape" + id).value,
            login: document.getElementById("log" + id).value,
            email: document.getElementById("ema" + id).value,
            nivel: document.getElementById("niv" + id).value,
        };
        //console.log(formData);
        $.ajax({
            type: "POST",
            url: "/ListarUsuarios/guardar",
            data: formData,
            dataType: "json",
            statusCode: {
                500: function () {
                    alert("Error 500, No pongas mismo correo o login.");
                }
            },
            encode: true,
        }).done(function (resultado) {
            if (resultado.exists == true) {
                swal("Guardado con exito");
            } else {
                swal("Error al guardar");
            }
        });
        //event.preventDefault(); no es type submit
    }
    if (document.getElementById("bttnEditar" + id).innerHTML == "Editar") {
            document.getElementById("bttnEditar" + id).innerHTML = "Guardar";
            document.getElementById("bttnEditar" + id).className = "btn btn-success form-control";
            document.getElementById("nom" + id).disabled = false;
            document.getElementById("ape" + id).disabled = false;
            document.getElementById("log" + id).disabled = false;
            document.getElementById("ema" + id).disabled = false;
            document.getElementById("niv" + id).disabled = false;
    } else {
        document.getElementById("bttnEditar" + id).innerHTML = "Editar";
        document.getElementById("bttnEditar" + id).className = "btn btn-warning form-control";
        document.getElementById("nom" + id).disabled = true;
        document.getElementById("ape" + id).disabled = true;
        document.getElementById("log" + id).disabled = true;
        document.getElementById("ema" + id).disabled = true;
        document.getElementById("niv" + id).disabled = true;
    }
}