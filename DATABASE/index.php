<?php

if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1'){
    return true;
} else {
    die();
}


 ?>
