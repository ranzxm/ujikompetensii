<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST["pass"];

    $chest = mysqli_query($conn_db, "SELECT * FROM admin WHERE uname_adm = '$username' ");

    if (mysqli_num_rows($chest) === 1) {
        $row = mysqli_fetch_assoc($chest);

        if ($password === $row["pass_adm"]) {
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error=true;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="lib/bs/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Graduate&display=swap" rel="stylesheet">
    <title>Login : Portal Akademik</title>
    <style>
        .bg-color {
            background-color: cyan;
        }

        .margin-left-img {
            margin-left: 10px;
        }

        .bg-cover {
            background-image: url("assets/images/harvardpic2.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-1">
        <div>
            <a class="navbar-brand align-middle" href="#" style="position: absolute; display: flex; align-items: center;">
                <img src="assets/images/harvardbrand.png" alt="" height="80" class="d-inline-block margin-left-img">
                <div style="text-transform: uppercase; font-family: 'Graduate', cursive; font-weight: bold; font-size: 25px; color: rgb(78, 78, 78);">
                    Harvard University
                </div>
            </a>
        </div>
    </nav>
    <div class="bg-cover ">
        <div class="loginBox mx-auto">
            <h3>PORTAL AKADEMIK</h3>
            <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
            <form action="" method="post">
                <div class="inputBox"> <input id="uname" type="text" name="uname" placeholder="user"> <input id="pass" type="password" name="pass" placeholder="password"> </div> <input type="submit" name="login" value="Login">

                <?php if (isset($error)) : ?>
                    <p style="color:red ; font-weight:bold;">User / Password yang anda masukkan salah !</p>
                <?php endif; ?>
            </form>
        </div>

    </div>
    </div>



</body>


</html>