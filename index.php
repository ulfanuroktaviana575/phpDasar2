<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php ';
$mahasiswa = query("SELECT *FROM mahasiswa ORDER BY id DESC");

//ketiika tombol cari di klik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <style>
        .body {
            /* background-image: url("kelinciku.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%; */
            background-color: lightsteelblue;

        }

        .table {
            background-color: white;
        }

        .tr {
            background-color: lightblue;
        }

        .judul {
            font-size: 50px;
            text-shadow: 4px 4px 5px white;
        }
    </style>
</head>

<body class="body">
    <center>

        <a href="logout.php">Logout!</a>
        <h1 class="judul">Daftar Mahasiswa</h1>
        <a href="tambah.php">Tambah Data Mahasiswa</a>
        <br>
        <br>

        <form action="" method="post">

            <input type="text" name="keyword" size="30px" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
        </form>
        <br><br>
        <table class="table" border="1" cellpadding="10" cellspacing="0">


            <tr class="tr">
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($mahasiswa as $row) : ?>

                <tr>

                    <td><?php echo $i ?></td>
                    <td><a href="ubah.php?id=<?php echo $row["id"] ?>">ubah</a>
                        <a href="hapus.php?id=<?php echo $row["id"] ?>" onclick="return confirm('yakin ?');">hapus</a></td>
                    <td>
                        <img src="./website/<?php echo $row["gambar"] ?>" alt="">
                    </td>
                    <td><?php echo $row["nrp"] ?></td>
                    <td><?php echo $row["nama"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["jurusan"] ?> </td>
                </tr><?php $i++ ?>
            <?php endforeach; ?>


        </table>
    </center>
</body>

</html>