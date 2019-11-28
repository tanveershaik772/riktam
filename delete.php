<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$nm=$_GET['Name'];
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "student_details";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM `student` WHERE `Id`='$id'";
$result = $conn->query($sql);

header("Location:/demo/test.php");

}else{
echo 'Error...';}

$conn->close();
?>
