<?php
require __DIR__ . '/vendor/autoload.php';
require_once(__DIR__ . '/vendor/tecnickcom/tcpdf/tcpdf.php');

use mikehaertl\pdftk\Pdf;

$sPercorsoPDFBase = __DIR__ . '/input/anagrafica.pdf';
$sPercorsoPDFDatiVariabili = __DIR__ . '/output/dativariabili.pdf';
$sPercorsoPDFFinale = __DIR__ . '/output/output.pdf';
$oCliente = json_decode(file_get_contents(__DIR__ . '/input/cliente.json'));

$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(0, 0, 0);
$pdf->AddPage();
foreach ($oCliente as $dato) {
	$pdf->SetXY($dato->posizione->x, $dato->posizione->y);
	$pdf->Write(1, $dato->valore);
}
$pdf->Output($sPercorsoPDFDatiVariabili, 'F');



$pdf = new Pdf($sPercorsoPDFBase);
$pdf->stamp($sPercorsoPDFDatiVariabili)
	->compress()
	->saveAs($sPercorsoPDFFinale);

unlink($sPercorsoPDFDatiVariabili);
echo 'finito';
