<?php

require 'koneksi.php';


function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data){
    global $conn;

    // deklarasikan inputan apa aja yang ingin kalian insert / masukan
    $NamaProduk = $data["NamaProduk"];
    $Gambar = $data["Gambar"];
    $Jumlah = $data["Jumlah"];
    $Harga = $data["Harga"];

    //Jalankan perintah SQL
    $query = "INSERT INTO product VALUES (NULL, '$NamaProduk', '$Gambar', '$Jumlah', '$Harga')";
    mysqli_query($conn, $query);

    // kembalikan nilainya
    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah atau atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah tersedia');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ){
        echo "<script>
             alert('konfirmasi password tidak sesuai!');
            </script>";
            return false;
    }

    // return 1;

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");
    
    return mysqli_affected_rows($conn);
} 

function batal($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM product WHERE id_produk ='$id'");
    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    // deklarasiin data
    $id = $data["id_produk"];
    $NamaProduk = $data["NamaProduk"];
    $Gambar = $data["Gambar"];
    $Jumlah = $data["Jumlah"];
    $Harga = $data["Harga"];

    // bikin query untuk data
    $query = "UPDATE product SET
    NamaProduk = '$NamaProduk',
    Gambar = '$Gambar',
    Jumlah = '$Jumlah',
    Harga = '$Harga'
    WHERE id_produk = '$id'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>