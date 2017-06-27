<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id']))
    $id = "2";
else
    $id = $_GET['id'];
if (!isset($_GET['mese']))
    $mese = "4";
else
    $mese = $_GET['mese'];
if (!isset($_GET['anno']))
    $anno = "2017";
else
    $anno = $_GET['anno'];


query("DELETE FROM copia WHERE fotocop_id = $id AND mese = $mese AND anno = $anno ",$conn);



