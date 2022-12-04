<?php
    //obteniendo los datos de la api
function obtenerInfoGuia($numeroGuia){
    $url ="http://165.22.222.162/cesio/public/index.php/api/localizador/guia/estado/lc/$numeroGuia";
    $json = file_get_contents($url);
    $array = json_decode($json,true);
    return $array;
}

function obtenerArrayDatos($numeroGuia){
    $infEnvio = obtenerInfoGuia($numeroGuia);

    //serpando los datos ne variables y meterlas en un array
    $datos = array();
    $datos=[
        "Error"=> $infEnvio['error'],
        "Mensaje"=> $infEnvio['mensaje'],
        "Codigo de Guia" => $infEnvio['guias'][0]['codigoGuia'],
        "Documento del cliente" => $infEnvio['guias'][0]['documentoCliente'],
        "Feche de ingreso "=> $infEnvio['guias'][0]['fechaIngreso'],
        "Embarcado " => $infEnvio['guias'][0]['embarcado'],
        "Despachado" => $infEnvio['guias'][0]['despachado'],
        "Fecha Despachado" => $infEnvio['guias'][0]['fechaDespachado'],
        "Entregado" => $infEnvio['guias'][0]['entregado'],
        "Fecha de entregado" => $infEnvio['guias'][0]['fechaEntregado'],
        "Fecha de embarco" => $infEnvio['guias'][0]['fechaDesembarco'],
        "Soporte" => $infEnvio['guias'][0]['soporte'],
        "Fecha Soporte" => $infEnvio['guias'][0]['fechaSoporte'],
        "Cumplido" => $infEnvio['guias'][0]['cumplido'],
        "Fecha cumplido" => $infEnvio['guias'][0]['fechaCumplido'],
        "Novedad" => $infEnvio['guias'][0]['novedad'],
        "Estado de novedad solucion" => $infEnvio['guias'][0]['estadoNovedadSolucion'],
        "Unidades" => $infEnvio['guias'][0]['unidades'],
        "Remitente" => $infEnvio['guias'][0]['remitente'],
        "Nombre de destinatario" => $infEnvio['guias'][0]['nombreDestinatario'],
        "Telefono de destinatario" => $infEnvio['guias'][0]['telefonoDestinatario'],
        "Dirrección de destinatario" => $infEnvio['guias'][0]['direccionDestinatario'],
        "Tipo de guia" => $infEnvio['guias'][0]['tipoGuia']
    ];
    return $datos;
}