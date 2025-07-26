<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registeration form</title>
  <style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url(0.jpg) no-repeat;
  background-size: cover;
  background-position: center;
}
.wrapper{
  width: 420px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, .3);
  backdrop-filter: blur(9px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
}
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;

  margin: 30px 0;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 40px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: #fff;
}
.input-box i{
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;

}
.wrapper .btn{
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}
  </style>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form method="post">
      <h1>Register</h1>
      <div class="input-box">
        <input type="text" name="per_no" placeholder="per_no" required>
      </div>
      <div class="input-box">
        <input type="text" name="mail_id" placeholder="mail_id" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="input-box">
        <input type="password" name="confirm_pass" placeholder="confirmPassword" required>
      </div>
      <button type="submit" name="register" class="btn">Register</button>
    </form>
  </div>
</body>
</htm>
<?php
  include("configg.php");
  if(isset($_POST['register'])) {
    $per_no = $_POST['per_no'];
    $mail_id = $_POST['mail_id'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_pass'];
    if($username != '' && $mobileno != '' && $password != '' && $confirmpassword != '') {
      if($password == $confirmpassword) {
        $result = $conn->query("INSERT INTO per_info(per_no, mail_id, password, confirm_pass) VALUES('$per_no', '$mail_id', '$password', '$confirmpassword')");
        if($result) {
          echo "<script>
                  alert('Registered successfully');
                  window.location.href = 'index.php';
                </script>";
        } else {
          echo "<script>alert('Data could not be inserted');</script>";
        }
      } else {
        echo "<script>alert('Passwords did not match');</script>";
      }
    } else {
      echo "<script>alert('Fill every field');</script>";
    }
  }
  ?>
