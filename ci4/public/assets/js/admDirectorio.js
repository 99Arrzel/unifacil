function insertarCiudad() {
    var formData = {
        nombre: document.getElementById("ciudad").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url:   "/adm-dir/insertarCiudad",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#tblCiudad").load(window.location.href + " #tblCiudad"); //Reload altas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
    })
}
function insertarGestion() {
    var formData = {
        nombre: document.getElementById("gestion").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url:   "/adm-dir/insertarGestion",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#tblGestion").load(window.location.href + " #tblGestion"); //Reload altas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
    })
}
function insertarFacultad() {
    var formData = {
        nombre: document.getElementById("facultad").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url:   "/adm-dir/insertarFacultad",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#tblFacultad").load(window.location.href + " #tblFacultad"); //Reload altas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
    })
}
function insertarCarrera() {
    var formData = {
        nombre: document.getElementById("carrera").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url:   "/adm-dir/insertarCarrera",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#tblCarrera").load(window.location.href + " #tblCarrera"); //Reload altas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
    })
}
function insertarSemestre() {
    var formData = {
        nombre: document.getElementById("semestre").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url:   "/adm-dir/insertarSemestre",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#tblSemestre").load(window.location.href + " #tblSemestre"); //Reload altas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
    })
}
function insertarMateria() {
    var formData = {
        nombre: document.getElementById("materia").value,
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "/adm-dir/insertarMateria",
        data: formData,
        dataType: "json",
        statusCode: {
            500: function () {
                alert("Error 500, chequea el script amiguito");
            }
        },
        encode: true,
    }).done(function (resultado) {
        $("#tblMateria").load(window.location.href + " #tblMateria"); //Reload altas
        if (resultado.baja == true) {
            swal("Cambio realizado con exito");
        } else {
            swal("Fallo al cambiar");
        }
        $(document).ready(function() {$('#tblMateria').bootstrapTable("destroy");
        $('#tblMateria').bootstrapTable();})
        
    })
}