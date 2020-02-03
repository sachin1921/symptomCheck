<?php 

session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'meddocs');

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Hospitals</title>
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
    <li class="nav-item active">
      <a class="nav-link" href="#">Hospitals</a>
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
 	<h1 style="text-align: center; margin-top: 2%; padding-bottom: 5px; ">Hospitals</h1>


<?php 

$query = "SELECT DISTINCT Hospital_addr FROM hospital";
if ($res = mysqli_query($con,$query)) {
	$options = '';
	while($rows = mysqli_fetch_assoc($res)){
		$options.= "<option value='".$rows['Hospital_addr']."'>".$rows['Hospital_addr']."</option>"; 
	}
}

 ?>

<form action="#" method="post" >

	<select name="location" onchange='this.form.submit()'>
		<option value="0">Filter by locaiton </option>
		<?php echo $options; ?>
	
	</select>
	<div class="cards">


 	<?php 
		if(isset($_POST["location"])){
			$selection = $_POST["location"];
			$s = "SELECT * FROM hospital WHERE Hospital_addr = '".$selection."'";}
		else{$s = "SELECT * FROM hospital";}
		// if($selection == null){$s = "SELECT * FROM hospital";}
		// else{ $s = "SELECT * FROM hospital WHERE Hospital_addr = '".$selection."'";}

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
		    <h3>' . $row["Hospital_name"] . '</h3>
		      <div class="card-description">' . $row["Hospital_addr"] . '         </div>
		    </div>
		     <div class="card-actions">
          <button type="button" class="btn btn-secondary" onClick="deleteme(' . $row["Hospital_id"] . ')" name="Hospital">Select Hospital</button>

        </div>
		  </div>

		        ';

    		}
    /* free result set */
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
window.location.href='doctors.php?hospital_id=' +delid+'';
return true;

} 
</script>



</div>

 </form>

</div>


 </div>

 </body>
 </html>