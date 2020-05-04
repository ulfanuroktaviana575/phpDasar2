<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
//ambil data di url
$id = $_GET["id"];
//query data mahasiswa berdasarkan hasilnya
$mhs = query("SELECT *FROM mahasiswa WHERE id= $id")[0];
//diberikan index ke 0 karena dengan menggunakan pemanggilan dengan query
//maka bentuk array adalah array numeric dan didalamnya terdapat array assosiatif
//var_dump($mhs["nama"]);



//cek apakah tombol submit sudah pernah dipencet atau belum
if (isset($_POST["submit"])) {

    //cek apakah data telah berhasil diubah atau belum
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah !!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
    <script>
    alert('data tidak berhasil diubah !!');
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
    <title>Ubah Data Mahasiswa</title>
</head>

<body>

    <h1>Ubah data mahasiswa</h1>
    <form action="" method="post">
        <ul>
            <li>
                <input type="hidden" name="id" value="<?php echo $mhs['id'] ?> ">
            </li>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" value="<?php echo $mhs["nrp"] ?>"></li>
            <li>
                <label for="nama">NAMA :</label>
                <input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"] ?>"></li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" value="<?php echo $mhs["email"] ?>"></li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"] ?>"></li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" value="<?php echo $mhs["gambar"] ?>"></li>
            <li><button type="submit" name="submit">Ubah Data !!!</button></li>
        </ul>

    </form>
</body>

</html>