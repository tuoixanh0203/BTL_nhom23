<?php
session_start();
// echo $_SESSION['u'];
require_once("dbhelp.php");
$sql = 'SELECT tenGV FROM giangvien WHERE maGV like "%'.$_SESSION['u'].'%"';
$tenGV = executeResult($sql);
if ($tenGV != null && count($tenGV) > 0) {
    $nameGV        = $tenGV[0];
    $name = $nameGV['tenGV'];
}
// echo $name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manage</title>
    <link rel="stylesheet" href="styleQLSV.css">
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
                <h1 class="text-center">Quản lý điểm sinh viên</h1>
                <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo mã sinh viên">
				</form>
            </div>
            <div class="panel-body">
                  <label for="tenGV">Giảng viên:</label>
                  <?php
                    echo $name;
                  ?>
                  <br>
                  <button class="btn btn-success" onclick="window.open('input.php', '_self')">Add</button>
                  <button class="btn btn-logout btn-danger" onclick="window.open('index.php', '_self')">Log out</button>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Mã sinh viên</th>
                              <th>Họ tên</th>
                              <th>Mã môn học</th>
                              <th>Điểm chuyên cần</th>
                              <th>Điểm giữa kì</th>
                              <th>Điểm cuối kì</th>
                              <th>Tổng kết</th>
                              <th width="60px"></th>
                              <th width="60px"></th>
                          </tr>
                      </thead>
                      <tbody>
    <?php

    if (isset($_GET['s']) && $_GET['s'] != '') {
        $sql = 'select d.maBD, d.maSV, sv.tenSV, d.maMH, d.diemCC, d.diemGK, d.diemCK, dtk.diemTK
        from diem d
        join monhoc_giaovien mh_gv on d.maMH = mh_gv.maMH
        join sinhvien sv on d.maSV = sv.maSV
        join diemtongket dtk on dtk.maBD = d.maBD
        where d.maSV like "%'.$_GET['s'].'%" and mh_gv.maGV like "%'.$_SESSION['u'].'%"
        order by d.maMH, d.maSV';
    } else {
        $sql = 'select d.maBD, d.maSV, sv.tenSV, d.maMH, d.diemCC, d.diemGK, d.diemCK, dtk.diemTK
        from diem d
        join monhoc_giaovien mh_gv on d.maMH = mh_gv.maMH
        join sinhvien sv on d.maSV = sv.maSV
        join diemtongket dtk on dtk.maBD = d.maBD
        where mh_gv.maGV like "%'.$_SESSION['u'].'%"
        order by d.maMH, d.maSV';
    }

    $studentList = executeResult($sql);

    foreach($studentList as $std) {
        echo '<tr>
            <td>'.$std["maSV"].'</td>
            <td>'.$std["tenSV"].'</td>
            <td>'.$std["maMH"].'</td>
            <td>'.$std["diemCC"].'</td>
            <td>'.$std["diemGK"].'</td>
            <td>'.$std["diemCK"].'</td>
            <td>'.$std["diemTK"].'</td>
            <td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['maSV'].'&maMon='.$std['maMH'].'","_self")\'>Edit</button></td>
            <td><button class="btn btn-danger" onclick="deleteStudent('.$std['maBD'].')">Delete</button></td>
        </tr>';
    }
    ?>
                      </tbody>
                  </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteStudent(maBD) {
			option = confirm('Bạn có chắc muốn xoá điểm của sinh viên này không?')
			if(!option) {
				return;
			}

			console.log(maBD);
			$.post('delete_student.php', {
				'maBD': maBD
			}, function(data) {
				// alert(data)
				location.reload();
			})
		}
	</script>
</body>
</html>

