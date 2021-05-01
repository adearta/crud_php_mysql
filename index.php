<!DOCTYPE html>
<html>

<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <h4>List Barang</h4>
        <?php

        include "koneksi.php";

        //Cek apakah ada nilai dari method GET dengan nama id_anggota
        if (isset($_GET['id_barang'])) {
            $id_barang = htmlspecialchars($_GET["id_barang"]);

            $sql = "delete from barang where id_barang='$id_barang' ";
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>

        <a href="create.php" class="btn btn-primary" role="button">Tambah Barang </a>
        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th colspan='2'>Aksi</th>

                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $sql = "select * from barang order by id_BARANG desc";

            $hasil = mysqli_query($kon, $sql) or die("Query error : " . mysqli_error($db));
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>

                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["nama_barang"]; ?></td>
                        <td><?php echo $data["jumlah_barang"];   ?></td>
                        <td><?php echo $data["harga_barang"];   ?></td>
                        <td>
                            <a href="update.php?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>


    </div>
</body>

</html>