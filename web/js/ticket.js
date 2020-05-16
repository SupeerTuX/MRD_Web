$(document).ready(function () {
    data = localStorage.getItem("ticketData");
    ticketData = JSON.parse(data);

    //Formatear fecha
    let fechaArrastreFormat = formatFecha(ticketData.FechaArrastre);
    let fechaTicketFormat = formatFecha(ticketData.FechaTicket);

    $("#ticketFecha").html(
        "Fecha De Liberacion: <br>" +
            fechaTicketFormat +
            "<br>Fecha De Arrastre: <br>" +
            fechaArrastreFormat +
            "<br>REF: " +
            ticketData.Folio +
            "<br>FOLIO: " +
            ticketData.Consecutivo +
            "<br>PLACAS: " +
            ticketData.Placas +
            "<br>MARCA: " +
            ticketData.Marca +
            "<br>TIPO: " +
            ticketData.Tipo +
            "<br>COLOR: " +
            ticketData.Color
    );

    //Conceptos
    $("#ticketIFE").val(ticketData.IFE);
    $("#ticketNombre").val(ticketData.Nombre);
    $("#ticketImporte").val(ticketData.Importe);
    $("#ticketImporteLetra").val(ticketData.ImporteLetra);
    $("#ticketConcepto").val(ticketData.Concepto);
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

function imprimir() {
    window.print();
}
