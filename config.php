<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ayub";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}

$siteKey = "6LechGwjAAAAAORoq8RUOfzGGTpk2jXQpIAEDo2P";
$secretKey = "6LechGwjAAAAAOTscDMUEMAghWFB14ydrm9i_yKv";