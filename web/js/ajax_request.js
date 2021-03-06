//var urlBase = "http://consulta.ustgm.net";
var urlBase = "http://localhost";

function postNewUser(dataPost) {
    $.ajax({
        type: "post",
        url: urlBase + "/mrd/public/api/user/new",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(dataPost),
        beforeSend: function () {
            console.log("Nuevo usuario...");
            $("#newUser-alert").html('<div class="alert alert-success" role="alert">Enviando Infromacion</div >');
        },
        success: function (response) {
            console.log("Respuesta del servidor POST: ");
            console.log(response);
            //
            $("#newUser-alert").html(
                '<div class="alert alert-success" role="alert">Usuario Creado Correctamente</div >'
            );
            //Llamar a la funcion para volver a cargar usuarios
            getUser(usuarioRegion);
            //Limpiamos el formulario
            clearModalNewUserForm();
            //cerramos el formulario modal
            $("#nuevoUsuarioModal").modal("toggle");
        },
        error: function () {
            console.log("A ocurrido un error");
            $("#newUser-alert").html(
                '<div class="alert alert-warning" role="alert">Error al crear nuevo usuario</div >'
            );
        },
        timeout: 1000,
    });
}

function deleteUser(dataPost) {
    $.ajax({
        type: "delete",
        url: urlBase + "/mrd/public/api/user",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(dataPost),
        beforeSend: function () {
            console.log("Borrando usuario...");
            console.log(data);
            $("#confirmDeleteUser-Alert").html('<div class="alert alert-success" role="alert">Borrando Usuario</div >');
        },
        success: function (response) {
            console.log("Respuesta del servidor POST: ");
            console.log(response);
            $("#confirmDeleteUser-Alert").html(
                '<div class="alert alert-success" role="alert">Usuario Borrado, Saliendo...</div >'
            );

            sleep(2000).then(() => {
                $("#confirmDeleteUser").modal("toggle");
                clearModalDeleteUser();
            });

            //Llamar a la funcion para volver a cargar usuarios
            getUser(usuarioRegion);
        },
        error: function () {
            console.log("A ocurrido un error");
            $("#confirmDeleteUser-Alert").html(
                '<div class="alert alert-danger" role="alert">Ocurrio un error, no se pudo borrar el usuario</div >'
            );
        },
        timeout: 1000,
    });
}

function editPsw(dataPost) {
    $.ajax({
        type: "post",
        url: urlBase + "/mrd/public/api/user/editpsw",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(dataPost),
        beforeSend: function () {
            console.log("Actualizando user...");
            $("#editPasswordModal-Alert").html(
                '<div class="alert alert-primary" role="alert">Actualizando Usuario</div >'
            );
        },
        success: function (response) {
            console.log("Respuesta del servidor POST: ");
            console.log(response);
            $("#editPasswordModal-Alert").html(
                '<div class="alert alert-success" role="alert">Usuario Actualizado, Saliendo...</div >'
            );

            sleep(2000).then(() => {
                $("#editPasswordModal").modal("toggle");
                clearModalPasswordModal();
            });

            //Llamar a la funcion para volver a cargar usuarios
            getUser(usuarioRegion);
        },
        error: function () {
            console.log("A ocurrido un error");
            $("#editPasswordModal-Alert").html(
                '<div class="alert alert-danger" role="alert">Ocurrio un error, no se pudo actualizar el usuario</div >'
            );
        },
        timeout: 1000,
    });
}

