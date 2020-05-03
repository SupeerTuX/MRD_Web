var data;
var indice;
var fechaActual;
var region;
var fechaFormat;
var urlBase = "http://consulta.talleresygruasmendez.com.mx";
//var urlBase = "http://localhost";

$(document).ready(function() {
    _region = localStorage.getItem("MRDKey");
    region = _region.toLowerCase();
    fechaActual = new Date();

    fechaFormat = formatDate(fechaActual);
    getReportByDate(fechaFormat, region);

    //Buscar folio
    $("#btnFolio").click(function() {
        _folio = $("#folio").val();
        if (_folio) {
            getReportByFolio(_folio, region);
        } else {
            alert("Debe ingresar un folio para buscar");
        }
    });

    //Buscar por fecha
    $("#btnFecha").click(function() {
        _fecha = $("#fecha").val();
        if (_fecha) {
            getReportByDate(_fecha, region);
            //console.log(_fecha);
        } else {
            alert("Debe seleccionar una fecha para busqueda");
        }
    });

    $("#verMas").click(function() {
        //Guardamos los datos en local storage
        //Abrimos la ventana del formulario
        window.open("vistas/formulario.php");
    });
});

function getReportByDate(fecha, region) {
    $.get(urlBase + "/mrd/public/api/reporte/" + fecha + "/" + region, function(
        response
    ) {
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
                console.log(element["Fecha"]);
            });
            indice = 0;
            fillResumen(indice);
        } else {
            fechaActual = moment(fecha);
            $("#reportes").html(response["msg"] + "<br>" + fechaActual._d);
            limpiarResumen();
        }
    });
}

function getReportByFolio(folio, region) {
    $.get(urlBase + "/mrd/public/api/buscar/" + folio + "/" + region, function(
        response
    ) {
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

function fillResumen(indice) {
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
        '" alt = "lateral1" width = "100%">'
    );

    $("#img3").html(
        '<img src="' +
        urlBase +
        "/mrd/src/rutas/uploads/" +
        data[indice]["img3"] +
        '" alt = "lateral1" width = "100%">'
    );

    $("#img4").html(
        '<img src="' +
        urlBase +
        "/mrd/src/rutas/uploads/" +
        data[indice]["img4"] +
        '" alt = "lateral1" width = "100%">'
    );

    //Generar link para el boton ver mas
    $("#verMas").html(
        '<button type="button" class="btn btn-link">Pulse aqu&iacute;</button>'
    );

    //Escribimos la varuiable en el local storage
    localStorage.setItem("data", JSON.stringify(data[indice]));

    //Habiltar el boton generar ticket

    //Fecha del ticket
    let ticketFecha = moment().format("DD-MM-YYYY , hh:mm a");
    $("#ticketFecha").html(
        "Fecha: " +
        ticketFecha +
        "<br>Folio: " +
        data[indice]["Folio"] +
        "<br>Placas: " +
        data[indice]["Placas"]
    );

    //Guardar info para generar el ticket en una ventana nueva
    let ticketData = new Object();
    ticketData.Folio = data[indice]["Folio"];
    ticketData.Fecha = data[indice]["Fecha"];
    ticketData.Placas = data[indice]["Placas"];

    localStorage.setItem("ticketData", JSON.stringify(ticketData));

    //Genetrar ticket
    $("#generarTicket").html(
        '<button onClick="ventanaTicket()" type="button" class="btn btn-outline-success">Generar Ticket</button>'
    );
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

    $("#diasCorralon").html(
        "<h5>" + dias + " Dias con " + horas + " horas </h5>"
    );
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

function ventanaTicket() {
    window.open(
        "vistas/ticket.php",
        "Impresion de Ticket",
        "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=250,height=500,left = 390,top = 50"
    );
}

function buscarFolio() {}

function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [year, month, day].join("-");
}