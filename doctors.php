<?php 

session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');

 ?>


 <!DOCTYPE html>
 <html>
 <head>
  <title>Doctors</title>
  <link rel="stylesheet" type="text/css" href="styles3.css">
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
  <h1 style="text-align: center; margin-top: 2%; padding-bottom: 5px; ">Doctors</h1>


<!-- Cards -->


 

<?php 
$query = "SELECT DISTINCT Speciality FROM doctor";
if ($res = mysqli_query($con,$query)) {
  $options = '';
  while($rows = mysqli_fetch_assoc($res)){
    $options.= "<option value='".$rows['Speciality']."'>".$rows['Speciality']."</option>"; 
  }
}

?>
<form action="#" method="post" >

  <select name="location" onchange='this.form.submit()'>
    <option value="0">Filter by speciality </option>
    <?php echo $options; ?>
  
  </select>
  <div class="cards">

    <?php 

    if(isset( $_POST["location"])){
      $selection = $_POST["location"];
      $s = "SELECT * FROM doctor WHERE Speciality = '".$selection."' AND Hospital_id='".$_GET['hospital_id']."'";
    }
    else{$s = "SELECT * FROM doctor WHERE Hospital_id='".$_GET['hospital_id']."'";}


    if ($result = mysqli_query($con, $s)) {

      // fetch associative array 
        while ($row = mysqli_fetch_assoc($result)) {
        // echo $row["Hospital_name"];
    
          echo '
      <div class="card">
    <img class="card__image" src="https://source.unsplash.com/300x225/?wave" />
    <div class="card-title">
        <span class="left"></span>
        <span class="right"></span>
      </a>
      
    </div>
    <div class="card-flap flap1">
    <h3>' . $row["Doc_fname"] . " " . $row["Doc_lname"] . '</h3>
          <div class="card-description">' . $row["Speciality"] . '         </div>

       <div class="card-flap flap2">
        <div class="card-actions">
          <button type="button" class="btn btn-secondary" onClick="deleteme(' . $row["Doc_id"] . ')" name="appointment">Book appointment</button><br> 

       </div>
      </div>
    </div>
  </div>


            ';

        }
        mysqli_free_result($result);

    }

    else{
      echo "not readable";
    }



     ?>

 <script language="javascript">
function deleteme(delid)
{
  console.log("running");
window.location.href='appointment.php?doc_id=' +delid+'';
return true;

} 
</script>
    

</div>
  </form>




</div>


 </div>

 </body>
 </html>