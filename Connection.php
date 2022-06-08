<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "elearning";

//Three ways to establish Connection
// 1 MySQLi (object-oriented) 
// 2 MySQLi (procedural)
// 3 PDO

//1------------- MySQLi (object-oriented) ********************

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Or Create connection
//$conn = new mysqli("localhost","root","","elearning");

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
/*

// 2 ------------ MySQLi (procedural)*****************

// Create connection

$conn1 = mysqli_connect($servername, $username, $password, $database);

// Or Create connection
$conn1 = mysqli_connect("localhost","root","","elearning");

// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

  
// 3-------------- PDO ********************

try {
    $conn2 = new PDO("mysql:host=$servername;dbname=elearning", $username, $password);
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

// Closing Connection
//1------------- MySQLi (object-oriented) ********************
// $conn->close();
// 2 ------------ MySQLi (procedural)*****************
// mysqli_close($conn1);
// 3-------------- PDO ********************
// $conn2 = null;
*/
?>