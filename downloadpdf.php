<?php
	$file = $_GET['file'];
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$file");
    $file = "pdfuploads/".$_GET['file'];
    readfile($file);
   ?>