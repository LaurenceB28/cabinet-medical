<?php
require_once __DIR__ .'/../config/config.php';

function connect()
{
    $db = new PDO(DSN,USER,PASSWORD);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $db;
}