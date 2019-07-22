<?php
	$imageData = $_POST['image'];
    $filename = 'test.png';
	$fp = fopen($filename, 'w');
	var_dump($fp);
    fwrite($fp,base64_decode($imageData));
    fclose($fp);