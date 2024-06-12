<?php

require 'koneksi.php';


function query($query){
    
    global $conn;
  
    $result = mysqli_query($conn, $query);
    $rows = [];
  
    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
  
    return $rows;
  }

  function tambah($data){
    global $conn;

    $NamaProduk = $data["NamaProduk"];
    $Jumlah = $data["Jumlah"];
    $Harga = $data["Harga"];
    $nomor_invoice = $data["nomor_invoice"];
    $status_pembayaran = $data["status_pembayaran"];
    $alamat = $data["alamat"];
    $total = $data["total"];

    $query = "INSERT INTO product VALUES(NULL, '$NamaProduk', '$Jumlah', '$Harga', '$nomor_invoice', '$status_pembayaran', '$alamat', '$total')";
    mysqli_query($conn, $query);

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

    header('Location = ..//landing-page.php');
    
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
    $Jumlah = $data["Jumlah"];

    // bikin query untuk data
    $query = "UPDATE product SET
    Jumlah = '$Jumlah'
    WHERE id_produk = '$id'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM product WHERE NamaProduk LIKE '%$keyword%'";
    return query($query);
}

// $username = $_POST["username"];
// $password = $_POST["password"];

// $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

// $cek = mysqli_num_rows($query);

// if($cek> 0) {
//     $data = mysqli_fetch_array($query);

//     if($data["roles"] == "admin") {
//         session_start();

//         $_SESSION["id_user"] = $data["id_user"];
//         $_SESSION["username"] = $data["username"];

//         header('Location: ..//landing-page.php');

//    }else if($data ["roles"] == "customer") {
//     session_start();

//         $_SESSION["id_user"] = $data["id_user"];
//         $_SESSION["username"] = $data["username"];

//         header('Location: ..//landing-page.php');

//    }
// }else{
//     echo "<script type='text/javascript'>
//            alert('Ur Account not available')
//           </script>";
// }

?>