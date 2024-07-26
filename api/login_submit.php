<?php
session_start();

require("../includes/database_connect.php");

$email=$_POST['email'];
$password=$_POST['password'];
$password = sha1($password);

$sql = "SELECT * FROM `users` WHERE email = '$email';";

$result=mysqli_query($conn,$sql);
if(!$result)
{
    echo "Invalid Credentials!" . "<br/>";
    exit;
}

$rows=mysqli_fetch_assoc($result);
if(!$rows)
{
    echo "error: " . mysqli_error($conn);
    exit;
}

$_SESSION["user_id"]=$rows['id'];
$_SESSION['name']=$rows['name'];
header("Location:../index.php");
?>

