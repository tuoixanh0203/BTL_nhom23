<?php
session_start();
//echo $_SESSION['u'];
$name = '';
$code = '';
require_once("dbhelp.php");
$sql = 'SELECT * FROM sinhvien WHERE maSV like "%'.$_SESSION['u'].'%"';
$tenSV = executeResult($sql);
if ($tenSV != null && count($tenSV) > 0) {
    $nameSV        = $tenSV[0];
    $name = $nameSV['tenSV'];
    $code = $nameSV['maSV'];
}

// Huyen and Tuoi :))

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinh Viên Tìm Kiếm</title>
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
                <h1 class="text-center">Hệ thống tra cứu điểm thi học kì</h1>
                <h1 class="text-center">Trường ĐH Công Nghệ</h1>
                <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 20px; margin-bottom: 20px;" placeholder="Nhập mã môn học">
				</form>
            </div>
            <div class="panel-body">
            <label for="tenSV">Sinh viên:</label>
                <?php
                    echo $name;
                ?><br>
            <label for="maSV">Mã sinh viên:</label>
                <?php
                    echo $code;
                ?><br>
            <button class="btn btn-logout btn-danger" onclick="window.open('index.php', '_self')">Log out</button>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Tên môn học</th>
                              <th>Mã môn học</th>
                              <th>Điểm chuyên cần</th>
                              <th>Điểm giữa kì</th>
                              <th>Điểm cuối kì</th>
                              <th>Tổng kết</th>
                          </tr>
                      </thead>
                      <tbody>
    <?php

    if (isset($_GET['s']) && $_GET['s'] != '') {
        $sql = 'SELECT * 
                FROM diem d join sinhvien sv on d.maSV = sv.maSV 
                join monhoc mh on d.maMH = mh.maMH
                join diemtongket dtk on dtk.maBD = d.maBD
                WHERE d.maMH like "%'.$_GET['s'].'%" and d.maSV like "%'.$_SESSION['u'].'%"
                ORDER BY d.maSV';
    } else {
        $sql = 'SELECT * 
                FROM diem d join sinhvien sv on d.maSV = sv.maSV 
                join monhoc mh on d.maMH = mh.maMH
                join diemtongket dtk on dtk.maBD = d.maBD
                WHERE d.maSV like "%'.$_SESSION['u'].'%"
                ORDER BY d.maSV';
    }

    $studentList = executeResult($sql);

    foreach($studentList as $std) {
        echo '<tr>
            <td>'.$std["tenMH"].'</td>
            <td>'.$std["maMH"].'</td>
            <td>'.$std["diemCC"].'</td>
            <td>'.$std["diemGK"].'</td>
            <td>'.$std["diemCK"].'</td>
            <td>'.$std["diemTK"].'</td>
        </tr>';
    }
    ?>
                      </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>



</html>