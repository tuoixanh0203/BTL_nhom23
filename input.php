<?php
session_start();
require_once ('dbhelp.php');
$maGV = $_SESSION['u'];

$sql = 'SELECT maMH FROM monhoc_giaovien WHERE maGV like "%'.$_SESSION['u'].'%"';

$list = executeResult($sql);
$listMH = [];

foreach($list as $item){
    $listMH[] = $item['maMH'];
}

$s_maBD = $s_maSV = $s_maMH = $s_diemCC = $s_diemGK = $s_diemCK = '';

$s_maSV = '';
if (isset($_GET['id'])) {
	$s_maSV          = $_GET['id'];
    $s_maMH         = $_GET['maMon'];
	// $sql         = 'SELECT * FROM diem WHERE maSV = '.$s_maSV;
    $sql = "SELECT d.maBD, d.maSV, d.maMH, d.diemCC, d.diemGK, d.diemCK
            FROM diem d
            JOIN diemtongket dtk on d.maBD = dtk.maBD 
            WHERE maSV = '$s_maSV' and maMH = '$s_maMH'";
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
        $s_maBD = $std['maBD'];
		$s_maSV = $std['maSV'];
		$s_maMH     = $std['maMH'];
		$s_diemCC  = $std['diemCC'];
        $s_diemGK  = $std['diemGK'];
		$s_diemCK  = $std['diemCK'];
        // $s_diemTK  = $std['diemTK'];
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

    // if(isset($_POST['diemTK'])) {
    //     $s_diemTK = $_POST['diemTK'];
    // }

    $s_maSV = str_replace('\'', '\\\'', $s_maSV);
    $s_maMH = str_replace('\'', '\\\'', $s_maMH);
    $s_diemCC = str_replace('\'', '\\\'', $s_diemCC);
    $s_diemGK = str_replace('\'', '\\\'', $s_diemGK);
    $s_diemCK = str_replace('\'', '\\\'', $s_diemCK);
    // $s_diemTK = str_replace('\'', '\\\'', $s_diemTK);

    if ($s_maBD != '') {
		//update
        $sql = "update diem set maSV = '$s_maSV', maMH = '$s_maMH', diemCC = '$s_diemCC', diemGK = '$s_diemGK', diemCK = '$s_diemCK' where maSV= '$s_maSV' and maMH = '$s_maMH'";
	} else {
		//insert
        if (in_array("$s_maMH", $listMH)) {
            $sql = "INSERT INTO diem(maSV, maMH, diemCC, diemGK, diemCK, maGV) VALUES ('$s_maSV','$s_maMH','$s_diemCC','$s_diemGK','$s_diemCK', '$maGV')";
        }
	}
    // var_dump($s_maBD);
    // echo $sql;

    execute($sql);

    header('Location: quanLyDiemSV.php');
	die();
}

// Huyen and Tuoi :))

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
				<h2 class="text-center">C???p nh???t ??i???m sinh vi??n</h2>
			</div>
			<div class="panel-body">
                <form method="post">
                    <div class="form-group" style="display: none;">
                        <!-- <input type="text" name="maBD" value="" style="display: none;"> -->
                        <input type="number" class="form-control" id="maBD" name="maBD" value="<?=$s_maBD?>">
                    </div>
                    <div class="form-group">
                         <label for="maSV">M?? sinh vi??n:</label>
                         <input required="true" type="text" class="form-control" id="maSV" name="maSV" value="<?=$s_maSV?>">
                    </div>
                    <div class="form-group">
                        <label for="maMH">M?? m??n h???c:</label>
                        <input required="true" type="text" class="form-control" id="maMH" name="maMH" value="<?=$s_maMH?>">
                    </div>
                    <div class="form-group">
                        <label for="diemCC">??i???m chuy??n c???n:</label>
                        <input required="true" type="text" class="form-control" id="diemCC" name="diemCC" value="<?=$s_diemCC?>">
                    </div>
                    <div class="form-group">
                        <label for="diemGK">??i???m gi???a k??:</label>
                        <input type="text" class="form-control" id="diemGK" name="diemGK" value="<?=$s_diemGK?>">
                    </div>
                    <div class="form-group">
                        <label for="diemCK">??i???m cu???i k??:</label>
                        <input required="true" type="text" class="form-control" id="diemCK" name="diemCK" value="<?=$s_diemCK?>">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="diemTK">??i???m t???ng k???t:</label>
                        <input required="true" type="text" class="form-control" id="diemTK" name="diemTK" value="<?=$s_diemTK?>">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>