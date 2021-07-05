<?php
require 'config.php';
$page = $_SERVER['PHP_SELF'];
$sec = "5";

if(isset($_SESSION['usr'])){

} else{
    header('location:login.php');
}

$username = $_SESSION['usr'];
$dataUser = mysqli_query($connect, "SELECT * FROM users where username ='$username'");
$antri = mysqli_fetch_array($dataUser);

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />
    <style>
    .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      cursor: pointer;
    }

    .button1 {
      background-color: white; 
      color: black; 
      border: 2px solid #008CBA;
    }
    </style>
    <title>Document</title>
  </head>
  <body>
    <!-- Sidebar -->
    <h4>Selamat Datang <?php echo $_SESSION['usr']?></h4>
    <nav>
      <ul class="nav">
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i>
          </a>
          <div class="animated slideInLeft">Home</div>
        </li>
        <li>
          <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i>
          </a>
          <div class="animated slideInLeft">Logout</div>
        </li>
      </ul>
    </nav>
    <!-- Akhir Sidebar -->


    <!-- Tabels -->
    <div class="container">
      <table class="tabel-antrian">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Jenis Kendaraan</th>
            <th>Harga</th>
            <td>Status</td>
          </tr>
        </thead>
        <tbody>

        <?php

        $dataUser = mysqli_query($connect, "SELECT * FROM users WHERE username ='$username'");

        $hide = '';
        while($data = mysqli_fetch_array($dataUser)){
            $pros = $data['pros'];
            $username = $data['username'];
            $jk = $data['jk'];
            $harga = $data['harga'];
            $idb =$data['iduser'];

        ?>
         <tr>
            <td><?=$username;?></td>
            <td><?=$jk;?></td>
            <td><?=$harga;?></td>
            <td>
            <button class="button button1" ><?=$pros;?></button>
            </td>
        </tr>
          
        <?php
            };
        ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
