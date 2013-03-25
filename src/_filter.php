<?php
/**
 * @author sofish
 * @site http://sofish.de
 */

require_once('bx.php');
$bx = new Bx();

$query = '{query}';
$json = $bx->json($query);
$i = 1;

foreach($json as $item) {
    $bx->result($i . time(), $item->label, $item->label, '在' . strtoupper($bx->city) . '搜索「'. $item->value .'」', 'icon.png');
    $i++;
}

$results = $bx->results();

if (count( $results ) === 0) {
    $bx->result('nothing', 'http://www.baixing.com/root/?query=' . $query, '找不到', '在百姓网搜索不到'.$query, 'icon.png' );
}

echo $bx->toxml();
?>
