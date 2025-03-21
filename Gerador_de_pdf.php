<?php // reference the Dompdf namespace
use Dompdf\Dompdf;
require "vendor\autoload.php";

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start();
require "conteudo-pdf.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>