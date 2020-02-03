<?php 

session_start();
header('location:login.php');

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['password'];

$s = "SELECT * FROM patients WHERE Email = '$email'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
	echo "Username already taken";
}
else{
	$reg = "INSERT INTO patients(Name, Email, Password) values ('$name', '$email', '$pass')";
	mysqli_query($con, $reg);
		header('location:home.php');

}


 ?>