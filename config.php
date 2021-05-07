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
    $pros = "menunggu";

    $addtotable = mysqli_query($connect, "INSERT INTO users (username, pros, jk, harga) values('$nama', '$pros', '$jk','$harga')");
    if($addtotable){
        echo 'alert('.$pros.')';
        // header('location:index.php');
    } else{
        echo("Error description: " . $connect -> error);
        echo 'alert("Terjadi Kesalahan Dalam Sistem!")';
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

        if ($pros == 'Menunggu') {
            $pross = 'Proses';
          } else if ($pros == 'Kerjakan') {
            $pross = "Selesai";
          } else {
            echo '<script>alert("Data Tidak Di Temukan!")</script>';
          }

          $updateData = mysqli_query($connect,"update users set pros='$pross', username='$username', jk='$jk', harga='$harga' where iduser='$idb'");

        if($updateData){
            echo '<script>alert('.$pross.')</script>';
            // header('location:index.php');
        } else{
            echo '<script>alert("Terjadi Kesalahan Dalam Sistem!")</script>';
            // header('location:index.php');
        }
    }


?>