<?php
$path = 'C:/Users/Wayne_Laptop/Desktop/DuAnTotNghiep/Bao-cao-tot-nghiep_AEPhoenic_da_sua_final-hoan-chinh.docx';
$zip = new ZipArchive();
if ($zip->open($path) !== true) { die("ERR\n"); }
$xml = $zip->getFromName('word/document.xml');
$zip->close();
$dom = new DOMDocument();
$dom->loadXML($xml);
$xpath = new DOMXPath($dom);
$xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
foreach ($xpath->query('//w:p') as $p) {
    $text = '';
    foreach ($xpath->query('.//w:t', $p) as $t) {
        $text .= $t->nodeValue;
    }
    $trim = trim($text);
    if ($trim !== '') {
        echo $trim . PHP_EOL;
    }
}
