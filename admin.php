<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
	header("Location: home.php");
	exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


$resPet = mysqli_query($conn, "SELECT * FROM pet");

?>
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/1dd2006b34.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
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


<div><i class="fas fa-user"></i><p class="">Hi, Administrator</p> <?php echo $userRow['userEmail']; ?> </div>
           
           <a class="text-white"  href="logout.php?logout">Sign Out</a><br>
		   
		  
		   </div>
		   </div>
		   </div>
		   <a class="text-white weight-bold" href="create.php"><button class="btn btn-danger mt-2 ml-5">Add new Pet</button></a>

<?php
		   echo "<div class='container'>";
		  # echo "<a href='create.php'>CREATE NEW PET</a>";
		   echo "<div class='row'>";
		  
           if($resPet->num_rows == 0 ){
			echo "Sorry! There are no more dogs left for adoption <br>";
			echo "Please Try again later";

		}elseif($resPet->num_rows == 1){
			$row = $resPet->fetch_assoc();
			echo "<div class='col-4 text-secondary' mb-2>";
				echo"<div class='card'>
				<img src='$row[pet_image]' class='card-img-top-fluid' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$row[name]</h5>
    <p class='card-text'>Hi, my name is $row[name]. I am $row[age] old and my hobby is $row[hobby] $row[description]</p>
    <a href='update.php?pet_id=".$row["pet_id"]."'>Update</a><a href='delete.php?pet_id=".$row["pet_id"]."'>Delete</a><br>";
	
	echo"</div> </div> </div>";

			#echo "<img src='$row[car_image]'>"." ". $row["model"]. " ". $row["type"]." ".$row["color"]. " ".$row["available"]." <a href='booking.php?id=".$row["car_id"]."'>Booking Now</a><br>";
		}else {
			$rows = $resPet->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				
				echo "<div class='col-4 text-secondary mb-2'>";
				echo"<div class='card card-box'>
				<img src='$value[pet_image]' class='card-img-top' alt='...'>
  <div class='card-body'>
	<h5 class='card-title'>$value[name]</h5>
	<p class='card-text'>Hi, my name is $value[name]. I am $value[age] year old and my hobby is $value[hobby]</p>
	<p class='card-text'>I am $value[description]</p>
    <p class='card-text'>If you want to adopt me you can find me at this address<br> $value[location]<br>Cant wait to meet you.</p>
    <a href='update.php?pet_id=".$value["pet_id"]."'>Update     </a><a href='delete.php?pet_id=".$value["pet_id"]."'>Delete</a><br>";
	
	echo"</div> </div> </div>";
	
	
}
			
}
		echo "</div>";
		echo "</div>";
		

 		?>
		
       		

 
</body>
</html>
<?php ob_end_flush(); ?>