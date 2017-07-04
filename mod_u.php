<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id']))
    $id = 0;
else
    $id = $_GET['id'];
if (!isset($_GET['nome_u']))
    $nome = null;
else
    $nome = $_GET['nome_u'];
if (!isset($_GET['copie_mensili']))
    $copie = "";
else
    $copie = $_GET['copie_mensili'];
$out['nome']=$nome;
$out['id']=$id;
$out['copie_mensili']=$copie;
repTV('cliente',$out,$conn);

