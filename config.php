<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

// koneksi ke database
    $connect = mysqli_connect("localhost","root","","dbantrian" );
    
// Tambah users
   if(isset($_POST['tambahuser'])){

    $nama = $_POST['username'];
    $jk = $_POST['jk'];
    $harga = $_POST['harga'];
    $pros = "Menunggu";

    $cekData = mysqli_query($connect, "SELECT username FROM users WHERE username ='$nama'");
    $cekFind = mysqli_num_rows($cekData);

    if(!$cekFind) {
        $addtotable = mysqli_query($connect, 
        "INSERT INTO users (username, pros, jk, harga) 
        values('$nama', '$pros', '$jk','$harga')");
        $message = "Status User $nama : $pros";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        // echo("Error description: " . $connect -> error);
        $message = "Silahkan Gunakan Username Yang Lain!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
};

    // update info barang
    if(isset($_POST['updatePros'])){
        $idb = $_POST['idb'];
        $pros = $_POST['pros'];
        $setPro = $_POST['updatePros'];
        $username = $_POST['username'];

        if ($pros == 'Menunggu' && $setPro == 'Kerjakan') {
            $updateData = mysqli_query($connect,
            "UPDATE users set pros = '$setPro' WHERE iduser = '$idb'");
          } else if ($pros == 'Kerjakan' && $setPro == 'Selesai') {
            $updateData = mysqli_query($connect,
            "UPDATE users set pros = '$setPro' WHERE iduser = '$idb'");
          } else {
            echo '<script>alert("Data Tidak Di Temukan!")</script>';
          }

        if($updateData){
            $message = "Status User $username : $setPro";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else{
            $message = "Terjadi Kesalahan Dalam Sistem!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }


?>