let id = null;

document.addEventListener("DOMContentLoaded", function () {

    const url = window.location.pathname.split("/");
    id = url[url.length - 1];

    if(id){
        cargarUsuario(id);
    }

});

function cargarUsuario(id){

    fetch("../../usuarios/obtenerUsuario/" + id) // 👈 usa ruta absoluta
    .then(res => res.json())
    .then(data => {

        if(data.status !== "success"){
            alert("No se pudo cargar el usuario");
            return;
        }

        let usuario = data.data; // 👈 AQUÍ ESTÁ LA CLAVE
        console.log(usuario)
        $("#nombre").val(usuario.nombre || "No hay Nombre");
        $("#apellidoP").val(usuario.apellidoP || "No hay apellido P");
        $("#apellidoM").val(usuario.apellidoM || "No hay Apellido M");
        $("#correo").val(usuario.correo || "No hay Correo");
        $("#rfc").val(usuario.rfc || "No hay RFC");
        $("#curp").val(usuario.curp || "No hau CURP");

    })
    .catch(error => {
        console.error("Error cargando usuario:", error);
    });

}