//Funcion de inicio
var data;
var region;

var usuarioData;
var usuarioRegion;

var editRegion;
var currentUserID;

$(document).ready(function () {
    let fecha;

    //Default
    //Peticion GET Reportes coatepec
    $("#cabecera").text("Monstando reportes: Coatepec");
    region = "coatepec";
    fecha = moment().format("YYYY-MM-DD");
    setListTitle(region);
    getReportByDate(fecha, region);

    $("#nuevoUsuario-drop").text("Coatepec");

    //Ocultar secciones
    $("#contenedor_usuarios").hide();

    //Selectpr Coatepec
    $("#selectCoa").click(function () {
        $("#cabecera").text("Monstando reportes: Coatepec");
        //Peticion GET Reportes coatepec
        region = "coatepec";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Cordoba
    $("#selectCordoba").click(function () {
        $("#cabecera").text("Monstando reportes: Cordoba");
        //Peticion GET Reportes coatepec
        region = "cordoba";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Coatza
    $("#selectCoatza").click(function () {
        $("#cabecera").text("Monstando reportes: Coatzacoalcos");
        //Peticion GET Reportes coatepec
        region = "coatzacoalcos";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Mina
    $("#selectMina").click(function () {
        $("#cabecera").text("Monstando reportes: Minatitlan");
        //Peticion GET Reportes coatepec
        region = "minatitlan";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Puebla
    $("#selectPuebla").click(function () {
        $("#cabecera").text("Monstando reportes: Puebla");
        //Peticion GET Reportes coatepec
        region = "puebla";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr PozaRica
    $("#selectPozaRica").click(function () {
        $("#cabecera").text("Monstando reportes: Poza Rica");
        //Peticion GET Reportes coatepec
        region = "poza_rica";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Veracruz
    $("#selectVeracruz").click(function () {
        $("#cabecera").text("Monstando reportes: Veracruz");
        //Peticion GET Reportes coatepec
        region = "veracruz";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Xalapa
    $("#selectXalapa").click(function () {
        $("#cabecera").text("Monstando reportes: Xalapa");
        //Peticion GET Reportes coatepec
        region = "xalapa";
        fecha = $("#fechaInicial").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr All
    $("#selectAll").click(function () {
        $("#cabecera").text("Monstando reportes: Todas");
    });

    //Boton buscar por Fecha
    $("#btnFecha").click(function () {
        //* Fecha inicial
        fecha = $("#fechaInicial").val();
        //* Final
        let fechaFinal = $("#fechaFinal").val();

        if (fechaFinal && $("#chboxHabilitarFechaFinal").prop("checked")) {
            getReportByDate(fecha, fechaFinal, region);
        } else {
            if (fecha) {
                fechaFinal = "";
                getReportByDate(fecha, fechaFinal, region);
            } else {
                alert("Debe seleccionar una fecha para busqueda");
            }
        }
    });

    //Boton buscar por folio
    $("#btnFolio").click(function () {
        let folio = $("#folio").val();
        if (folio) {
            getReportByFolio(folio, region);
        } else {
            alert("Debe seleccionar un folio para busqueda");
        }
    });

    //?########################################
    //? Selector de usuarios
    //?########################################
    // User Coatepec
    $("#selectUserCoa").click(function () {
        usuarioRegion = "coatepec";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Cordoba
    $("#selectUserCordoba").click(function () {
        usuarioRegion = "cordoba";
        setTituloUsiario("Mostrando Usuarios De: Cordoba");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Coatza
    $("#selectUserCoatza").click(function () {
        usuarioRegion = "coatzacoalcos";
        setTituloUsiario("Mostrando Usuarios De: Coatzacoalcos");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Minatitlan
    $("#selectUserMina").click(function () {
        usuarioRegion = "minatitlan";
        setTituloUsiario("Mostrando Usuarios De: Minatitlan");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Puebla
    $("#selectUserPuebla").click(function () {
        usuarioRegion = "puebla";
        setTituloUsiario("Mostrando Usuarios De: Puebla");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User poza Rica
    $("#selectUserPozaRica").click(function () {
        usuarioRegion = "poza_rica";
        setTituloUsiario("Mostrando Usuarios De: Poza Rica");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Vercaruz
    $("#selectUserVeracruz").click(function () {
        usuarioRegion = "veracruz";
        setTituloUsiario("Mostrando Usuarios De: Veracruz");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Xalapa
    $("#selectUserXalapa").click(function () {
        usuarioRegion = "xalapa";
        setTituloUsiario("Mostrando Usuarios De: Xalapa");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User All
    $("#selectUserAll").click(function () {});

    //?Editor de region
    //Edit Coa
    $("#editUserCoa").click(function () {
        editRegion = "coatepec";
    });

    //Edit Cordoba
    $("#editUserCordoba").click(function () {
        editRegion = "cordoba";
    });

    //Edit Coatza
    $("#editUserCoatza").click(function () {
        editRegion = "coatzacoalcos";
    });

    //Edit Mina
    $("#editUserMina").click(function () {
        editRegion = "minatitlan";
    });

    //Edit Puebla
    $("#editUserPuebla").click(function () {
        editRegion = "puebla";
    });

    //Edit Poza Rica
    $("#editUserPozaRica").click(function () {
        editRegion = "poza_rica";
    });

    //Edit Veracruz
    $("#editUserVeracruz").click(function () {
        editRegion = "veracruz";
    });

    //Edit Xalapa
    $("#editUserXalapa").click(function () {
        editRegion = "xalapa";
    });

    //
    $("#btnReportes").click(function () {
        $("#contenedor_usuarios").hide("slow", function () {
            $("#contenedor_reportes").show("slow");
        });
    });

    $("#btnUsuarios").click(function () {
        $("#contenedor_reportes").hide("slow", function () {
            $("#contenedor_usuarios").show("slow");
        });
    });

    //Limpiamos el formulario
    userFormClean();
});

function fillCard(indice) {
    let fechaArrastre;
    let fechaLiberacion;

    fechaArrastre = formatFecha(data[indice]["Fecha"]);

    //* Informacion del ticket
    //* Checamos si hay informacion del ticket
    if (data[indice].Ticket[0].Estado == true) {
        //console.log("Hay informacion del ticket");
        $("#ticketEstado").html('<div class="alert alert-danger" role="alert">Ticket Cerrado</div>');
        //Formateamos la fecha del ticket
        fechaLiberacion = formatFecha(data[indice].Ticket[0].FechaTicket);

        //Llenamos los datos del ticket
        $("#ticketFecha").html(
            "Fecha De Liberacion: <br>" +
                fechaLiberacion +
                "<br>Fecha De Arrastre: <br>" +
                fechaArrastre +
                "<br>REF: " +
                data[indice]["Folio"] +
                "<br>FOLIO: " +
                data[indice].Ticket[0].PrefijoConsecutivo +
                data[indice].Ticket[0].Consecutivo +
                "<br>PLACAS: " +
                data[indice]["Placas"] +
                "<br>MARCA: " +
                data[indice]["VahiculoMarca"] +
                "<br>TIPO: " +
                data[indice]["Tipo"] +
                "<br>COLOR: " +
                data[indice]["Color"]
        );
        $("#ticketIFE").val(data[indice].Ticket[0].IFE);
        $("#ticketNombre").val(data[indice].Ticket[0].Nombre);
        $("#ticketImporte").val(data[indice].Ticket[0].Importe);
        $("#ticketImporteLetra").val(data[indice].Ticket[0].ImporteLetra);
        $("#ticketConcepto").val(data[indice].Ticket[0].Concepto);
    } else {
        //console.log("No hay informacion de ticket");
        $("#ticketEstado").html('<div class="alert alert-success" role="alert">Ticket Abierto</div>');
        //Limpiamos el contenido del ticket
        $("#ticketFecha").html("");
        $("#ticketIFE").val("");
        $("#ticketNombre").val("");
        $("#ticketImporte").val("");
        $("#ticketImporteLetra").val("");
        $("#ticketConcepto").val("");
    }

    //Llenando
    $("#cardTitle").html(
        '<div class="alert alert-success card-title" role="alert">Folio: ' + data[indice]["Folio"] + "</div>"
    );
    $("#listaResumen").html("");
    $("#listaResumen").append('<li class="list-group-item">Fecha de Arrastre: ' + fechaArrastre + " </li>");
    $("#listaResumen").append('<li class="list-group-item">Fecha de Liberacion: ' + fechaLiberacion + " </li>");
    calculoDiasEnCorralon(data[indice]["Fecha"]);
    $("#listaResumen").append('<li class="list-group-item">Placas: ' + data[indice]["Placas"] + " </li>");
    $("#listaResumen").append('<li class="list-group-item">Direccion: ' + data[indice]["Direccion"] + " </li>");
    $("#listaResumen").append('<li class="list-group-item">Grua: ' + data[indice]["Grua"] + " </li>");
    $("#listaResumen").append(
        '<li class="list-group-item">Importe Cobrado: $' + data[indice].Ticket[0].Importe + " </li>"
    );
    $("#listaResumen").append(
        '<li class="list-group-item">Importe Con Letra: ' + data[indice].Ticket[0].ImporteLetra + " </li>"
    );

    //Link a ver el resumen completo
    $("#listaResumen").append(
        '<button type="button" onClick="verReporte()" class="btn btn-link">Ver Reporte Completo</button>'
    );
    //Reporte fotografico
    $("#img1").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img1"] + '" alt = "lateral1" width = "100%">'
    );
    $("#img2").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img2"] + '" alt = "lateral2" width = "100%">'
    );
    $("#img3").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img3"] + '" alt = "lateral3" width = "100%">'
    );
    $("#img4").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img4"] + '" alt = "lateral4" width = "100%">'
    );
    //Escribimos la varuiable en el local storage
    localStorage.setItem("data", JSON.stringify(data[indice]));
}

function calculoDiasEnCorralon(fechaArrastre) {
    let fecha1 = moment(fechaArrastre);
    let fechaActual = moment().format("YYYY-MM-DD HH:mm:ss");
    let fecha2 = moment(fechaActual);
    let horas;
    let dias;
    //Diferencia de horas
    horas = fecha2.diff(fecha1, "hours");
    //Calculando los dias
    dias = horas / 24;
    //Obteniendo la fraccion de las horas
    let fraccionHoras = dias % 1;
    //Restando la fraccion de los dias
    dias = dias - fraccionHoras;
    //Pasando fraccion de dias a horas
    horas = fraccionHoras * 24;
    horas = horas.toFixed(0);

    //console.log("Fecha de arrastre: " + fechaArrastre + "  Fecha Actual: " + fechaActual);
    //console.log("Dias: " + dias + " ,Horas: " + horas + " ,FraccionHoras: " + fraccionHoras);

    //$('#diasCorralon').html('<h5>' + dias + ' Dias con ' + horas + ' horas </h5>');
    $("#listaResumen").append(
        '<li class="list-group-item">Dias en corralon: ' + dias + " Dias con " + horas + " horas</li>"
    );
}

function limpiarCard() {
    $("#listaResumen").html("");
}

function limpiarLista() {
    $("#listaReportes").html("");
    //Limpiar fotos
    $("#img1").html("");
    $("#img2").html("");
    $("#img3").html("");
    $("#img4").html("");
}

function setCardTitle(title) {
    $("#cardTitle").text(title);
}

function setListTitle(title) {
    let titleU = title.toUpperCase();
    $("#dropTitle").text(titleU);
}

function verReporte() {
    window.open("vistas/formulario.php");
}

function setTituloUsiario(title) {
    $("#tituloUsuarios").text(title);
}

function setUserListTitle(title) {
    _title = title.toUpperCase();
    $("#dropUserTitle").text(_title);
}

//Llena la lista de ususarios de la region seleccionada
function fillUsers(usuarioData) {
    //Escribiendo cabecera
    $("#listaUsuarios").html('<a href="#" class="list-group-item list-group-item-action active">Usuarios</a >');

    usuarioData.forEach(function (element, index) {
        $("#listaUsuarios").append(
            '<a href="#" class="list-group-item list-group-item-action" onClick="fillUsersDetail(' +
                index +
                ')">' +
                element["nombre"] +
                "</a>"
        );
    });

    fillUsersDetail(0);
}

function fillUsersDetail(index) {
    $("#userFullName").val(usuarioData[index]["nombre"]);
    $("#userName").val(usuarioData[index]["user"]);
    $("#userRegion").text(usuarioData[index]["region"].toUpperCase());
    editRegion = usuarioData[index]["region"];
    currentUserID = usuarioData[index]["id"];

    if (usuarioData[index]["region"] == "admin") {
        $("#radioAdmin").prop("checked", true);
    } else {
        $("#radioUser").prop("checked", true);
    }
}

//Cambia el estado del panel de alertas
function userAlert(estado, msg) {
    if (estado) {
        $("#userAlerts").html('<div class="alert alert-success" role="alert">' + msg + "</div >");
    } else {
        $("#userAlerts").html('<div class="alert alert-warning" role="alert">' + msg + "</div >");
    }
}

//habilita la edicion del formulario
function userEdit() {
    $("#userFullName").prop("disabled", false);
    $("#userName").prop("disabled", false);
    $("#userRegion").prop("disabled", false);
    $("#btnEditUser").html(
        '<button id="btnEditUser" type="button" onClick="userSave()"class= "btn btn-primary" >Guardar Cambios</button >'
    );
    $("#radioUser").prop("disabled", false);
    $("#radioAdmin").prop("disabled", false);
}

function formReset() {
    $("#userFullName").prop("disabled", true);
    $("#userName").prop("disabled", true);
    $("#userRegion").prop("disabled", true);
    $("#btnEditUser").html(
        '<button id="btnEditUser" type="button" onClick="userEdit()"class= "btn btn-primary" >Edit</button >'
    );

    $("#radioUser").prop("disabled", true);
    $("#radioAdmin").prop("disabled", true);
}

function userFormClean() {
    $("#userFullName").prop("disabled", true);
    $("#userFullName").val("");
    $("#userName").prop("disabled", true);
    $("#userName").val("");
    $("#userRegion").prop("disabled", true);
    $("#radioUser").prop("disabled", true);
    $("#radioAdmin").prop("disabled", true);
    $("#btnEditUser").html(
        '<button id="btnEditUser" type="button" onClick="userEdit()"class= "btn btn-primary" >Edit</button >'
    );
    $("#listaUsuarios").html('<a href="#" class="list-group-item list-group-item-action active">Usuarios</a >');
}

function userSave() {
    let newUserName = $("#userName").val();
    let newFullUserName = $("#userFullName").val();
    let newUserRegion = editRegion;
    let rol;

    if ($("#radioUser").is(":checked")) {
        rol = "user";
    }

    if ($("#radioAdmin").is(":checked")) {
        rol = "admin";
    }

    let updateUser = {
        id: currentUserID,
        nombre: newFullUserName,
        region: newUserRegion,
        user: newUserName,
        rol: rol,
    };

    console.log(updateUser);
    updateUserPost(updateUser);
}

$(".lista-item").click(function () {
    let _title = $(this).text();
    $("#nuevoUsuario-drop").text(_title);
});

function cerrarSesion() {
    location.href = "include/logout.php";
}

$("#chboxHabilitarFechaFinal").click(function () {
    let cbox = $("#chboxHabilitarFechaFinal").prop("checked");
    if (cbox) {
        $("#fechaFinal").prop("disabled", false);
    } else {
        $("#fechaFinal").prop("disabled", true);
    }
});

//Pasar de fecha en formato en a es
function formatFecha(fecha) {
    moment.locale("es");
    moment().format("LTS");
    let _ff = moment(fecha);
    //console.log("Fecha formateada: " + day);
    //console.log("Fecha formateada: " + moment(day).format("DD-MM-YYYY HH:mm LL"));
    _ff = moment(_ff).format("DD-MM-YYYY HH:mm");
    console.log("Fecha de arrastre: " + _ff);
    return _ff;
}

function generarReporte() {
    let reporteJSON = new Object();

    reporteJSON.Reportes = [];
    reporteJSON.Reportes[0] = { Folio: "XAL01" };
    reporteJSON.Reportes[1] = { Folio: "XAL02" };
    reporteJSON.Reportes[2] = { Folio: "XAL09" };
    reporteJSON.Region = "xalapa";

    /*
    reporteJSON.Reporte1 = "XAL01";
    reporteJSON.Reporte2 = "XAL02";
    reporteJSON.Reporte3 = "XAL03";
    console.log(reporteJSON);
*/

    //generarReportePost(reporteJSON);

    $.ajax({
        type: "POST",
        url: "http://localhost/mrd/web/reportes.php",
        dataType: "json",
        data: reporteJSON,
        success: function (response) {
            console.log("Respuesta del servidor POST: ");
            console.log(response);
        },
    });
}

//? Objeto Folios seleccionados
//var foliosSeleccionados = { folios: {} };
let reporteJSON = new Object();
reporteJSON.Folios = [];

//* Selector de reportes
function seleccionarReporte(folio) {
    let _id = "#" + folio.id;

    if ($(_id).prop("checked")) {
        //console.log(_id + " Checked");
        reporteJSON.Folios[_id] = folio.id;
    } else {
        //* Eliminamos el elemento de la lista
        //console.log(_id + " Unchecked");
        delete reporteJSON.Folios[_id];
    }

    //! Asignar la region
    reporteJSON.Region = "xalapa";

    let i = 0;
    let plantilla = "";

    for (x in reporteJSON.Folios) {
        //console.log(reporteJSON.Folios[x]);
        plantilla += "Reportes[" + i + "][Folio]=" + reporteJSON.Folios[x] + "&";
        i++;
    }

    plantilla += "Region=" + reporteJSON.Region;
    console.log(plantilla);

    //*Generacion del enlace para el botono generar reporte
    let boton = $("#divReporte");
    //*Si no hay reportes seleccionados borramos el boton
    if (!i) {
        boton.html("");
    } else {
        boton.html(
            '<label for="btnGenerarReporte">Generar Reporte</label><a id="btnGenerarReporte" target="_blank" class="form-control btn btn-success" href="' +
                urlBase +
                "/mrd/web/reportes.php?" +
                plantilla +
                '" role="button">Reporte</a>'
        );
    }
}
