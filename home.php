<?php 

session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Home Page</title>
 	<link rel="stylesheet" type="text/css" href="styles2.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
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
<div class="title">
 	<h1>MedDocs</h1>
 	<h2>Keep your medical records secure and accessible</h2>
 	  	<button type="button" class="btn btn-secondary" onclick="location.href='hospitals.php'">Explore Hospitals</button><br><br>

 	<?php 

		//Select Database
		$sql = "SELECT app_date FROM patients WHERE Email='".$_SESSION['email']."'";
		$result = $con->query($sql);

		if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row['app_date'] == null){}
			else{
			
 	?>
 	  	<button type="button" class="btn btn-secondary" onclick="location.href='cancel.php'">Cancel Appointment</button><br><br>

 	<?php 
			}


			}
			}
 	?>

 </div>

 </body>
 </html>