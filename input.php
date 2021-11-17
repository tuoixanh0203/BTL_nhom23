<?php
require_once ('dbhelp.php');
$s_maBD = $s_maSV = $s_maMH = $s_diemCC = $s_diemGK = $s_diemCK = $s_diemTK = '';

$s_maSV = '';
if (isset($_GET['id'])) {
	$s_maSV          = $_GET['id'];
    $s_maMH         = $_GET['maMon'];
	// $sql         = 'SELECT * FROM diem WHERE maSV = '.$s_maSV;
    $sql = "SELECT * FROM diem WHERE maSV = '$s_maSV' and maMH = '$s_maMH'";
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
        $s_maBD = $std['maBD'];
		$s_maSV = $std['maSV'];
		$s_maMH     = $std['maMH'];
		$s_diemCC  = $std['diemCC'];
        $s_diemGK  = $std['diemGK'];
		$s_diemCK  = $std['diemCK'];
        $s_diemTK  = $std['diemTK'];
	} else {
		$s_maSV = '';
	}
}

if(!empty($_POST)) {
    if (isset($_POST['maBD'])) {
		$maBD = $_POST['maBD'];
	}

    if(isset($_POST['maSV'])) {
        $s_maSV = $_POST['maSV'];
    }

    if(isset($_POST['maMH'])) {
        $s_maMH = $_POST['maMH'];
    }

    if(isset($_POST['diemCC'])) {
        $s_diemCC = $_POST['diemCC'];
    }

    if(isset($_POST['diemGK'])) {
        $s_diemGK = $_POST['diemGK'];
    }

    if(isset($_POST['diemCK'])) {
        $s_diemCK = $_POST['diemCK'];
    }

    if(isset($_POST['diemTK'])) {
        $s_diemTK = $_POST['diemTK'];
    }

    $s_maSV = str_replace('\'', '\\\'', $s_maSV);
    $s_maMH = str_replace('\'', '\\\'', $s_maMH);
    $s_diemCC = str_replace('\'', '\\\'', $s_diemCC);
    $s_diemGK = str_replace('\'', '\\\'', $s_diemGK);
    $s_diemCK = str_replace('\'', '\\\'', $s_diemCK);
    $s_diemTK = str_replace('\'', '\\\'', $s_diemTK);

    if ($s_maBD != '') {
		//update
        $sql = "update diem set maSV = '$s_maSV', maMH = '$s_maMH', diemCC = '$s_diemCC', diemGK = '$s_diemGK', diemCK = '$s_diemCK', diemTK = '$s_diemTK' where maSV= '$s_maSV' and maMH = '$s_maMH'";
	} else {
		//insert
        $sql = "INSERT INTO diem(maSV, maMH, diemCC, diemGK, diemCK, diemTK) VALUES ('$s_maSV','$s_maMH','$s_diemCC','$s_diemGK','$s_diemCK','$s_diemTK')";
	}
    // var_dump($s_maBD);
    // echo $sql;

    execute($sql);

    header('Location: quanLyDiemSV.php');
	die();
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Cập nhật điểm sinh viên</h2>
			</div>
			<div class="panel-body">
                <form method="post">
                    <div class="form-group" style="display: none;">
                        <!-- <input type="text" name="maBD" value="" style="display: none;"> -->
                        <input type="number" class="form-control" id="maBD" name="maBD" value="<?=$s_maBD?>">
                    </div>
                    <div class="form-group">
                         <label for="maSV">Mã sinh viên:</label>
                         <input required="true" type="text" class="form-control" id="maSV" name="maSV" value="<?=$s_maSV?>">
                    </div>
                    <div class="form-group">
                        <label for="maMH">Mã môn học:</label>
                        <input required="true" type="text" class="form-control" id="maMH" name="maMH" value="<?=$s_maMH?>">
                    </div>
                    <div class="form-group">
                        <label for="diemCC">Điểm chuyên cần:</label>
                        <input required="true" type="text" class="form-control" id="diemCC" name="diemCC" value="<?=$s_diemCC?>">
                    </div>
                    <div class="form-group">
                        <label for="diemGK">Điểm giữa kì:</label>
                        <input type="text" class="form-control" id="diemGK" name="diemGK" value="<?=$s_diemGK?>">
                    </div>
                    <div class="form-group">
                        <label for="diemCK">Điểm cuối kì:</label>
                        <input required="true" type="text" class="form-control" id="diemCK" name="diemCK" value="<?=$s_diemCK?>">
                    </div>
                    <div class="form-group">
                        <label for="diemTK">Điểm tổng kết:</label>
                        <input required="true" type="text" class="form-control" id="diemTK" name="diemTK" value="<?=$s_diemTK?>">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>