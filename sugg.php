<?php
/**
 * Created by IntelliJ IDEA.
 * User: Scuola
 * Date: 28/05/2015
 * Time: 04:53
 */
include_once "sqlkit.php";

if (!isset($_GET['q']))
    $gg = "zan";
else
    $gg = $_GET['q'];

$dr = query("SELECT * FROM cliente WHERE nome LIKE '%$gg%' order by nome desc", $conn);

while (($h = mysqli_fetch_assoc($dr))) {
    $o = new stdClass();
    $o->nome=$h['nome'];
    $o->id=$h['id'];
    $out[]=$o->nome.','.$o->id;

}
echo json_encode($out);