<?php
//Connection for database
session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');
//Select Database
$sql = "SELECT * FROM doctor WHERE Doc_id='".$_GET['doc_id']."'";
$result = $con->query($sql);
// echo $_GET['doc_id'];


?>


<!doctype html>
<html>
<head>
    <title>Appointment</title>
  <link rel="stylesheet" type="text/css" href="style_app.css">
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
     <li class="nav-item ">
      <a class="nav-link" href="records.php">Records</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="SampleAvatar/index.php">Check symptoms</a>
    </li>
  </ul>
</nav>
<div class="display" style="width: 100%;">
  <h1 style="text-align: center; margin-top: 2%; padding-bottom: 5px; ">Available times</h1>
<table border="1" align="center" style="line-height:25px;">
<thead>
            <tr>
              <th>Date</th>
              <th>Times</th>
              <th></th>
            </tr>
          </thead>
<?php
//Fetch Data form database
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
$date =  $row['app_date'];
$time = $row['app_time'];
$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
?>
<tr>
<td><?php echo $row['app_date']; ?></td>
<td><?php echo $row['app_time']; ?></td>
<!-- Delete Buttion -->
<td><input type="button" onClick="deleteme(<?php echo $row['Doc_id']; ?>)" name="Delete" value="Book Appointment"></td>
</tr>
<!-- Javascript function for deleting data -->
<script language="javascript">
function deleteme(delid)
{
window.location.href='confirmation.php?del_id=' +delid+'';
return true;
} 
</script>
<?php
}
}
else
{
?>
<tr>
<th colspan="2">There's No data found!!!</th>
</tr>
<?php
}
?>
</table>
</body>
</html>