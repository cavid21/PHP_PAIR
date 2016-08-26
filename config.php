<?php 

$host = "localhost";
$name = "root";
$password = "";
$db = "slider";

$conn = mysqli_connect($host,$name,$password,$db);

if (!$conn) {
	echo "eror";
}

?>