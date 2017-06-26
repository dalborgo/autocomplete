<?php
/**
 * Created by IntelliJ IDEA.
 * User: Scuola
 * Date: 28/05/2015
 * Time: 04:25
 */
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id'])) {
    $gg = "1";
} else
    $gg = $_GET['id'];

$dr = query("SELECT
fotocop_id,
fotocop.nome AS foto_nome,
fotocop.tipo,
fotocop.costo_copia,
copia.anno,
copia.mese,
copia.numero
FROM
cliente
INNER JOIN fotocop ON cliente.id = fotocop.cliente_id
INNER JOIN copia ON fotocop.id = copia.fotocop_id
WHERE
cliente.id = '$gg'
ORDER BY fotocop_id, anno desc, mese desc
", $conn);
$mesi = array('','gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre');
$out = array();
while (($h = mysqli_fetch_assoc($dr))) {
    //$obj = new stdClass();
    $h['mese'] = $mesi[$h['mese']];
    $out[] = $h;
}
echo json_encode($out);

function conv($re)
{
    $datec = "";
    try {

        $datec = date('d/m/Y', $re);
    } catch (Exception $e) {

    }
    return $datec;
}