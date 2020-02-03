<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
$con = mysqli_connect('localhost', 'root', '');


mysqli_select_db($con, 'meddocs');

$select = "DELETE from doctor where Doc_id=".$_GET['del_id'];
$query = mysqli_query($con, $select) or die($select);
$app = "UPDATE `patients` SET `app_date` ='".$_SESSION['date']."',`app_time` ='".$_SESSION['time']."' WHERE `Email` ='".$_SESSION['email']."'";
$query2 = mysqli_query($con, $app) or die($app);
if($query && $app){

  //echo "Registration successful";
  //echo $_SESSION['date'];
  //echo $_SESSION['time'];

  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Confirmation</title>
  <style>
    body {
  padding: 0;
  margin: 0;
  font-family: 'Open Sans', Arial, sans-serif;
}
* {
  box-sizing: border-box;
}
#container-wrapper {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}


section {
  flex: 1;
  display: flex;
  /*padding: 25px 50px;*/
  padding-left: 35%;
  padding-top: 6%;
  justify-content: center;
  text-align: center;
}
section div {
  max-width: 550px;
}
section p {
  font-size: 18px;
  line-height: 150%;
  color: #666;
  font-weight: 100;
  margin-top: 0;
  margin-bottom: 3.5rem;
}
section .display-1 {
  font-size: 3.5rem;
  margin-top: 3.5rem;
  margin-bottom: 0;
  font-weight: 100;
}

  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div id="container-wrapper">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="hospitals.php">Hospitals</a>
    </li>
     <li class="nav-item ">
      <a class="nav-link" href="records.php">Records</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="SampleAvatar/index.php">Check symptoms</a>
    </li>

  </ul>
</nav>    
<section>
      <div>
        <p class="display-1">
          Your appointment has been confirmed.
        </p>
        <p>
          See you soon.
        </p>
      </div>
    </section>
  
</div>

<?php 
// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACa06d91bea5553f457ee53cb40ab769e1';
$auth_token = 'b9f8338853e9302709ec4e8055197fcb';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+14242316792";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    $_SESSION['phone'],
    array(
        'from' => $twilio_number,
        'body' => "Hello, your appointment has been confirmed on " . $_SESSION['date'] . " at the time " . $_SESSION['time'] . "."
    )
);

} ?>

</body>
</html>