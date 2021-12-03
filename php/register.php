<?php
session_start();
include('sever.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก | Basic Camp</title>

    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="header">
        <h2>Register | สมัครสมาชิก</h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('error.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3> //ในส่วนนี้จะเป็นการเเสดง errors ของ register
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username"><i class="fad fa-user"></i> Username | ชื่อผู้ใช้งาน</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="email"><i class="fad fa-envelope"></i> Email | อีเมล</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="password_1"><i class="fad fa-lock"></i> Password | รหัสผ่าน</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2"><i class="fad fa-lock"></i> Confirm Password | ยืนยันรหัสผ่าน</label>
            <input type="password" name="password_2">
        </div>
        <center>
            <div class="input-group">
                <button type="submit" name="reg_user" class="btn btn-success">สมัครสมาชิก</button>
            </div>
        </center>
        <center><p><b>Have an account       <a href="login.php">Login</b></a></p></center>
    </form>

</body>

</html>