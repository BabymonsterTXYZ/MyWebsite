<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "คุณจำเป็นต้องใส่ Username");
            $_SESSION['error'] = "คุณจำเป็นต้องใส่ Username";
        }
        if (empty($email)) {
            array_push($errors, "คุณจำเป็นต้องใส่ Email");
            $_SESSION['error'] = "คุณจำเป็นต้องใส่ Email";
        }
        if (empty($password_1)) {
            array_push($errors, "คุณจำเป็นต้องใส่ Password");
            $_SESSION['error'] = "คุณจำเป็นต้องใส่ Password";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง!");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง!";
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1"; 
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "ชื่อผู้ใช้นี้ถูกใช้เเล้ว"); 
            }
            if ($result['email'] === $email) {
                array_push($errors, "อีเมลนี้ถูกใช้เเล้ว");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')"; 
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username; 
            $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ!"; 
            header('location: index.php');
        } else {
            header("location: register.php");
        }
    }