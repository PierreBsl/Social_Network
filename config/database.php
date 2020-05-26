<?php

define('DB_HOST','localhost');
define('DB_NAME','site_web');
define('DB_USER','root');
define('DB_PASSWORD','');

try{
    $db = new PDO("mysql:host=".DB_HOST.";port=3308;dbname=".DB_NAME, DB_USER, DB_PASSWORD);

    $db->setATTRIBUTE(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die('Erreur: '.$e->getMessage());
}