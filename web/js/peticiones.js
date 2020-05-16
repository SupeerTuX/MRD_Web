var data;
var indice;
var fechaActual;
var region;
var fechaFormat;
var ticketData = new Object();
var reporteActual;

//var urlBase = "http://consulta.ustgm.net";
var urlBase = "http://localhost";

$(document).ready(function () {
    _region = localStorage.getItem("MRDKey");
    region = _region.toLowerCase();
    fechaActual = new Date();

    fechaFormat = formatDate(fechaActual);
    getReportByDate(fechaFormat, "", region);

    //Buscar folio
    $("#btnFolio").click(function () {
        _folio = $("#folio").val();
        if (_folio) {
            getReportByFolio(_folio, region);
        } else {
            alert("Debe ingresar un folio para buscar");
        }
    });

    //Buscar por fecha
    $("#btnFecha").click(function () {
        //* Fecha inicial
        fechaInicial = $("#fechaInicial").val();
        if (!fechaInicial) {
            alert("Debe seleccionar una Fecha de inicio");
            return;
        }
        //* Final
        let fechaFinal = $("#fechaFinal").val();

        if (fechaFinal && $("#chboxHabilitarFechaFinal").prop("checked")) {
            getReportByDate(fechaInicial, fechaFinal, region);
        } else {
            if (fechaInicial) {
                fechaFinal = "";
                getReportByDate(fechaInicial, fechaFinal, region);
            } else {
                alert("Debe seleccionar una fecha para busqueda");
            }
        }
    });

    $("#verMas").click(function () {
        //Guardamos los datos en local storage
        //Abrimos la ventana del formulario
        window.open("vistas/formulario.php");
    });

    /*
    setInterval(function () {
        _fecha = moment().format("YYYY-MM-DD");
        getReportByDate(_fecha, region);
    }, 300000);
    */

    $("#chboxHabilitarFechaFinal").click(function () {
        let cbox = $("#chboxHabilitarFechaFinal").prop("checked");
        if (cbox) {
            $("#fechaFinal").prop("disabled", false);
        } else {
            $("#fechaFinal").prop("disabled", true);
        }
    });
});

function getReportByDate(fechainicial, fechaFinal, region) {
    let url;
    //Si se paso el argumento lo agregamos a al url
    if (fechaFinal != "") {
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
            $("#reportes").html("<h3>Reportes encontrados</h3><br>");
            response.forEach((element, index) => {
                $("#reportes").append(
                    '<button type="button" class="btn btn - link" onClick="fillResumen(' +
                        index +
                        ')">' +
                        element["Folio"] +
                        "</button>"
                );
            });
            indice = 0;
            fillResumen(indice);
        } else {
            if (!fechaFinal) {
                $("#reportes").html(response["msg"] + "<br>" + fechainicial);
                limpiarResumen();
            } else {
                $("#reportes").html("No hay reportes entre" + "<br>" + fechainicial + " y " + fechaFinal);
                limpiarResumen();
            }
        }
    });
}

function getReportByFolio(folio, region) {
    $.get(urlBase + "/mrd/public/api/buscar/" + folio + "/" + region, function (response) {
        //console.log(response['error']);
        //console.log(response['msg']);
        data = response;
        console.log(response);

        if (!response["error"]) {
            $("#reportes").html("<h3>Reportes encontrados</h3><br>");
            response.forEach((element, index) => {
                $("#reportes").append(
                    '<button type="button" class="btn btn - link" onClick="fillResumen(' +
                        index +
                        ')">' +
                        element["Folio"] +
                        "</button>"
                );
                console.log(element["Fecha"]);
            });
            indice = 0;
            fillResumen(indice);
        } else {
            $("#reportes").html(response["msg"]);
            limpiarResumen();
        }
    });
}

