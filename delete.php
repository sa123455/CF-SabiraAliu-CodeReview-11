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

if ($_GET['pet_id']) {
   $pet_id = $_GET['pet_id'];

   $sql = "SELECT * FROM pet WHERE pet_id = {$pet_id}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete User</title>
</head>
<body>

<h3>Do you really want to delete this user?</h3>
<form action ="actions/a_delete.php" method="post">

   <input type="hidden" name= "pet_id" value="<?php echo $data['pet_id'] ?>" />
   <button type="submit">Yes, delete it!</button >
   <a href="admin.php"><button type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>