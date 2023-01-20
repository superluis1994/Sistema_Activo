<?php
require __DIR__.'/vendor/autoload.php';

$url=$_GET['requireFeed'];
 //echo $obj->getData();
session_start();
 if(isset($_SESSION['url_pdf'])){
    $_SESSION['url_pdf']=$url;
 }
 

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
ob_start();
 include dirname(__FILE__).'\activos.php';
 $content = ob_get_clean();
 $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->writeHTML($content);
    $html2pdf->output('reporte.pdf');
} catch (Html2PdfException $e) {
	$html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

?>

