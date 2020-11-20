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
   
   $res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['admin']);
   $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_GET['pet_id']) {//this is the name of the paremetar car_id
   $pet_id = $_GET['pet_id'];//$car_id is variable to store the value

   $sql = "SELECT * FROM pet WHERE pet_id = $pet_id" ;
   $result = mysqli_query($conn,$sql);

   $row = $result->fetch_assoc();//bcuz we know it is 1 row

   $conn->close(); 

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <title >Edit car</title>


</head>
<body>
<div class="container-fluid bg-secondary">
<div class="row">
<div class="col-6 mt-3 p-4 text-white ">


<div><i class="fas fa-user"></i><p class="">Hi, Administrator</p> <?php echo $userRow['userEmail']; ?> </div>
           
           <a class="text-white"  href="logout.php?logout">Sign Out</a><br>
		   
		  
		   </div>
		   </div>
		   </div>

<div class="container">
<div class="row">
<div class="col-6 mx-auto mt-5">

<fieldset>
   <legend>Update Pet</legend>

   <form action="actions/a_update.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>name</th>
               <td><input class="mb-2" type="text"  name="name" placeholder ="name" value="<?php echo $row['name'] ?>"  /></td>
           </tr>    
           <tr>
               <th>description</th>
               <td><input class="mb-2" type= "textarea" name="description"  placeholder="description" value ="<?php echo $row['description'] ?>" /></td >
           </tr>
           <tr>
               <th>age</th>
               <td><input class="mb-2" type ="text" name= "age" placeholder= "age" value= "<?php echo $row['age'] ?>" /></td>
           </tr>
           <tr>
               <th>hobby</th>
               <td><input class="mb-2" type ="text" name= "hobby" placeholder= "image" value= "<?php echo $row['hobby'] ?>" /></td>
           </tr>
           <tr>
               <th>location</th>
               <td><input class="mb-2" type ="text" name= "location" placeholder= "location" value= "<?php echo $row['location'] ?>" /></td>
           </tr>
           <tr>
               <th>image</th>
               <td><input class="mb-2" type ="text" name= "pet_image" placeholder= "image" value= "<?php echo $row['pet_image'] ?>" /></td>
           </tr>
           <tr>
           
               <input type= "hidden" name= "pet_id" value= "<?php echo $row['pet_id']?>" />
               <td><button class="btn btn-info mr-4 mt-2"  type= "submit">Save Changes</button></td>
               <td><a  href= "admin.php"><button class="btn btn-info mt-2"  type="button">Update more</button></a></td>
           </tr>
       </table>
   </form>

</fieldset>
</div>
</div>
</div>

</body>
</html>

<?php
}
?>
