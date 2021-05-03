<?php
    require 'config.php';
    

    // cek login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mencocokan database ada atau engga
        $cekdatabase = mysqli_query($connect, "SELECT * FROM admin where username ='$username' and password='$password'");

        // hitung jumlah data
        $hitung = mysqli_num_rows($cekdatabase);

        if($hitung > 0){
            $_SESSION['log'] = 'True';
            header('location:index.php');
        } else {
            header('location:login.php');
        }
    }


if(!isset($_SESSION['log'])){

} else{
    header('location:index.php');
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
    <p class="tip">Website Antrian Steam</p>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Form Admin</div>
        <div class="title user">Pelanggan</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked />
          <input type="radio" name="slide" id="user" />
          <label for="login" class="slide login">Admin</label>
          <label for="user" class="slide user">Pelanggan</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form class="login" method="post">
            <div class="field">
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" />
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login" name="login" />
            </div>
          </form>
          <form action="#" class="user">
            <div class="field">
              <input type="text" placeholder="Username" required />
            </div>
            <!-- <div class="field">
              <input type="password" placeholder="Password" required />
            </div> -->
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Cek" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const userBtn = document.querySelector("label.user");
      const userLink = document.querySelector("form .user-link a");
      userBtn.onclick = () => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      };
      loginBtn.onclick = () => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      };
      userLink.onclick = () => {
        userBtn.click();
        return false;
      };
    </script>
  </body>
</html>
