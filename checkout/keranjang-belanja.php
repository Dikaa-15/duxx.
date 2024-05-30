<?php

require 'function.php';


$sepatu = query("SELECT * FROM product");

require 'sidebar.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
    <table class="table table-stripped table-secondary">
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
                    <a href="edit.php?id=<?= $data["id_produk"]; ?>" class="btn btn-success">Ganti</a>
                    <a href="batal.php?id=<?= $data["id_produk"]; ?>" onClick="return confirm ('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Batal</a>
                </td>
            </tr>
        <?php $nourut++ ;?>
        <?php endforeach; ?>


    </table>
    <a href="tambah.php" class="btn btn-success px-4 py-2 mx-5">Tambah Pesanan</a>

    </div>
</body>

</html>