//? ############################################################
//? FUNCTION()  LLena el resumen del reporte y la previsualizacion
//? Del ticket
//? ############################################################
function fillResumen(indice) {
    //* Copiamos el objeto actual
    reporteActual = data[indice];

    moment.locale("es-us");
    //Seleccionamos los ids del resumen
    $("#modelo").html("<h4>" + data[indice]["Modelo"] + "</h4>");
    //Placas
    $("#placas").html("<h4>" + data[indice]["Placas"] + "</h4>");
    //Dias de arrastre
    let horas = calculoDiasEnCorralon(data[indice]["Fecha"]);

    //Fecha de arrastre
    $("#fechaArrastre").html("<h5>" + data[indice]["Fecha"] + "</h5>");
    //Direccion
    $("#direccion").html("<h5>" + data[indice]["Direccion"] + "</h5>");
    //Grua
    $("#grua").html("<h4>" + data[indice]["Grua"] + "</h4>");

    //Imagen1
    $("#img1").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img1"] + '" alt = "lateral1" width = "100%">'
    );

    $("#img2").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img2"] + '" alt = "lateral1" width = "100%">'
    );

    $("#img3").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img3"] + '" alt = "lateral1" width = "100%">'
    );

    $("#img4").html(
        '<img src="' + urlBase + "/mrd/src/rutas/uploads/" + data[indice]["img4"] + '" alt = "lateral1" width = "100%">'
    );

    //Generar link para el boton ver mas
    $("#verMas").html('<button type="button" class="btn btn-link">Pulse aqu&iacute;</button>');

    //Escribimos la varuiable en el local storage
    localStorage.setItem("data", JSON.stringify(data[indice]));

    //Fecha del ticket
    let ticketFecha = moment().format("DD-MM-YYYY, HH:mm");
    //Fecha del ticket formteada para la base de datos
    let ff = moment().format("YYYY-MM-DD HH:mm:ss");
    let fechaArrastreFornateada = formatFecha(data[indice]["Fecha"]);
    $("#ticketFecha").html(
        "Fecha De Liberacion: <br>" +
            ticketFecha +
            "<br>Fecha De Arrastre: <br>" +
            fechaArrastreFornateada +
            "<br>FOLIO: " +
            data[indice]["Folio"] +
            "<br>PLACAS: " +
            data[indice]["Placas"] +
            "<br>MARCA: " +
            data[indice]["VahiculoMarca"] +
            "<br>TIPO: " +
            data[indice]["Tipo"] +
            "<br>COLOR: " +
            data[indice]["Color"]
    );

    //Guardar info para generar el ticket en una ventana nueva
    ticketData.FechaTicket = ff;
    ticketData.FechaArrastre = data[indice]["Fecha"];
    ticketData.Folio = data[indice]["Folio"];
    ticketData.Placas = data[indice]["Placas"];
    ticketData.Marca = data[indice]["VahiculoMarca"];
    ticketData.Tipo = data[indice]["Tipo"];
    ticketData.Color = data[indice]["Color"];

    //*Verificamos si el reporte ha sido cerrado
    if (reporteActual.Ticket[0].Estado == true) {
        //Reporte cerrado, deshabilitamos la edicion del ticket
        disableTicket();
        //console.log(reporteActual);
        //Llena la informacion del ticket
        $("#ticketIFE").val(reporteActual.Ticket[0].IFE);
        $("#ticketNombre").val(reporteActual.Ticket[0].Nombre);
        $("#ticketImporte").val(reporteActual.Ticket[0].Importe);
        $("#ticketImporteLetra").val(reporteActual.Ticket[0].ImporteLetra);
        $("#ticketConcepto").val(reporteActual.Ticket[0].Concepto);
        //Generamos el boton generar ticket
        $("#generarTicket").html('<div class="alert alert-danger" role="alert">Ticket Cerrado!</div>');
    } else {
        //Generamos el boton generar ticket
        $("#generarTicket").html(
            '<button onClick="ventanaTicket()" type="button" class="btn btn-outline-success">Generar Ticket</button>'
        );
        limpiarTicket();
        enableTicket();
    }
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

    $("#diasCorralon").html("<h5>" + dias + " Dias con " + horas + " horas </h5>");
}

function limpiarResumen() {
    //Seleccionamos los ids del resumen
    $("#modelo").html("");
    //Placas
    $("#placas").html("");
    //Dias de arrastre
    $("#diasCorralon").html("");
    //Fecha de arrastre
    $("#fechaArrastre").html("");
    //Direccion
    $("#direccion").html("");
    //Grua
    $("#grua").html("");

    //Imagen1
    $("#img1").html("");

    $("#img2").html("");

    $("#img3").html("");

    $("#img4").html("");
}

//*Informacion del ticket
function ventanaTicket() {
    if (!validarTicket()) {
        return;
    }
    //*Mostrar Ventana modal de confirmacion
    confirmacionCierreTicket();
}

//? ############################################################
//? FUNCTION()  Muestra La ventana modal de confirmacion del ticket
//? ############################################################
function confirmacionCierreTicket() {
    $("#divModalConfirmacion").append("<p>Esta seguro de cerrar el ticket?</p>");
    $("#divModalConfirmacion").append("<p>Una vez cerrado, no se podra editar la informacion</p>");
    $("#modalConfirmacion").modal("toggle");
}

