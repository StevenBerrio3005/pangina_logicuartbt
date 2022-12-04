<?php
//numero de guia del formulario
//$numeroGuia = $_POST['NumeroGuia'];

//descargarPDF($numeroGuia);
CURL($numeroGuia);
///FUNCIONES

function CURL($numeroGuia){ //decodifaca la url para obtener los datos de respuesta
  //url del servidor
  $url ="http://165.22.222.162/cesio/public/index.php/api/localizador/guia/cumplido/lc/$numeroGuia";
  
  //envia algunos datos POST
  $post = [
    'username' => 'user',
    'password' => '123456'
  ];

  $curlConexion = curl_init($url); //inicia conexion CURL

  //AUN NO SÉ PARA QUÉ ES ESTO, PERO FUNCIONA XD
  curl_setopt($curlConexion, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curlConexion, CURLOPT_POSTFIELDS, $post);

  $response = curl_exec($curlConexion);// executa y obtiene los datos

  curl_close($curlConexion); //cierra la conexion CURL
  
  $responseJSON = json_decode($response); //convertir la respuesta a Json
  if($responseJSON->status == false){
    $mensaje1 = "No se encontró el soporte";
    $mensaje2 = "Tu guia aún no tiene soporte. Vuelve a consultar más tarde";
    include 'modal.php';
  }
  else{ 
    $binaryData = $responseJSON->binary; //obtiene el valor de "binary en el json"
    $binaryArray = explode(",",$binaryData); //separa el texto
    $final_PDF_code = $binaryArray[1]; //obtiene el codigo Final del PDF
  
    descargarPDF($final_PDF_code,$numeroGuia); //retorna el codigo del PDF
  }
}


function descargarPDF($PDF_code,$numeroGuia){

  //Procedimientos para descargar el PDF...
  $decoded = base64_decode($PDF_code); //decodifica el codigo del PDF
  
  $file = "$numeroGuia.pdf";//establece el nombre del archivo

  file_put_contents($file, $decoded); //pone el contenido en el archivo temporal
  
  if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink("$numeroGuia.pdf"); // eliminar el pdf temporal
    exit;
  }
  
}
