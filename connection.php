<?php
$servername = "localhost";
$username = "root";
$dbname ="tuitionsbd.com";
$password = "";
$conn = null;
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
?>
