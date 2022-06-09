<?php
include "koneksi.php";
session_start();

if ( !isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$chest = mysqli_query($conn_db, "SELECT * FROM mahasiswa_harvard ORDER BY mhs_ang DESC");

$s_progstud = "";
$s_keyword = "";

if (isset($_POST['search'])) {
  $s_progstud = $_POST['s_progstud'];
  $s_keyword = $_POST['s_keyword'];
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Graduate&display=swap" rel="stylesheet">
  <title>Portal Akademik</title>
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

  <div class="container">
    <form method="POST" action="">
      <div class="row mb-3">
        <div class="col-sm-12" style="margin-top: 35px;">
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <select name="s_progstud" id="s_progstud" class="form-control">
              <option value="">Pilih Berdasarkan Program Studi</option>
              <option value="Teknik Komputer" <?php if ($s_progstud == "Teknik Komputer") {
                                                echo "selected";
                                              } ?>>Teknik Komputer</option>
              <option value="Manajemen Informatika" <?php if ($s_progstud == "Manajemen Informatika") {
                                                      echo "selected";
                                                    } ?>>Manajemen Informatika</option>
              <option value="Teknik Sipil" <?php if ($s_progstud == "Teknik Sipil") {
                                                      echo "selected";
                                                    } ?>>Teknik Sipil</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <input type="text" placeholder="Keyword" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <button id="search" name="search" class="btn btn-warning">Cari</button>
        </div>
      </div>
    </form>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">N I M</th>
          <th scope="col">Nama input</th>
          <th scope="col">Angkatan</th>
          <th scope="col">Program Studi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $search_jurusan = '%' . $s_progstud . '%';
        $search_keyword = '%' . $s_keyword . '%';
        $no = 1;
        $query = "SELECT * FROM mahasiswa_harvard WHERE progstud_mhs LIKE ? AND (nama_mhs LIKE ? OR mhs_ang LIKE ? OR progstud_mhs LIKE ? OR nim_mhs LIKE ?) ORDER BY mhs_ang DESC";
        $dewan1 = $conn_db->prepare($query);
        $dewan1->bind_param('sssss', $search_jurusan, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
        $dewan1->execute();
        $res1 = $dewan1->get_result();

        if ($res1->num_rows > 0) {
          while ($row = $res1->fetch_assoc()) {
            $nim = $row['nim_mhs'];
            $nama_mahasiswa = $row['nama_mhs'];
            $angkatan = $row['mhs_ang'];
            $progstud = $row['progstud_mhs'];
        ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $nim; ?></td>
              <td><?php echo $nama_mahasiswa; ?></td>
              <td><?php echo $angkatan; ?></td>
              <td><?php echo $progstud; ?></td>
              <td><a href="det-mahasiswa.php?id=<?php echo $nim ?>"><button type="button" class="btn btn-outline-info">Ubah Data</button></a></td>
            </tr>
          <?php }
        } else { ?>
          <tr>
            <td colspan='7'>Tidak ada data "<?php echo $s_keyword ?>"</td>
          </tr>
        <?php } ?>
        <!-- <?php $no = 1;
              while ($mahasiswa = mysqli_fetch_assoc($chest)) : ?>
          <tr>
            <th scope="row"><?php echo $no++ ?></th>
            <td><?php echo $mahasiswa["nim_mhs"]; ?></td>
            <td><?php echo $mahasiswa["nama_mhs"]; ?></td>
            <td><?php echo $mahasiswa["mhs_ang"]; ?></td>
            <td><?php echo $mahasiswa["progstud_mhs"]; ?></td>
            <td><a href="det-mahasiswa.php?id=<?php echo $mahasiswa["nim_mhs"] ?>"><button type="button" class="btn btn-outline-info">Ubah Data</button></a></td>
          </tr>
        <?php endwhile; ?> -->
      </tbody>
    </table>
    <a href="tambah-mahasiswa.php"><button class="btn btn-primary">Tambah Data</button></a>
  </div>

</body>

</html>