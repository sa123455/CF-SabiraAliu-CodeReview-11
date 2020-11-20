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
   $pet_id = $_POST['pet_id'];

$sql = "DELETE FROM pet WHERE pet_id ={$pet_id}";
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>";
       echo "<a href='../admin.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>