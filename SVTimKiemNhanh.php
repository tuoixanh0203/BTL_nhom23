<?php
require_once("dbhelp.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm nhanh</title>
    <link rel="stylesheet" href="style1.css">
    <link rel='shortcut icon' href='/image/uet.png' />
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
    <div class="header">
        <div class="logo">

        </div>
        <button class="buttonMenu" id="timKiemNhanh">TÌM KIẾM NHANH

        </button>
        <button class="buttonMenu" id="timKiemTuyChon">TÌM KIẾM TÙY CHỌN

        </button>
        <button class="buttonMenu" id="DSMonHoc">DANH SÁCH MÔN HỌC

        </button>
    </div>
    <div class="center" id="timKiemNhanh">
        <h1>Hệ thống tra cứu điểm thi học kì</h1>
        <h2>Trường ĐH Công Nghệ</h2>
        <!-- <input class="timKiemNhanh" type="text" placeholder="Nhập tên hoặc mã môn học..."> -->
        <form method="get">
			<input type="text" name="s" class="form-control timKiemNhanh" size="50" placeholder="Nhập mã môn học">
		</form>

        <table class="table table-bordered">
                      <thead>
                          <tr>
                            <th>Mã sinh viên</th>
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
        $sql = 'select * from diem where maMH like "%'.$_GET['s'].'%" order by maSV, maMH';
        $studentList = executeResult($sql);
        foreach($studentList as $std) {
            echo '<tr>
                <td>'.$std["maSV"].'</td>
                <td>'.$std["maMH"].'</td>
                <td>'.$std["diemCC"].'</td>
                <td>'.$std["diemGK"].'</td>
                <td>'.$std["diemCK"].'</td>
                <td>'.$std["diemTK"].'</td>
            </tr>';
        }
    } 
    // else {
    //     $sql = 'select * from diem order by maSV, maMH';
    // }
    // SELECT * FROM diem ORDER BY maSV, maMH

    // $studentList = executeResult($sql);

    // foreach($studentList as $std) {
    //     echo '<tr>
    //         <td>'.$std["maSV"].'</td>
    //         <td>'.$std["maMH"].'</td>
    //         <td>'.$std["diemCC"].'</td>
    //         <td>'.$std["diemGK"].'</td>
    //         <td>'.$std["diemCK"].'</td>
    //         <td>'.$std["diemTK"].'</td>
    //     </tr>';
    // }
    ?>
                      </tbody>
                  </table>

    </div>
    <div class="footer">
        Trung tâm máy tính (CCNE) <br>
        Trường ĐH Công Nghệ - ĐHQGHN <br><br>
        Copyright © ccne 2016 <br>
    </div>
</body>
</html>