function getReportByDate(fechainicial, fechaFinal, region) {
    let url;
    //Si se paso el argumento lo agregamos a al url
    if (fechaFinal) {
        url = urlBase + "/mrd/public/api/reporte/" + fechainicial + "/" + fechaFinal + "/" + region;
        console.log("Buscar entre 2 fechas: " + fechainicial + " " + fechaFinal);
    } else {
        url = urlBase + "/mrd/public/api/reporte/" + fechainicial + "/" + region;

        console.log("Buscar por fecha: " + fechainicial);
    }

    $.get(url, function (response) {
        //console.log(response['error']);
        //console.log(response['msg']);
        data = response;

        if (!response["error"]) {
            limpiarLista();
            response.forEach((element, index) => {
                $("#listaReportes").append(
                    '<div class="input-group-prepend"><div class="input-group-prepend" style="border: solid 1px; border-color: lightgrey; margin: 5px"><input id="' +
                        element["Folio"] +
                        '" type="checkbox" onclick="seleccionarReporte(' +
                        element["Folio"] +
                        ')"></div><a class="list-group-item list-group-item-action" onClick="fillCard(' +
                        index +
                        ')">' +
                        element["Folio"] +
                        "</a></div>"
                );
                //<a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                // console.log(element['Fecha']);
            });
            indice = 0;
            fillCard(indice);
            $("#divBtnMostrarTicket").html(
                '<button type="button" onclick="mostrarTicket()" class="btn btn-primary">Mostrar Ticket</button>'
            );
            console.log(response);
        } else {
            if (fechaFinal) {
                $("#cardTitle").html(
                    '<div class="alert alert-warning card-title" role="alert">No hay reportes entre las fechas: ' +
                        fechainicial +
                        " y " +
                        fechaFinal +
                        "</div >"
                );
            } else {
                $("#cardTitle").html(
                    '<div class="alert alert-warning card-title" role="alert">No hay reportes en esta fecha: ' +
                        fechainicial +
                        "</div >"
                );
            }
            $("#divBtnMostrarTicket").html("");
            limpiarCard();
            limpiarLista();
            //Limpiar
        }
    });
}

function getReportByFolio(fecha, region) {
    $.get(urlBase + "/mrd/public/api/buscar/" + fecha + "/" + region, function (response) {
        //console.log(response['error']);
        //console.log(response['msg']);
        data = response;

        if (!response["error"]) {
            limpiarLista();
            response.forEach((element, index) => {
                $("#listaReportes").append(
                    '<a href="#" class="list-group-item list-group-item-action" onClick="fillCard(' +
                        index +
                        ')">' +
                        element["Folio"] +
                        "</a>"
                );
            });
            indice = 0;
            fillCard(indice);
        } else {
            $("#cardTitle").html(
                '<div class="alert alert-warning card-title" role="alert">No hay reportes con el Folio: ' +
                    fecha +
                    "</div >"
            );
            limpiarCard();
        }
    });
}

//*Obtiene los ususarios
function getUser(region) {
    $.ajax({
        type: "get",
        url: urlBase + "/mrd/public/api/user/" + region,
        beforeSend: function () {
            console.log("Enviando usuario.");
        },
        cache: false,
        success: function (response) {
            switch (response["code"]) {
                case 200:
                    console.log(response);
                    break;

                case 204:
                    userAlert(false, response["msg"]);
                    userFormClean();
                    formReset();
                    break;

                default:
                    usuarioData = response;
                    console.log(response);
                    fillUsers(usuarioData);
                    userAlert(true, "Usuarios Cargados correctamente");
                    formReset();
                    break;
            }
        },
        error: function () {
            console.log("A ocurrido un error");
            userAlert(false, "No se ha podido recuperar la informacion de los usuarios. Error: ");
        },
        timeout: 1000,
    });
}

//Actualiza Ususarios
function updateUserPost(dataPost) {
    $.ajax({
        type: "post",
        url: urlBase + "/mrd/public/api/user/update",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(dataPost),
        beforeSend: function () {
            console.log("Modificando usuario...");
        },
        success: function (response) {
            console.log("Respuesta del servidor POST: ");
            console.log(response);
            //Llamar a la funcion para volver a cargar usuarios
            getUser(usuarioRegion);
        },
        error: function () {
            console.log("A ocurrido un error");
            console.log(response);
        },
        timeout: 1000,
    });
}

function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}
