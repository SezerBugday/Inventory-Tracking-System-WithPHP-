<?php


require_once __DIR__ . '/vendor/autoload.php';





  $html = 'deneme';
     $mpdf = new mPDF();
     $mpdf->WriteHTML($html);
     $mpdf->Output("phpflow.pdf", 'F');

?>