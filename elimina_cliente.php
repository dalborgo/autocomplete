<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id']))
    $id = "0";
else
    $id = $_GET['id'];


query("DELETE FROM cliente WHERE id = $id ",$conn);



