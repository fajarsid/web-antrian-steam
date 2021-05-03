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
              <button type="button" class="btn btn-selesai">Selesai</button>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-proses">Proses</button>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-red">Menunggu</button>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Nama Lengkap</td>
            <td>Mobil</td>
            <td>60.000</td>
            <td>
              <button type="button" class="btn btn-red">Menunggu</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Js ProgresBar  -->
    <script src="js/progress-bar.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
