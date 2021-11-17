<?php
if (isset($_POST['maSV'])) {
	$s_maSV = $_POST['maSV'];

	require_once ('dbhelp.php');
	$sql = 'delete from diem where maSV = '.$s_maSV;
	execute($sql);

	// echo 'Xoá điểm sinh viên thành công';
}

?>