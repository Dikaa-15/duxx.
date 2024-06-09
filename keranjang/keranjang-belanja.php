<?php

require 'function.php';


$sepatu = query("SELECT * FROM product");

if(isset($_POST["cari"])) {
    $sepatu = cari($_POST["keyword"]);
}

require 'sidebar.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #footer{
            margin-top: 450px;
            bottom: 0px;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <nav class="mt-5 ml-3">
        <form action="" method="POST">
            <input type="text" name="keyword" size="50" autofocus placeholder="Cari Pesanan Mu" autocomplete="off">
            <button type="submit" name="cari" class="btn btn-success">Search ur pesanan</button>
        </form>
    </nav>
    <div class="row table table-responsive">
    <table class="table table-striped ">
        <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Gambar</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
        <?php $nourut = 1; ?>
        <?php foreach($sepatu as $data) : ?>
            <tr>
                <td><?= $nourut; ?></td>
                <td><?= $data ["NamaProduk"]; ?></td>
                <td><?= $data ["Gambar"]; ?></td>
                <td><?= $data ["Jumlah"]; ?></td>
                <td><?= $data ["Harga"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data["id_produk"]; ?>" class="btn btn-primary">Ganti</a>
                    <a href="batal.php?id=<?= $data["id_produk"]; ?>" onClick="return confirm ('Apakah anda yakin ingin membatalkan pesananan ini..')" class="btn btn-danger">Batal</a>
                </td>
            </tr>
        <?php $nourut++ ;?>
        <?php endforeach; ?>


    </table>
    <a href="tambah.php" class="btn btn-success px-4 py-2 mx-5">Tambah Pesanan</a>

    </div>
    <footer>
            <section class="" id="footer">
                <p class="hover:text-green-500">© duxx.All Rights Reserved</p>
            </section>
    </footer>
</body>

</html>