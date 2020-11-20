
<?php 
 ob_start();
session_start();
require_once 'db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}  



if ($_POST) {
   $name = $_POST['name'];
  $description = $_POST['description'];
   $age = $_POST['age'];
   $hobby = $_POST['hobby'];
   $location = $_POST['location'];
   $pet_image = $_POST[ 'pet_image'];

   $pet_id = $_POST['pet_id'];

   $sql = " UPDATE `pet` SET `name` = '$name',`description` = '$description',  `age` = '$age',`hobby` = '$hobby',`location` = '$location',`pet_image` = '$pet_image' WHERE pet_id = $pet_id " ;

   if($conn->query($sql) === TRUE) {
    echo "success <br><a href='../admin.php'>Back</a>";
  } else {
    echo "error";
  }
  $conn->close();

  
}

?>