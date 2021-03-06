//Funcion de inicio
var data;
var region;

var usuarioData;
var usuarioRegion;

var editRegion;
var currentUserID;

$(document).ready(function() {
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
    $("#selectCoa").click(function() {
        $("#cabecera").text("Monstando reportes: Coatepec");
        //Peticion GET Reportes coatepec
        region = "coatepec";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Cordoba
    $("#selectCordoba").click(function() {
        $("#cabecera").text("Monstando reportes: Cordoba");
        //Peticion GET Reportes coatepec
        region = "cordoba";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Coatza
    $("#selectCoatza").click(function() {
        $("#cabecera").text("Monstando reportes: Coatzacoalcos");
        //Peticion GET Reportes coatepec
        region = "coatzacoalcos";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Mina
    $("#selectMina").click(function() {
        $("#cabecera").text("Monstando reportes: Minatitlan");
        //Peticion GET Reportes coatepec
        region = "minatitlan";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Puebla
    $("#selectPuebla").click(function() {
        $("#cabecera").text("Monstando reportes: Puebla");
        //Peticion GET Reportes coatepec
        region = "puebla";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr PozaRica
    $("#selectPozaRica").click(function() {
        $("#cabecera").text("Monstando reportes: Poza Rica");
        //Peticion GET Reportes coatepec
        region = "poza_rica";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Veracruz
    $("#selectVeracruz").click(function() {
        $("#cabecera").text("Monstando reportes: Veracruz");
        //Peticion GET Reportes coatepec
        region = "veracruz";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr Xalapa
    $("#selectXalapa").click(function() {
        $("#cabecera").text("Monstando reportes: Xalapa");
        //Peticion GET Reportes coatepec
        region = "xalapa";
        fecha = $("#datePicker").val();
        //Validar fecha
        if (fecha == undefined || fecha == "") {
            fecha = moment().format("YYYY-MM-DD");
        }
        setListTitle(region);
        getReportByDate(fecha, region);
        //console.log("Funcion: " + fecha + ", " + region);
    });

    //Selectpr All
    $("#selectAll").click(function() {
        $("#cabecera").text("Monstando reportes: Todas");
    });

    //Boton buscar por Fecha
    $("#btnFecha").click(function() {
        fecha = $("#datePicker").val();
        if (fecha) {
            getReportByDate(fecha, region);
        } else {
            alert("Debe seleccionar una fecha para busqueda");
        }
    });

    //Boton buscar por folio
    $("#btnFolio").click(function() {
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
    $("#selectUserCoa").click(function() {
        usuarioRegion = "coatepec";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Cordoba
    $("#selectUserCordoba").click(function() {
        usuarioRegion = "cordoba";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Coatza
    $("#selectUserCoatza").click(function() {
        usuarioRegion = "coatzacoalcos";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Minatitlan
    $("#selectUserMina").click(function() {
        usuarioRegion = "minatitlan";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Puebla
    $("#selectUserPuebla").click(function() {
        usuarioRegion = "puebla";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User poza Rica
    $("#selectUserPozaRica").click(function() {
        usuarioRegion = "poza_rica";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Vercaruz
    $("#selectUserVeracruz").click(function() {
        usuarioRegion = "veracruz";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User Xalapa
    $("#selectUserXalapa").click(function() {
        usuarioRegion = "xalapa";
        setTituloUsiario("Mostrando Usuarios De: Coatepec");
        setUserListTitle(usuarioRegion);
        getUser(usuarioRegion);
    });
    //User All
    $("#selectUserAll").click(function() {});

    //?Editor de region
    //Edit Coa
    $("#editUserCoa").click(function() {
        editRegion = "coatepec";
    });

    //Edit Cordoba
    $("#editUserCordoba").click(function() {
        editRegion = "cordoba";
    });

    //Edit Coatza
    $("#editUserCoatza").click(function() {
        editRegion = "coatzacoalcos";
    });

    //Edit Mina
    $("#editUserMina").click(function() {
        editRegion = "minatitlan";
    });

    //Edit Puebla
    $("#editUserPuebla").click(function() {
        editRegion = "puebla";
    });

    //Edit Poza Rica
    $("#editUserPozaRica").click(function() {
        editRegion = "poza_rica";
    });

    //Edit Veracruz
    $("#editUserVeracruz").click(function() {
        editRegion = "veracruz";
    });

    //Edit Xalapa
    $("#editUserXalapa").click(function() {
        editRegion = "xalapa";
    });

    //
    $("#btnReportes").click(function() {
        $("#contenedor_usuarios").hide("slow", function() {
            $("#contenedor_reportes").show("slow");
        });
    });

    $("#btnUsuarios").click(function() {
        $("#contenedor_reportes").hide("slow", function() {
            $("#contenedor_usuarios").show("slow");
        });
    });

    //Limpiamos el formulario
    userFormClean();
});

function fillCard(indice) {
    $("#cardTitle").html(
        '<div class="alert alert-success card-title" role="alert">Folio: ' +
        data[indice]["Folio"] +
        "</div>"
    );
    $("#listaResumen").html("");
    $("#listaResumen").append(
        '<li class="list-group-item">Fecha de Arrastre: ' +
        data[indice]["Fecha"] +
        " </li>"
    );
    calculoDiasEnCorralon(data[indice]["Fecha"]);
    $("#listaResumen").append(
        '<li class="list-group-item">Placas: ' + data[indice]["Placas"] + " </li>"
    );
    $("#listaResumen").append(
        '<li class="list-group-item">Direccion: ' +
        data[indice]["Direccion"] +
        " </li>"
    );
    $("#listaResumen").append(
        '<li class="list-group-item">Grua: ' + data[indice]["Grua"] + " </li>"
    );

    //Link a ver el resumen completo
    $("#listaResumen").append(
        '<button type="button" onClick="verReporte()" class="btn btn-link">Ver Reporte Completo</button>'
    );
    //Reporte fotografico
    $("#img1").html(
        '<img src="' +
        urlBase +
        "/mrd/src/rutas/uploads/" +
        data[indice]["img1"] +
        '" alt = "lateral1" width = "100%">'
    );
    $("#img2").html(
        '<img src="' +
        urlBase +
        "/mrd/src/rutas/uploads/" +
        data[indice]["img2"] +
        '" alt = "lateral2" width = "100%">'
    );
    $("#img3").html(
        '<img src="' +
        urlBase +
        "/mrd/src/rutas/uploads/" +
        data[indice]["img3"] +
        '" alt = "lateral3" width = "100%">'
    );
    $("#img4").html(
        '<img src="' +
        urlBase +
        "/mrd/src/rutas/uploads/" +
        data[indice]["img4"] +
        '" alt = "lateral4" width = "100%">'
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
        '<li class="list-group-item">Dias en corralon: ' +
        dias +
        " Dias con " +
        horas +
        " horas</li>"
    );
}

function limpiarCard() {
    $("#listaResumen").html("");
}

function limpiarLista() {
    $("#listaReportes").html("");
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
    $("#listaUsuarios").html(
        '<a href="#" class="list-group-item list-group-item-action active">Usuarios</a >'
    );

    usuarioData.forEach(function(element, index) {
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
        $("#userAlerts").html(
            '<div class="alert alert-success" role="alert">' + msg + "</div >"
        );
    } else {
        $("#userAlerts").html(
            '<div class="alert alert-warning" role="alert">' + msg + "</div >"
        );
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
    $("#listaUsuarios").html(
        '<a href="#" class="list-group-item list-group-item-action active">Usuarios</a >'
    );
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
        rol: rol
    };

    console.log(updateUser);
    updateUserPost(updateUser);
}

$(".lista-item").click(function() {
    let _title = $(this).text();
    $("#nuevoUsuario-drop").text(_title);
});

function cerrarSesion() {
    location.href = "include/logout.php";
}