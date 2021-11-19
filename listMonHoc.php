<?php
require_once ('dbhelp.php');
$sql = 'SELECT maMH FROM monhoc_giaovien WHERE maGV = "GV01"';

$list = executeResult($sql);
$listMH = [];

foreach($list as $item){
    $listMH[] = $item['maMH'];
    // var_dump($item);
    // echo $item['maMH'];
}

// echo '<pre>';
// var_dump($listMH);
// echo '<pre>';

$s = "123456";
echo md5($s);

?>
