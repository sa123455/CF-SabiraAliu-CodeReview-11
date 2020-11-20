<?php 
ob_start();
session_start();

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}


require_once 'db_connect.php';

if ($_POST) {
   $name = $_POST['name'];
   $description = $_POST['description'];
   $age = $_POST[ 'age'];
   $hobby = $_POST[ 'hobby'];
   $location = $_POST[ 'location'];
   $pet_image = $_POST['pet_image'];

   $sql = "INSERT INTO pet (name, description, age,hobby,location,pet_image) VALUES ('$name', '$description', '$age','$hobby','$location','$pet_image')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../admin.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>