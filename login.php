<?php
    require 'config.php';
    

    // cek login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mencocokan database ada atau engga
        $cekdatabase = $username == 'admin' ? mysqli_query($connect, "SELECT * FROM admin where username ='$username' and password='$password'") : mysqli_query($connect, "SELECT * FROM users where username ='$username'");
        // hitung jumlah data
        $hitung = mysqli_num_rows($cekdatabase);

        if($hitung > 0){
            if($username == 'admin') {
              $_SESSION['log'] = $username;
              header('location:index.php');
            } else {
              $_SESSION['usr'] = $username;
              header('location:userView.php');
            }
        } else {
            header('location:login.php');
        }
    }


if(!isset($_SESSION['log'])){

} else{
    header('location:index.php');
}

if(!isset($_SESSION['usr'])){

} else{
    header('location:userView.php');
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
</head>

<body>
    <div class="container-login">
        <p class="tip">Website Antrian Steam</p>
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Selamat Datang</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form class="login" method="post">
                        <div class="field">
                            <input type="text" placeholder="Username" name="username" />
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Konfirmasi Username" name="password" />
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Start" name="login" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>