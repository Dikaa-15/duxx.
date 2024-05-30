<?php

require 'function.php';

if(isset($_POST["tambah"])) {
    if(tambah($_POST) > 0 ) {
        echo "<script type='text/javascript'>
                 alert('Pesanan berhasil tambah!')
                 window.location = 'keranjang-belanja.php'
              </script>";
    }else{
        echo "<script type='text/javascript'>
                 alert('Pesanan Gagal tambah!')
                 window.location = 'keranjang-belanja.php'
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <input type="hidden" name="id_produk">
        <label for="">Nama produk</label>
        <input type="text" name="NamaProduk" id="NamaProduk">
        <label for="">Gambar</label>
        <input type="text" name="Gambar" id="Gambar">
        <label for="">Jumlah</label>
        <input type="number" name="Jumlah" id="Jumlah">
        <label for="">Harga</label>
        <input type="number" name="Harga" id="Harga">

        <button type="submit" name="tambah">Tambah</button>

    </form>
</body>
</html>