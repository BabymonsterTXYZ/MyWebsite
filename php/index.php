<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";  
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);   
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเเรก | Basic Camp</title>

    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="homeheader">
        <h2>หน้าเเรก | Basic Camp</h2>
    </div>
    <div class="homecontent">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php if (isset($_SESSION['username'])) : ?>
            <p>ยินดีต้อนรับคุณ <strong><?php echo $_SESSION['username']; ?></strong> เข้าสู่เว็บไซต์ Basic Camp Login + Register System Test ครับ !</p> ข้อความยินดีต้อนรับ พร้อมกับชื่อผู้ใช้งาน
            <a href="index.php?logout='1'"><button class="btn btn-danger" id="topupclick"><i class="fad fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</button></a> ปุ่มกดออกจากระบบ
        <?php endif ?>
    </div>

</body>

</html>