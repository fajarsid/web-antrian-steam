<?php
require 'config.php';
require 'cek.php';



$username = $jk = $harga = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
  $username = trim($_POST["username"]);
  $jk = trim($_POST["jk"]);
  $harga = trim($_POST["harga"]);

    if($username && $jk && $harga){
        
      $sql = "INSERT INTO dbantrian set 
      username = '$_POST[username]',
      jk = '$_POST[jk]',
      harga = '$_POST[harga]'
      ";
       
       if($stmt = mysqli_prepare($connect, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_jk, $param_harga);
        
        $param_username = $username;
        $param_jk = $jk;
        $param_harga = $harga;
        
        if(mysqli_stmt_execute($stmt)){
          header('location: index.php');
        } else{
            echo "Gagal!";
        }

        mysqli_stmt_close($stmt);
    }
  } else {
    echo "<script>alert('Mohon, isi semua!');</script>";
  }
    
    mysqli_close($connect);
}


?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />

    <title>Document</title>
  </head>
  <body>
    <!-- Sidebar -->
    <nav>
      <ul class="nav">
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i>
          </a>
          <div class="animated slideInLeft">Home</div>
        </li>
        <li>
          <a href="index.php">
            <i class="fas fa-sort-amount-down"></i>
          </a>
          <div class="animated slideInLeft">Antrian</div>
        </li>
        <li>
          <a href="datausers.php">
            <i class="fa fa-user"></i>
          </a>
          <div class="animated slideInLeft">Data Pelanggan</div>
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

    <!-- Progress Bar -->
    <div class="progress-bar-wrapper"></div>
    <!-- Akhir Progress Bar -->

    <!-- Tabels -->
    <div class="container">
      <div>
        <button class="btn btn-tambah" onclick="openForm()">Tambah</button>
      </div>
      <table class="tabel-antrian">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kendaraan</th>
            <th>Harga</th>
            <th colspan="2">Status</th>
          </tr>
        </thead>
        <tbody>

          <tr class="active-row">
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-proses">Kerjakan</button>
              <button type="button" class="btn btn-selesai">Selesai</button>
              <button type="button" class="btn btn-red">Delete</button>
            </td>
          </tr>
          <tr class="active-row">
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-proses">Kerjakan</button>
              <button type="button" class="btn btn-selesai">Selesai</button>
              <button type="button" class="btn btn-red">Delete</button>
            </td>
          </tr>
          <tr class="active-row">
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-proses">Kerjakan</button>
              <button type="button" class="btn btn-selesai">Selesai</button>
              <button type="button" class="btn btn-red">Delete</button>
            </td>
          </tr>
          <tr class="active-row">
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-proses">Kerjakan</button>
              <button type="button" class="btn btn-selesai">Selesai</button>
              <button type="button" class="btn btn-red">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Form -->
    <div class="form-popup" id="myForm" >
      <form class="form-tambah" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Tambah Pelanggan</h3>

        <label for="nama"><b>Username</b></label>
        <input type="text" placeholder="Masukan Nama" name="username" required />

        <label for="jk"><b>Jenis Kendaraan</b></label>
        <input type="text" placeholder="Jenis Kendaraan" name="jk" required />

        <label for="harga"><b>Harga</b></label>
        <input type="number" placeholder="Harga" name="harga" required />

        <button type="submit" class="btn" name="tambahuser">Simpan</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Tutup</button>
      </form>
    </div>


    <!-- form pengajuan -->
    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>
    <!-- Js ProgresBar  -->
    <script src="js/progress-bar.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
