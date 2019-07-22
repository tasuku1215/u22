<?php
    $imageData = $_POST['image'];
    $filename = 'example.png';
    $fp = fopen($filename, 'w');
    fwrite($fp,base64_decode($imageData));
    fclose($fp);