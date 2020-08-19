<?php
include "createFolder.php";

function writeData($folder, $file, $message){
    $filepath = $folder . '/' . $file;
    createFolder($folder);
    $fh = fopen($filepath, (file_exists($filepath)) ? 'a' : 'w');
    fwrite($fh, $message."\n");
    fclose($fh);
}

