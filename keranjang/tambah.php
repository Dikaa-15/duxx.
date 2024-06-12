<?php

require 'function.php';

if(isset($_POST["tambah"])) {
    if(tambah($_POST) > 0 ) {
        echo "<script type='text/javascript'>
                 alert('Pesanan berhasil tambah!')
                 window.location = 'customer.php'
              </script>";
    }else{
        echo "<script type='text/javascript'>
                 alert('Pesanan Gagal tambah!')
                 window.location = 'admin.php'
              </script>";
    }

}

session_start();

if( !isset($_SESSION["login"])) {
    header("Location: ..//auth/login.php");
    exit;
}

// require 'sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .img{
            margin-left: 40%;
            margin-top: 15px;
        }
        /* #insert{
            margin-top: 350px;
            margin-right: 250px;
        } */
    </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container">

    <form action="" method="post">
        <label for="nama_produk">Nama Produk</label><br>
        <input type="text" name="NamaProduk" id="NamaProduk"><br><br>

        <label for="jumlah">Jumlah</label><br>
        <input type="number" name="Jumlah" id="Jumlah"><br><br>

        <label for="harga">Harga</label><br>
        <input type="text" name="Harga" id="Harga"><br><br>

        <label for="nomor_invo">Nomor Invoice</label><br>
        <input type="text" name="nomor_invoice" id="nomor_invoice"><br><br>

        <label for="status">Status</label><br>
        <input type="text" name="status_pembayaran" id="status_pembayaran"><br><br>

        <label for="alamat">Alamat</label><br>
        <input type="text" name="alamat" id="alamat"><br><br>

        <label for="total">Total</label><br>
        <input type="text" name="total" id="total"><br><br>
        
        <button type="submit" name="tambah">Tambah</button>
    </form>
    </div>
</body>
</html>