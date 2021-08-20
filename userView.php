<?php
require 'config.php';
$page = $_SERVER['PHP_SELF'];
$sec = "5";

if(isset($_SESSION['usr'])){

} else{
    header('location:login.php');
}

//class object
class antrian {
 
  // property class
  var $id;
  var $pros;
  var $user;
  var $jk;
  var $harga;

}

// buat objek dari class
$antri = new antrian();

$username = $_SESSION['usr'];
$dataUser = mysqli_query($connect, "SELECT * FROM users where username ='$username'");
$row = mysqli_fetch_row($dataUser);

// set property
$antri->id=$row[0];
$antri->pros=$row[1];
$antri->user=$row[2];
$antri->jk=$row[3];
$antri->harga=$row[4];

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
    <!-- pemanggilan property -->
    <h4>Selamat Datang <?php echo $antri->user?></h4>
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
          <!-- pemanggilan property -->
          <?php 
           echo "<tr>";
           echo "<td>$antri->user</td>";
           echo "<td>$antri->jk</td>";
           echo "<td>$antri->harga</td>";
           echo "<td>";
           echo "<button class=button button1>$antri->pros</button>";
           echo "</td>";
           echo "</tr>"
          ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
