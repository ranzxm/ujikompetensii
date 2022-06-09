<?php

include "koneksi.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$chest = mysqli_query($conn_db, "SELECT * FROM mahasiswa_harvard");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah-mahasiswa.css">
    <link rel="stylesheet" href="lib/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Graduate&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light bg-nav-grey">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="align-items: center;">
                <img src="assets/images/harvardbrand.png" alt="" height="30" class="d-inline-block align-text-top">
                <span style="color:rgb(255, 255, 255); font-family: 'Graduate', cursive;">Harvard University</span>
            </a>
        </div>
    </nav>
    <form action="" method="post">
    <div class="container" style="margin-bottom:20px;">
        <div class="card" style="width:100%; margin-top: 20px;">
            <h5 class="card-header" style="font-weight:bold;">Tambah Data Mahasiswa</h5>
            <div class="card-body">
            <h5 class="card-title">NIM</h5>
            <input type="text" class="form-control" name = "nim" placeholder="masukkan NIM" style="margin-bottom:10px" required>
            <h5 class="card-title" >Nama</h5>
            <input type="text" class="form-control" name = "nama" placeholder="masukkan Nama" style="margin-bottom:10px" required>
            <h5 class="card-title" >Angkatan</h5>
            <input type="text" class="form-control" name = "angkatan" placeholder="contoh : 2020" style="margin-bottom:10px" required>
            <h5 class="card-title" >Program Studi</h5>
            <input type="text" class="form-control" name = "programstudi" placeholder="program studi" style="margin-bottom:10px" required>
            <h5 class="card-title" >NIK</h5>
            <input type="text" class="form-control" name = "nik" placeholder="masukkan NIK sesuai dengan KTP" style="margin-bottom:10px" required>
            <h5 class="card-title" >Tempat Lahir</h5>
            <input type="text" class="form-control" name = "tempatlahir" placeholder="masukkan tempat lahir" style="margin-bottom:10px" required>
            <h5 class="card-title" >Tanggal Lahir</h5>
            <input type="date" class="form-control" name = "tanggallahir" placeholder="YYYY-MM-DD" style="margin-bottom:10px" required>
            <h5 class="card-title" >No. Handphone</h5>
            <input type="text" class="form-control" name = "nohp" placeholder="diawali dengan 08" style="margin-bottom:10px" required>
            <h5 class="card-title" >Email</h5>
            <input type="email" class="form-control" name = "email" placeholder="masukkan email" style="margin-bottom:10px" required>
            <h5 class="card-title" >Alamat</h5>
            <input type="text" class="form-control" name = "alamat" placeholder="masukkan alamat" style="margin-bottom:20px" required>
            <h5 class="card-title" >Upload Foto</h5>
            <div class="input-group">
            <div class="custom-file" style="margin-bottom:20px;">
                <input type="file"  name="foto" class="custom-file-input" id="inputGroupFile04">
            </div>
            </div>
            <input type="submit" name="submitt" value="Simpan" class="btn btn-primary">
            </div>
        </div>
    </div>
    </form>

    <div class="container">
    <a href="index.php"><button class="btn btn-secondary">Kembali</button></a>
    </div>

    <?php
        if (isset($_POST['submitt'])) {

            $nim = ucwords($_POST['nim']);
            $nama = ucwords($_POST['nama']);
            $angkatan = ucwords($_POST['angkatan']);
            $programstudi = ucwords($_POST['programstudi']);
            $nik = ucwords($_POST['nik']);
            $tempatlahir = ucwords($_POST['tempatlahir']);
            $tanggallahir = ucwords($_POST['tanggallahir']);
            $nohp = ucwords($_POST['nohp']);
            $email = ucwords($_POST['email']);
            $alamat = ucwords($_POST['alamat']);
            $foto = ucwords($_POST['foto']);

            $insert = mysqli_query($conn_db, "INSERT INTO mahasiswa_harvard 
            (nim_mhs, nama_mhs, mhs_ang, progstud_mhs, nik_mhs, nohp_mhs, tmptlhr_mhs, tglhr_mhs, foto_mhs, email_mhs, alamat_mhs) VALUES 
            ('$nim', '$nama', '$angkatan', '$programstudi', '$nik', '$nohp', '$tempatlahir', '$tanggallahir', '$foto', '$email', '$alamat') ");

            if ($insert) {
                echo '<script>alert("tambah data berhasil")</script>';
                echo '<script>window.location="index.php"</script>';
            } else {
                echo 'gagal' . mysqli_error($conn_db);
            }
        }

    ?>
    
</body>
</html>