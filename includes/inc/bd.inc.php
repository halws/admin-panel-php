<?php 
try {
	$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="olios";
 $conn = new PDO("mysql:host=$host;dbname=$dbname","$user","");
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $conn->exec('SET NAMES "utf8"');
//$con->close();

} catch (PDOException $e) {
	echo("Error" . $e->getMessage());
}
 ?>