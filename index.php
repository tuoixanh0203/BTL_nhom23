<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
    <link rel='shortcut icon' href='/image/uet.png' />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
    <!-- <style> body { background-image: url(\"\"); } </style>"; -->
    
</head>

<body style="background-img:url(background.png)">
    <div class="container">
        <div id="text">
            <h1>VIEW GRADE</h1>
            <h3>Hệ thống tra cứu điểm thi <br>
            Trường ĐH Công Nghệ</h3>
        </div>
        <div class="" id="formNhap">
            <form action="login.php" method="POST" class="form">
                <div id="msv-div" class="row">
                    <input type="text" placeholder="Tài khoản" class="required" name="username">
                </div>
                <div id="password-div" class="row">
                    <input type="password" placeholder="Mật khẩu" class="required" name="password">
                </div>
                <div id="button-div">
                    <button class="button">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>