<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id']))
    $id = "1";
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
if (!isset($_GET['fotocopie']))
    $foto = "2000";
else
    $foto = $_GET['fotocopie'];

$out['mese']=$mese;
$out['anno']=$anno;
$out['numero']=$foto;
$out['fotocop_id']=$id;

repTV('copia',$out,$conn);

