<?php
require('get_data.php');
require('PDF/fpdf.php');

//obtener el numero del formulario
//$numeroGuia = $_POST['NumeroGuia'];
$datos = obtenerArrayDatos($numeroGuia);

if($datos['Error'] == true){
    $mensaje1 = 'No se encontraron Guias';
    $mensaje2 = 'Asegurate de escribir el número de guia corretamente';
    require 'modal.php';
}
else{

    //creando el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    foreach($datos as $key=>$value){
        if($value == 1)
        {$value = "SI";}
        
        else if($value == false)
        {$value = "NO";}
        
        else if($value == null)
        {$value = "---";}
        
        $texto = "$key : $value";
        $pdf->Cell(40,10, $texto);
        $pdf->Ln();
    }
    $pdf->Output();

}