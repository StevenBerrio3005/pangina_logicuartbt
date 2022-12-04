<?php
if(isset($_POST['consulta'])){
    $numeroGuia = trim($_POST['NumeroGuia']);
    if($numeroGuia==''){
        header('Location: ../index.html');
        //echo "<script>alert('Llena el campo de guia')</script>";
    }else{
        require('generarPDF.php');
    }
}
elseif(isset($_POST['descarga'])){
    $numeroGuia = trim($_POST['NumeroGuia']);
    if($numeroGuia==''){
        header('Location: ../index.html');
        //echo "<script>alert('Llena el campo de guia')</script>";
    }else{
        require('descargar_pdf_imagen.php');
    }
}