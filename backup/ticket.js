$(document).ready(function() {


    data = localStorage.getItem('ticketData');
    ticketData = JSON.parse(data);

    let ticketFecha = moment().format("DD-MM-YYYY , hh:mm a");
    $("#ticketFecha").html('Fecha: ' + ticketFecha + '<br>Folio: ' + ticketData['Folio'] + '<br>Placas: ' + ticketData['Placas']);

});




function imprimir() {
    window.print();
}