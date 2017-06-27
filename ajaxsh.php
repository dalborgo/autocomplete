<?php
include_once "sqlkit.php";
header('Content-Type: application/json');
if (!isset($_GET['id']))
    $gg = "10";
else
    $gg = $_GET['id'];
$dr = query("SELECT
fotocop.id as fotocop_id,
fotocop.nome AS foto_nome,
fotocop.tipo,
fotocop.costo_copia,
copia.anno,
copia.mese,
copia.numero
FROM
cliente
INNER JOIN fotocop ON cliente.id = fotocop.cliente_id
LEFT JOIN copia ON fotocop.id = copia.fotocop_id
WHERE
cliente.id = '$gg'
ORDER BY fotocop_id, anno desc, mese desc
", $conn);
$out = array();
$i = 0;
while (($h = mysqli_fetch_assoc($dr))) {
    $h['diff'] = '';
    $res="<span><span class='stroke'>Bianco</span> & Nero</strong>";
    if ($h["tipo"] == 'COLORI'){
        $res="<span class='rainbow'><strong>COLORI</strong></span>";
    }
    $h['nome_lun'] = $h['foto_nome'].' '.$res.' id: '.$h['fotocop_id'];
    if (isset($out[$i - 1]['numero']) && isset($h['numero']) && $out[$i - 1]['fotocop_id'] == $h['fotocop_id']) {
        $tot = $out[$i - 1]['numero'] - $h['numero'];
        $out[$i - 1]['diff'] = $tot;

    }
    $out[] = $h;
    $i++;
}
echo json_encode($out);

