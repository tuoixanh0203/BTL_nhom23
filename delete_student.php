<?php
if (isset($_POST['maBD'])) {
	$s_maBD = $_POST['maBD'];

	require_once ('dbhelp.php');
	$sql = 'delete from diemtongket where maBD = '.$s_maBD;
	execute($sql);

	$sql = 'delete from diem where maBD = '.$s_maBD;
	execute($sql);

	// echo 'Xoá điểm sinh viên thành công';
}

?>
