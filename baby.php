<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


$resSen = mysqli_query($conn, "SELECT * FROM pet WHERE age = 0 ");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
<style>
img {
	height:300px;
}
</style>
</head>
<body >
<div class="container-fluid bg-secondary">
<div class="row">
<div class="col-6 mt-3 p-4 text-white ">


           Hi <?php echo $userRow['userEmail' ]; ?>
		   <br>
           
           <a class="text-white"  href="logout.php?logout">Sign Out</a><br>
		   <a class="text-white weight-bold" href="home.php">HOME</a>
		   </div>
		   </div>
		   </div>
           <a class="text-white weight-bold" href="senior.php"><button class="btn btn-danger">Visit our Seniors here!</button></a>
		   


           <?php
		   echo "<div class='container'>";
		   echo "<div class='row mt-3'>";
           if($resSen->num_rows == 0 ){
			echo "Sorry! There are no more dogs left for adoption <br>";
			echo "Please Try again later";

		}elseif($resSen->num_rows == 1){
			$row = $resSen->fetch_assoc();
			echo "<div class='col-4'>";
				echo"<div class='card'>
				<img src='$row[pet_image]' class='card-img-top-fluid' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$row[name]</h5>
    <p class='card-text'>Hi, my name is $row[name]. I am $row[age] old and my hobby is $row[hobby] $row[description]</p>
";
	echo"</div> </div> </div>";

			
		}else {
			$rows = $resSen->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				
				echo "<div class='col-4'>";
				echo"<div class='card card-box'>
				<img src='$value[pet_image]' class='card-img-top' alt='...'>
  <div class='card-body'>
	<h5 class='card-title'>$value[name]</h5>
	<p class='card-text'>Hi, my name is $value[name]. I am $value[age] year old and my hobby is $value[hobby]</p>
	<p class='card-text'>I am $value[description]</p>
	<p class='card-text'>If you want to adopt me you can find me at this address<br> $value[location]<br>Cant wait to meet you.</p>";
	echo"</div> </div> </div>";
	
	

				
			}
			
		}
		echo "</div>";
		echo "</div>";
		

 		?>
		
       		

		
		   
</body>
</html>
<?php ob_end_flush(); ?>