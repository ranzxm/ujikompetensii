<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$chest = mysqli_query($conn_db, "SELECT * FROM mahasiswa_harvard WHERE nim_mhs = '" . $_GET['id'] . "' ");
$mhs_dipilih = mysqli_fetch_object($chest);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Graduate&display=swap" rel="stylesheet">
    <title>Mahasiswa : Portal Akademik</title>
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

    <div class="container" style="padding-top:30px ;">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="card" style="width: 18rem;  padding: 5px;">
                        <img src="assets/images/foto_mhs/<?php echo $mhs_dipilih->foto_mhs ?>" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-8">
                    <p>
                        *Beberapa Data tidak dapat diubah kembali, Mohon Hubungi administrator
                    </p>
                    <div class="row g-2 align-items-center">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold;">NIM</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <label class="col-form-label" style="font-weight:bold;"><?php echo $mhs_dipilih->nim_mhs ?></label>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold;">Nama</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <label class="col-form-label" style="font-weight:bold;"><?php echo $mhs_dipilih->nama_mhs ?></label>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold;">Angkatan</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <label class="col-form-label" style="font-weight:bold;">Tahun <?php echo $mhs_dipilih->mhs_ang ?></label>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold;">Program Studi</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <label class="col-form-label" style="font-weight:bold;"><?php echo $mhs_dipilih->progstud_mhs ?></label>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold;">NIK</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <label class="col-form-label" style="font-weight:bold;"><?php echo $mhs_dipilih->nik_mhs ?></label>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold;">Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <label class="col-form-label" style="font-weight:bold;"><?php echo $mhs_dipilih->tmptlhr_mhs ?>, <?php echo $mhs_dipilih->tglhr_mhs ?></label>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold ;">No. Handphone</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <input type="text" name="nohp" class="form-control" value="<?php echo $mhs_dipilih->nohp_mhs ?>">
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold ;">Email</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <input type="text" name="email" value="<?php echo $mhs_dipilih->email_mhs ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row g-2 align-items-center" style="margin-top: 10px;">
                        <div class="col-auto" style="width:200px">
                            <label class="col-form-label" style="font-weight:bold ;">Alamat</label>
                        </div>
                        <div class="col-auto" style="float: left;">
                            <textarea class="form-control" name="alamat" id="floatingTextarea" style="width: 208px;" original-title><?php echo $mhs_dipilih->alamat_mhs ?></textarea>
                        </div>
                    </div>
                    <input type="submit" name="submitt" value="Simpan" class="btn btn-primary">
                    <a href="index.php"><input type="button" class="btn btn-primary" value="Kembali"></a>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['submitt'])) {

            $no_hp = ucwords($_POST['nohp']);
            $email = ucwords($_POST['email']);
            $alamat = ucwords($_POST['alamat']);

            $update = mysqli_query($conn_db, "UPDATE mahasiswa_harvard SET nohp_mhs = '" . $no_hp . "', email_mhs = '" . $email . "', alamat_mhs = '" . $alamat . "' WHERE nim_mhs = '" . $mhs_dipilih->nim_mhs . "' ");

            if ($update) {
                echo '<script>alert("edit data berhasil")</script>';
                echo '<script>window.location="index.php"</script>';
            } else {
                echo 'gagal' . mysqli_error($conn_db);
            }
        }

        ?>
    </div>



</body>

</html>