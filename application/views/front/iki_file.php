<?php
$out = $_GET['text'];
header("Content-Type: plain/text");
header("Content-Disposition: Attachment; filename=" . $out);
header("Pragma: no-cache");
echo "$out";
