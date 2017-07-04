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

$dr = query("SELECT * FROM cliente WHERE nome LIKE '%$gg%' order by nome", $conn);

while (($h = mysqli_fetch_assoc($dr))) {
    $o = new stdClass();
    $o->nome=$h['nome'];
    $o->id=$h['id'];
	$o->copie_mensili=$h['copie_mensili'];
    $out[]=$o->nome.','.$o->id.','.$o->copie_mensili;

}
echo json_encode($out);