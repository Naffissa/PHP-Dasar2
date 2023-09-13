<?php
session_start();

if( !isset($_SESSION["login"]) ) {
     header("Location: login.php");
     exit;
}

require 'functions.php';
$phpdasar = query("SELECT * FROM phpdasar");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
     $phpdasar = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
     <title>Halaman Admin</title>
     <style>
          .loader {
               width: 100px;
               position: absolute;
               left: 300px;
               top: 118px;
               z-index: -1;
               display: none;
          }

          @media print {
               .logout, .tambah, .form-cari, .aksi {
                    display: none;
               }
          }
     </style>

     <script src="js/jquery-3.6.0.min.js"></script>
     <script src="js/script.js"></script>
</head>
<body>

<a href="logout.php" class="logout">LOG OUT!</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
<br></br>

<form action="" method="post" class="form-cari">

    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan kalimat!" autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>

    <img src="img/loader.gif" class="loader">

</form>

<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">

<tr>
     <th>No.</th>
     <th class="aksi">Aksi</th>
     <th>Gambar</th>
     <th>Nama</th>
     <th>NRP</th>
     <th>Email</th>
     <th>Jurusan</th>
</tr>

<?php $i = 1; ?>
<?php foreach( $mahasiswa as $row ) : ?>
<tr>
     <td><?= $i; ?></td>
     <td class="aksi">
          <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin dihapus ta masseh?');">Hapus</a>
     </td>
     <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
     <td><?= $row["nama"]; ?></td>
     <td><?= $row["nrp"]; ?></td>
     <td><?= $row["email"]; ?></td>
     <td><?= $row["jurusan"]; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</div>

</body>
</html>
<!-- install composer vid 23 kanan:00:21:36 -->

