$(document).ready(function () {
    data = localStorage.getItem("data");
    ticketData = JSON.parse(data);
    console.log(ticketData);

    //Formatear fecha
    let fechaArrastreFormat = formatFecha(ticketData.Ticket[0].FechaArrastre);
    let fechaTicketFormat = formatFecha(ticketData.Ticket[0].FechaTicket);

    $("#ticketFecha").html(
        "Fecha De Liberacion: <br>" +
            fechaTicketFormat +
            "<br>Fecha De Arrastre: <br>" +
            fechaArrastreFormat +
            "<br>REPORTE: " +
            ticketData.Ticket[0].Folio +
            "<br>FOLIO: " +
            ticketData.Ticket[0].PrefijoConsecutivo +
            ticketData.Ticket[0].Consecutivo +
            "<br>PLACAS: " +
            ticketData.Ticket[0].Placas +
            "<br>MARCA: " +
            ticketData.Ticket[0].Marca +
            "<br>TIPO: " +
            ticketData.Ticket[0].Tipo +
            "<br>COLOR: " +
            ticketData.Ticket[0].Color
    );

    //Conceptos
    $("#ticketIFE").val(ticketData.Ticket[0].IFE);
    $("#ticketNombre").val(ticketData.Ticket[0].Nombre);
    $("#ticketImporte").val(ticketData.Ticket[0].Importe);
    $("#ticketImporteLetra").val(ticketData.Ticket[0].ImporteLetra);
    $("#ticketConcepto").val(ticketData.Ticket[0].Concepto);
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
