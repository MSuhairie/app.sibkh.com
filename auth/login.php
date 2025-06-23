<?php  
    session_start();

    if ($_SESSION) {

    echo "<script>
         alert('Anda Telah Login')
         window.location='../index.php'
         </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login SIBKH</title>
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="container">
  <div class="wrapper">
    <header>Login</header>
    <form action="proses_login.php" method="post">
      <div class="field email">
        <div class="input-area">
          <input type="text" placeholder="Username" name="username">
          <i class="icon fas fa-user"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" placeholder="Password" name="password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      <input type="submit" name="login" value="Login">
    </form>
    <!-- <div class="sign-txt">Not a member? <a href="#">Signup now</a></div> -->
  </div>
  </div>
  <!-- <script src="../assets/script.js"></script> -->
</body>
</html>
