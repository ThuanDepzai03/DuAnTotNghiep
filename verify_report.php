<?php
$path = __DIR__ . '/report-input.docx';
$zip = new ZipArchive();
if ($zip->open($path) !== true) { throw new RuntimeException('Cannot open report'); }
$dom = new DOMDocument();
$dom->loadXML($zip->getFromName('word/document.xml'));
$zip->close();
$xpath = new DOMXPath($dom);
$xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
$text = implode(' ', array_map(static fn (DOMNode $node): string => $node->nodeValue, iterator_to_array($xpath->query('//w:t'))));
foreach (['nguoidung','posts_','hoadon_','imeis_','Bảng 3.26: Đặc tả bảng roles','Bảng 3.27: Đặc tả bảng statuses','users','product_imeis','warranty_claims','return_requests'] as $needle) {
    echo $needle . '=' . (str_contains($text, $needle) ? 'FOUND' : 'ABSENT') . PHP_EOL;
}
