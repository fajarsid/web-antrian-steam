<?php
require 'config.php';

if(isset($_SESSION['log'])){

} else{
    header('location:login.php');
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
    <style>
      .button {
        background-color: #4CAF50; /* Green */
        border-radius: 4px;
        color: white;
        padding: 1px 2px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 1px;
        transition-duration: 0.4s;
        cursor: pointer;
      }
      .button1 {
        background-color: white; 
        color: black; 
        border: 2px solid #4CAF50;
      }

      .button1:hover {
        background-color: #4CAF50;
        color: white;
      }

            .button2 {
        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
      }

      .button2:hover {
        background-color: #008CBA;
        color: white;
      }
      .button3 {
        background-color: white; 
        color: black; 
        border: 2px solid #f44336;
      }

      .button3:hover {
        background-color: #f44336;
        color: white;
      }
      .disabled {
        opacity: 0.6;
        cursor: not-allowed;
      }
    </style>
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

        <?php
        $dataUser = mysqli_query($connect, "SELECT * FROM users");

        $i = 1;
        $hideK = '';
        $hideS = '';
        $sub1 = 'submit';
        $sub2 = 'submit';

        while($data = mysqli_fetch_array($dataUser)){
            $pros = $data['pros'];
            $username = $data['username'];
            $jk = $data['jk'];
            $harga = $data['harga'];
            $idb =$data['iduser'];

            if ($pros == "kerjakan") {
              $hideK = "disabled";
              $sub1 = "button";
            } else if ($pros == "selesai") {
              $hideK = "disabled";
              $hideS = "disabled";
              $sub1 = "button";
              $sub2 = "button";
            } else {
              $hideK = '';
              $hideS = '';
              $sub1 = 'submit';
              $sub2 = 'submit';
            }

        ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$username;?></td>
            <td><?=$jk;?></td>
            <td><?=$harga;?></td>
            <td>
            <form method="post">
            <input type="hidden" name="idb" value="<?=$idb;?>">
            <input type="hidden" name="pros" value="<?=$pros;?>">
            <input type="hidden" name="username" value="<?=$username;?>">
            <input type="hidden" name="jk" value="<?=$jk;?>">
            <input type="hidden" name="harga" value="<?=$harga;?>">
            <button class="button button2 <?php echo $hideK ?>" type="<?php echo $sub1 ?>" name="updatePros">Kerjakan</button>
            <button class="button button1 <?php echo $hideS ?>" type="<?php echo $sub2 ?>" name="updatePros">Selesai</button>
            <!-- <button class="button button3" type="button" >Delete</button> -->
            </form>
            </td>
        </tr>
          
        <?php
            };
        ?>
        </tbody>
      </table>
    </div>

    <!-- Form -->
    <div class="form-popup" id="myForm" >
      <form class="form-tambah" method="post">
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
