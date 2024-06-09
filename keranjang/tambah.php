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

session_start();

if( !isset($_SESSION["login"])) {
    header("Location: ..//auth/login.php");
    exit;
}

require 'sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" class="bg-white mt-5">
        <input type="hidden" name="id_produk">
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Nama produk</label>
            <div class="col-sm-10">
                <input type="text" name="NamaProduk" id="NamaProduk" required class="form-control" autofocus>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="text" name="Gambar" id="Gambar" required class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="number" name="Jumlah" id="Jumlah" required class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Harga</label>
            <div class="col-sm-10">                
                <input type="number" name="Harga" id="Harga" required class="form-control">
            </div>
        </div>
        <button type="submit" name="tambah" class="mx-auto p-2 btn btn-primary" style="width: 200px;">Tambah</button>

    </form>
</body>
</html>