<?php

/**
 * PHP version 7
 * 
 * @file
 * @category Database_Connector
 * @package  Project
 * @author   Panashe <30000916@tafe.wa.edu.au>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost/
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databasemembers";

    $conn = new mysqli($servername, $username, $password, $dbname);

try {
    $dsn = "mysql:host=".$servername.";dbname=".$dbname;
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected to server";
} catch (PDOException $e) {
    echo $e.getMessage();
}

    

?>
