<!DOCTYPE html>
<html>

<head>
    <title>Update barang</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <?php

        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Cek nilai yang dikirim menggunakan methos GET dengan nama id_barang
        if (isset($_GET['id_barang'])) {
            $id_barang = $_GET["id_barang"];

            $sql = "select * from barang where id_barang =$id_barang";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_barang = htmlspecialchars($_POST["id_barang"]);
            $nama_barang = $_POST["nama_barang"];
            $jumlah_barang = $_POST["jumlah_barang"];
            $harga_barang = $_POST["harga_barang"];


            //Mengeksekusi atau menjalankan query
            $hasil = mysqli_query($kon, "UPDATE barang SET nama_barang='$nama_barang',jumlah_barang='$jumlah_barang',harga_barang='$harga_barang' WHERE id_barang=$id_barang");

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
            }
        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>" placeholder="Masukan Nama Barang" required />

            </div>
            <div class="form-group">
                <label>Jumlah :</label>
                <input type="text" name="jumlah_barang" class="form-control" value="<?php echo $data['jumlah_barang']; ?>" placeholder="Masukan Jumlah" required />

            </div>
            <div class="form-group">
                <label>Harga :</label>
                <input type="text" name="harga_barang" class="form-control" value="<?php echo $data['harga_barang']; ?>" placeholder="Masukan " required />

            </div>

            <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>