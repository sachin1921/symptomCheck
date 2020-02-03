<?php 

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');

// $name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$s = "SELECT * FROM patients WHERE Email = '$email' && Password = '$pass'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
$row = $result->fetch_assoc();
$phone = $row['phone_num'];


if($num == 1){
	$_SESSION['email'] = $email;
	$_SESSION['phone'] = $phone;
	header('location:home.php');
}
else{
	header('location:login.php');
}


 ?>