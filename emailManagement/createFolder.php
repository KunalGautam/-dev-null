<?php
function createFolder($path){
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    } else {
    // What to do if folder exists?
    }
}
