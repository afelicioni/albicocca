<?php
require __DIR__ . '/vendor/autoload.php';

use mikehaertl\pdftk\Pdf;

//use mikehaertl\shellcommand\Command;
//
//
//$command = new Command('/usr/bin/pdftk');
//if ($command->execute()) {
//	echo $command->getOutput();
//} else {
//	echo $command->getError();
//	$exitCode = $command->getExitCodes();
//}



$pdf = new Pdf(__DIR__ . '/input/pedaggio.pdf');
$pdf->burst(__DIR__ . '/output/page_%d.pdf');

echo 'finito';
