<!DOCTYPE html>
<html>

<head>
    <title>Tambah Barang</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <?php
        // koneksikan ke database
        include "koneksi.php";


        //Cek  form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $namaBarang = $_POST["nama_barang"];
            $jumlahBarang = $_POST["jumlah_barang"];
            $hargaBarang = $_POST["harga_barang"];

            //Query input menginput data kedalam tabel anggota
            $sql = "insert into barang (nama_barang,jumlah_barang,harga_barang) values
		('$namaBarang','$jumlahBarang','$hargaBarang')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang" required />

            </div>
            <div class="form-group">
                <label>jumlah:</label>
                <input type="text" name="jumlah_barang" class="form-control" rows="5" placeholder="Masukan Jumlah" required></textarea>

            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga_barang" class="form-control" placeholder="Masukan Harga" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>