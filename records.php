<?php 

session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Doctors</title>
 	<link rel="stylesheet" type="text/css" href="style-record.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>
 	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="hospitals.php">Hospitals</a>
    </li>
     <li class="nav-item active">
      <a class="nav-link" href="records.php">Records</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="SampleAvatar/index.php">Check symptoms</a>
    </li>
  </ul>
</nav>
<div class="display" style="width: 100%;">
 	<h1 style="text-align: center; margin-top: 2%; padding-bottom: 5px; ">Patient Info</h1>

<div class="info">
  <!-- <table style="margin-left: 10px;">
    <tr>
      <td><b>Name:</b></td>
      <td style="padding-left: 10px;">Sachin  </td>
    </tr>
    <tr>
      <td><b>Email:</b></td>
      <td> </td>
    </tr>
    <tr>
      <td><b>Visit Date:</b></td>
      <td> </td>
    </tr>
    <tr>
      <td><b>Weight:</b></td>
      <td> </td>
    </tr>
    <tr>
      <td><b>Height:</b></td>
      <td> </td>
    </tr>
    <tr>
      <td><b>Body Temperature:</b></td>
      <td> </td>
    </tr>
    <tr>
      <td><b>Heart Rate:</b></td>
      <td> </td>
    </tr>
    <tr>
      <td><b>Notes:</b></td>
      <td> </td>
    </tr>
  </table> -->

<?php 


$query = "SELECT * FROM `visit`,patients WHERE patients.Email='".$_SESSION['email']."' AND patients.id = V_patient_id ";
// $query = "SELECT * FROM `visit`,patients WHERE patients.Email=" . $_SESSION['email'] . " AND patients.id = V_patient_id";
if ($res = mysqli_query($con,$query)) {
  if (mysqli_num_rows($res)!=0) { 


     while($rows = mysqli_fetch_assoc($res)){
    $name = $rows['Name'];
    $email = $rows['Email'] ; 
    $date =  $rows['app_date'];
    $height = $rows['height'] . ' cm';
    $weight = $rows['weight'] . ' lbs';
    $temp = $rows['body_temp'];
    $h_rate = $rows['heart_rate'] . 'bpm';
    $notes = $rows['notes'];

  }  
}
 
 else{

  $name = '';
    $email = ''; 
    $date =  '';
    $height = '';
    $weight = '';
    $temp = '';
    $h_rate = '';
    $notes = '';

}
}






   ?>
      <span><b>Name: </b><?php echo $name; ?></span><br>
  <span><b>Email: </b><?php echo $email; ?></span><br>
  <span><b>Visit Date: </b><?php echo $date; ?></span><br>
  <span><b>Height: </b><?php echo $height; ?></span><br>
  <span><b>Weight: </b><?php echo $weight; ?> </span><br>
  <span><b>Body Temperature: </b><?php echo $temp; ?></span><br>
  <span><b>Heart Rate: </b><?php echo $h_rate; ?> </span><br>
  <span><b>Notes: </b><?php echo $notes; ?></span>

</div>



 </div>

 </body>
 </html>