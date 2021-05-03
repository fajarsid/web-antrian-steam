<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

// koneksi ke database
$connect = mysqli_connect("localhost","root","","dbantrian" );
//   if($connect){
//         echo 'Berhasil';
//     }


// Tambah users
   if(isset($_POST['tambahuser'])){
    $nama = $_POST['username'];
    $jk = $_POST['jk'];
    $harga = $_POST['harga'];

    $addtotable = mysqli_query($connect,"insert into users (username, jk, harga) values('$nama','$jk','$harga') ");
    if($addtotable){
        header('location:index.php');
    } else{
        echo 'Gagal';
        header('location:index.php');
    }

};


?>