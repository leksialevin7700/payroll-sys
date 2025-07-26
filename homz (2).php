<?php
session_start();

if (!isset($_SESSION['per_no'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home page</title>
    <link rel="stylesheet" href="nav-style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
    <style>
      body 
        {
          overflow-x: hidden; /* Prevent horizontal scrolling */
          background-color:#F3E5AB;
        }
    </style>
  <body>
  <div class="header">
        <?php include("header.php");?>
    </div>
    <div class="nav">
    <nav>
      <input type="checkbox" id="btn">
      <ul>
        <li><a href="homz.php">Home</a></li>
        <li><a href="persnl.php">PIS</a></li>
        
        <li>
          <label for="btn-1" class="show">Earnings +</label>
          <a href="earning.php">Earnings</a>
          <input type="checkbox" id="btn-1">
          <ul>
            <li><a href="ot.php">OT</a></li>
            <li><a href="inc.php">INC-PAY</a></li>
            <li><a href="tax.php">iT-TAX</a></li>
          </ul>
        </li>
        <li>
          <label for="btn-2" class="show">Govt-Detection +</label>
          <a href="gov.php">Govt-Detection</a>
        <li><a href="pvt.php">Private-Detection</a></li>
        <li><a href="tax.php">iT</a></li>
        <li><a href="index.php">Logout</a></li>
      </ul>
    </nav>
    </div>
    <div class="content">
    
    <p><b>WELCOME TO HOME PAGE </b></p>
    </div>
    <script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
      <script src="scroll.js">
    </script>
  </body>
  <div class="footer">
        <?php include("footer.php");?>
    </div>
</html>
