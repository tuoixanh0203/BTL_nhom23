<?php
require_once ('dbhelp.php');

$u = $_POST['username'];
$p = $_POST['password'];

$sql = "select * from taikhoan where username='$u' and password='$p'";

$account = executeResult($sql);
	if ($account != null && count($account) > 0) {
		$acc        = $account[0];
        $role = $acc['role'];
        if($role == 1) {
            header('Location: quanLyDiemSV.php');
        } else {
            header("Location: SVTimKiem.php");
        }
	} else {
		header("Location: index.php");
	}

?>