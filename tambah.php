<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
//cek apakah tombol submit sudah pernah dipencet atau belum
if (isset($_POST["submit"])) {


    //cek apakah data telah berhasil ditambahkan atau belum
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan !!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
    <script>
    alert('data tidak berhasil ditambahkan !!');
    document.location.href = 'index.php';
    </script>
    ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>

<body>

    <h1>Tambah data mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp"></li>
            <li>
                <label for="nama">NAMA :</label>
                <input type="text" name="nama" id="nama"></li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email"></li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan"></li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar"></li>



            <li><button type="submit" name="submit">Tambah Data !!!</button></li>
        </ul>

    </form>
</body>

</html>