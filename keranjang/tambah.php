<?php

require 'function.php';

if(isset($_POST["tambah"])) {
    if(tambah($_POST) > 0 ) {
        echo "<script type='text/javascript'>
                 alert('Pesanan berhasil tambah!')
                 window.location = 'admin.php'
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

require 'sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form action="" method="POST" class="container bg-white mt-5"  enctype="multipart/form-data">
        <input type="hidden" name="id_produk">
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Nama produk</label>
            <div class="col-sm-10">
                <input type="text" name="NamaProduk" id="NamaProduk" required class="form-control" autofocus>
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
        <!-- <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Nomor Resi</label>
            <div class="col-sm-10">                
                <input type="number" name="nomor_invoice"  required class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Status Pembayaran</label>
            <div class="col-sm-10">                
                <input type="text" name="status_pembayaran" required class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="exampleFormControlTextarea1" class="col-sm-2 form-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"  required ></textarea>

        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 form-label">Total</label>
            <div class="col-sm-10">                
                <input type="number" name="total" required class="form-control">
            </div>
        </div> -->
       
            </form>
        <button type="submit" name="tambah" class="mx-auto p-2 btn btn-primary"  style="width: 200px;">Tambah</button>
</body>
</html>