//? ############################################################
//? FUNCTION()  Muestra la ventana del ticket
//? ############################################################
function mostrarTicket() {
    window.open(
        "vistas/ticket.php",
        "Impresion de Ticket",
        "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=200,height=800,left = 390,top = 50"
    );
}

//? ############################################################
//? FUNCTION()  Valida que la info del ticket este lleno
//? ############################################################
function validarTicket() {
    let warning = false;
    ticketData.IFE = $("#ticketIFE").val();
    ticketData.Nombre = $("#ticketNombre").val();
    ticketData.Importe = $("#ticketImporte").val();
    ticketData.ImporteLetra = $("#ticketImporteLetra").val();
    ticketData.Concepto = $("#ticketConcepto").val();

    $.each(ticketData, function (index, value) {
        //evaluamos si has sido llenados todos los datos
        if (!value) {
            $("#divModalWarning").append("<p>Debe llenar el elemneto: " + index + "</p>");
            warning = true;
        }
    });

    if (warning) {
        $("#modalWarning").modal("toggle");
        return false;
    }
    localStorage.setItem("ticketData", JSON.stringify(ticketData));
    return true;
}

//? ############################################################
//? FUNCTION()  Limpia las alertas del modal warning
//? ############################################################
function clearModalWarning() {
    $("#divModalWarning").html("");
}

function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [year, month, day].join("-");
}

//? ############################################################
//? FUNCTION()
//? ############################################################
function generarTicket() {
    //Genetrar ticket
    $("#generarTicket").html(
        '<button onClick="ventanaTicket()" type="button" class="btn btn-outline-success">Generar Ticket</button>'
    );
}

//? ############################################################
//? POST  Cierra el ticket y mustra el resultado en la ventana modal
//? ############################################################
function cerrarTicket() {
    let confirmationBody = $("#divModalConfirmacion");
    confirmationBody.html("");
    confirmationBody.removeClass("alert-warning");
    confirmationBody.addClass("alert-primary");
    confirmationBody.html("<p>Cerrando ticket, espere...</p>");
    confirmationBody.append(
        '<div class="spinner-border text-primary" role="status"><span class= "sr-only">Loading...</span ></div>'
    );

    $("#okModalConfirmacion").prop("disabled", true);
    $("#cancelModalConfirmacion").prop("disabled", true);

    //Preparamos el json para ser enviado
    let post = new Object();
    post = ticketData;
    post.Estado = true;
    post.Region = region;
    console.log(post);

    $.ajax({
        type: "post",
        url: urlBase + "/mrd/public/api/ticket/close",
        data: JSON.stringify(post),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            //Reset Confirmacion modal
            resetConfirmacionModal();
            ticketData.Consecutivo = reporteActual.Ticket[0].PrefijoConsecutivo + response.msg;
            console.log(ticketData);
            localStorage.setItem("ticketData", JSON.stringify(ticketData));
            mostrarTicket();
        },
    });
}

function resetConfirmacionModal() {
    let confirmationBody = $("#divModalConfirmacion");

    confirmationBody.html("");
    confirmationBody.removeClass("alert-primary");
    confirmationBody.addClass("alert-warning");

    $("#okModalConfirmacion").prop("disabled", false);
    $("#cancelModalConfirmacion").prop("disabled", false);

    $("#modalConfirmacion").modal("toggle");
}

//TODO ajustar la DB para el cobro de tickets y cierre de tickets

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

//*Funcion para deshabilitar la edicion del tcket
function disableTicket() {
    $("#ticketIFE").prop("disabled", true);
    $("#ticketNombre").prop("disabled", true);
    $("#ticketImporte").prop("disabled", true);
    $("#ticketImporteLetra").prop("disabled", true);
    $("#ticketConcepto").prop("disabled", true);
}

//*Funcion para habilitar la edicion del tcket
function enableTicket() {
    $("#ticketIFE").prop("disabled", false);
    $("#ticketNombre").prop("disabled", false);
    $("#ticketImporte").prop("disabled", false);
    $("#ticketImporteLetra").prop("disabled", false);
    $("#ticketConcepto").prop("disabled", false);
}

//*Limpiar informacion del ticket
function limpiarTicket() {
    $("#ticketIFE").val("");
    $("#ticketNombre").val("");
    $("#ticketImporte").val("");
    $("#ticketImporteLetra").val("");
    $("#ticketConcepto").val("");
}
