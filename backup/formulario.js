var data;
//Document on ready
$(document).ready(function() {
    console.log("Form OK \n");

    data = localStorage.getItem('data');
    //localStorage.removeItem('data');

    dataJson = JSON.parse(data);

    console.log(dataJson);
    console.log(dataJson['Folio']);

    $("#Folio").val(dataJson['Folio']);
    $("#Fecha").val(dataJson['Fecha']);
    $("#Direccion").val(dataJson['Direccion']);


    //Motivo de inventario
    inventario();

    //Motivo de inventario
    $("#staticVehiculo").val(dataJson['VahiculoMarca']);

    $("#staticTipo").val(dataJson['Tipo']);

    $("#staticModelo").val(dataJson['Modelo']);

    $("#staticColor").val(dataJson['Color']);

    $("#staticPlacas").val(dataJson['Placas']);

    $("#staticSerie").val(dataJson['NoSerie']);

    $("#staticPropietario").val(dataJson['NombreConductor']);

    llaves();

    $("#staticTel").val(dataJson['Telefono']);

    $("#staticGrua").val(dataJson['Grua']);

    $("#staticClave").val(dataJson['ClaveOperador']);

    $("#staticSolicitante").val(dataJson['Solicitante']);

    //Defensa
    $("#staticSolicitante").val(dataJson['Solicitante']);

    estadoRecepcion(dataJson['DefensaDelantera'], "defensaDelantera");

    estadoRecepcion(dataJson['CarroceriaSinGolpes'], "carroceriaSinGolpes");

    estadoRecepcion(dataJson['Parrilla'], "parrilla");

    estadoRecepcion(dataJson['Faros'], "faros");

    estadoRecepcion(dataJson['Cofre'], "cofre");

    estadoRecepcion(dataJson['Parabrisas'], "parabrisas");

    estadoRecepcion(dataJson['Limpiadores'], "limpiadores");

    estadoRecepcion(dataJson['Emblemas'], "emblemas");

    estadoRecepcion(dataJson['PortezuelaIzq'], "portezuelaIzq");

    estadoRecepcion(dataJson['CristalLatIzq'], "cristalLatIzq");

    estadoRecepcion(dataJson['Medallon'], "medallon");

    estadoRecepcion(dataJson['Cajuela'], "cajuela");

    estadoRecepcion(dataJson['DefensaTrasera'], "defensaTras");

    estadoRecepcion(dataJson['PortezuelaDer'], "portezuelaDer");

    estadoRecepcion(dataJson['CristalLatDer'], "cristalLatDer");

    estadoRecepcion(dataJson['Antenas'], "antenas");

    estadoRecepcion(dataJson['Espejos'], "espejos");

    estadoRecepcion(dataJson['TaponesRuedas'], "taponesRuedas");

    estadoRecepcion(dataJson['TaponGasolina'], "taponGas");

    estadoRecepcion(dataJson['SalpicaderaDer'], "salpicaderaDer");

    estadoRecepcion(dataJson['SalpicaderaIzq'], "salpicaderaIzq");

    //Interior
    estadoRecepcion(dataJson['Tablero'], "tablero");

    estadoRecepcion(dataJson['Volante'], "volante");

    estadoRecepcion(dataJson['Radio'], "radio");

    estadoRecepcion(dataJson['EquipoSonido'], "eqpSonido");

    estadoRecepcion(dataJson['Encendedor'], "encendedor");

    estadoRecepcion(dataJson['Espejo'], "espejo");

    estadoRecepcion(dataJson['Asientos'], "asientos");

    estadoRecepcion(dataJson['TapetesAlfombra'], "tptAlfombra");

    estadoRecepcion(dataJson['TapetesHule'], "tptHule");

    estadoRecepcion(dataJson['Extintor'], "extintor");

    estadoRecepcion(dataJson['GatoYManeral'], "gato");

    estadoRecepcion(dataJson['TrianguloDeSeguridad'], "triangulo");

    estadoRecepcion(dataJson['Bocinas'], "bocinas");

    estadoRecepcion(dataJson['Luces'], "luces");

    estadoRecepcion(dataJson['Tag'], "tag");

    estadoRecepcion(dataJson['VialPass'], "vial");

    estadoRecepcion(dataJson['SimCard'], "simcard");

    //Motor
    estadoRecepcion(dataJson['Radiador'], "radiador");

    estadoRecepcion(dataJson['Motoventilador'], "motoventilador");

    estadoRecepcion(dataJson['Alternador'], "alternador");

    estadoRecepcion(dataJson['CableDeBujias'], "cableBujias");

    estadoRecepcion(dataJson['Depurador'], "depurador");

    estadoRecepcion(dataJson['Carburador'], "carburador");

    estadoRecepcion(dataJson['FiltroAire'], "filtroAceite");

    estadoRecepcion(dataJson['Inyectores'], "inyectores");

    estadoRecepcion(dataJson['Compresor'], "compresor");

    estadoRecepcion(dataJson['Computadora'], "computadora");

    estadoRecepcion(dataJson['Bateria'], "bateria");

    $("#bateriaMarca").val(dataJson['MarcaMotor']);

    //LLantas

    $("#llantasMarca").val(dataJson['MarcaLlantas']);

    $("#llantasMedida").val(dataJson['MedidaLlantas']);

    $("#llantasCantidad").val(dataJson['CantidadLlantas']);

    //Tanque de gasolina
    let porcentage = calculoPorcentageGasolina(dataJson['CantidadLlantas']);

    $("#barraGas").html('<div class="progress-bar" role="progressbar" style="width: ' + porcentage + '%;" aria-valuenow="50"' +
        'aria - valuemin="0" aria - valuemax="100" > </div >');

    //Footer

    $("#staticCarga").val(dataJson['CargaConsistente']);

    $("#staticObservaciones").val(dataJson['Observaciones']);


});


function calculoPorcentageGasolina(gas) {
    let porcentage = ((gas * 10) / 120) * 100;
    return porcentage;
}

function estadoRecepcion(key, base) {

    if (key == "Bien") {
        document.getElementById(base + "1").checked = true;

    } else if (key == "Mal") {
        document.getElementById(base + "2").checked = true;

    } else if (key == "No Trae") {
        document.getElementById(base + "3").checked = true;
    }
}


function llaves() {
    if (dataJson['Llaves'] == "Si") {
        document.getElementById('llavesSi').checked = true;
    } else if (dataJson['Llaves'] == "No") {
        document.getElementById('llavesNo').checked = true;
    }
}



function inventario() {

    if (dataJson['MotivoInventario'] == "Asistencia") {
        document.getElementById('inlineRadioAsistencia').checked = true;

    } else if (dataJson['MotivoInventario'] == "Siniestro") {
        document.getElementById('inlineRadioSiniestro').checked = true;

    } else if (dataJson['MotivoInventario'] == "Alcoholimetro") {
        document.getElementById('inlineRadioAlcoholimetro').checked = true;

    } else if (dataJson['MotivoInventario'] == "Mal Estacionado") {
        document.getElementById('inlineRadioEstacionado').checked = true;

    } else if (dataJson['MotivoInventario'] == "Detencion") {
        document.getElementById('inlineRadioDetencion').checked = true;

    } else if (dataJson['MotivoInventario'] == "Solo inventario") {
        document.getElementById('inlineRadioInventario').checked = true;

    } else if (dataJson['MotivoInventario'] == "Operativo especial") {
        document.getElementById('inlineRadioEspecial').checked = true;

    }


}