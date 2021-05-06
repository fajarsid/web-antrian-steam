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

    // update info barang
    if(isset($_POST['updatePros'])){
        $pross = '';
        $idb = $_POST['idb'];
        $pros = $_POST['pros'];
        $username = $_POST['username'];
        $jk = $_POST['jk'];
        $harga = $_POST['harga'];

        if ($pros == 'menunggu') {
            $pross = 'kerjakan';
          } else if ($pros == 'kerjakan') {
            $pross = "selesai";
          } else {
            echo 'alert("Data Tidak Dti Temukan!")';
          }

          $updateData = mysqli_query($connect,"update users set pros='$pross', username='$username', jk='$jk', harga='$harga' where iduser='$idb'");

        if($updateData){
            echo 'alert('.$pross.')';
            // header('location:index.php');
        } else{
            echo 'alert("Terjadi Kesalahan Dalam Sistem!")';
            // header('location:index.php');
        }
    }


?>