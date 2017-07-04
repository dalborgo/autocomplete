<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id']))
    $id = "0";
else
    $id = $_GET['id'];
if (!isset($_GET['cliente_id']))
    $cliente_id = "0";
else
    $cliente_id = $_GET['cliente_id'];

if (!isset($_GET['nome']))
    $nome = "PROVA";
else
    $nome = $_GET['nome'];

if (!isset($_GET['tipo']))
    $tipo = "BN";
else
    $tipo = $_GET['tipo'];

if (!isset($_GET['costo_copia']))
    $costo_copia = "0.01";
else
    $costo_copia = $_GET['costo_copia'];

$costo_copia = str_replace(",", ".", $costo_copia);
$out['id']=$id;
$out['cliente_id']=$cliente_id;
$out['nome']=$nome;
$out['tipo']=$tipo;
$out['costo_copia']=$costo_copia;

repTV('fotocop',$out,$conn);

