<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$servername="localhost";
$username="root";
$password="";
$dbname="pay_roll";
try {
$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
//set pdo error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo "connection success!";
} catch(PDOException $e){
echo "Connection failed:". $e->getMessage();
exit;
}
?>