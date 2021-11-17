<?php
require_once("dbhelp.php");
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
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Mã sinh viên</th>
                              <th>Tên sinh viên</th>
                              <th>Mã môn học</th>
                              <th>Điểm chuyên cần</th>
                              <th>Điểm giữa kì</th>
                              <th>Điểm cuối kì</th>
                              <th>Tổng kết</th>
                          </tr>
                      </thead>
                      <tbody>
    <?php
    // $sql = "select * from diem";

    if (isset($_GET['s']) && $_GET['s'] != '') {
        // $sql = 'select * from diem where maMH like "%'.$_GET['s'].'%" order by maSV, maMH';
        $sql = 'SELECT * FROM diem join sinhvien on diem.maSV = sinhvien.maSV WHERE maMH like "%'.$_GET['s'].'%" ORDER BY diem.maSV';
    } else {
        $sql = 'SELECT * FROM diem join sinhvien on diem.maSV = sinhvien.maSV ORDER BY diem.maSV';
    }
    // SELECT * FROM diem ORDER BY maSV, maMH

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