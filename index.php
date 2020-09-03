<?php
session_start(); 

// require the model for database and function 
require ("model/db.php");
require ("model/functions.php");

// get the required action
$action = filter_input(INPUT_POST, "action");
if ($action == null) {
    $action = filter_input(INPUT_GET, "action");
    if ($action == null) {
        $action = "index";
    }
}

switch ($action){
    case "index":
        include("view/index.php");
        break;
    case "product":
        include("view/products.php");
        break;
    default :
        include("view/index.php");
        break;
}

?>