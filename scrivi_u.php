<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['nome_u']))
    $nome = "VUOTO";
else
    $nome = $_GET['nome_u'];
$out['nome']=$nome;
repTV('cliente',$out,$conn);

