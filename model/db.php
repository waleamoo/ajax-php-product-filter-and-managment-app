<?php 
$dataSourceNetwork = "mysql:host=localhost;dbname=product_filter";
$username = "root";
$password = "";

try {
    $connect = new PDO($dataSourceNetwork, $username, $password);
} catch (PDOException $ex) {
    $msg = $ex->getMessage();
    echo $msg;
    exit();
}

?>