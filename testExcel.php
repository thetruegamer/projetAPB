<?php
include 'PHPExcel.php';
include 'PHPExcel/Writer/Excel2007.php';

$workbook = new PHPExcel;

$sheet = $workbook->getActiveSheet();
$sheet->setCellValue('A1','MaitrePylos');

$writer = new PHPExcel_Writer_Excel2007($workbook);

$records = './fichier.xlsx';

$writer->save($records);
?>