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
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <title>Add Pet</title>

   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </style>

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

<fieldset >
   <legend>Add Pet</legend>

   <form action="actions/a_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th>
               <td><input  type="text" name="name"  placeholder="name" /></td >
           </tr>    
           <tr>
               <th>description</th>
               <td><input  type="text" name= "description" placeholder="description" /></td>
           </tr>
           <tr>
               <th>age</th>
               <td><input type="text"  name="age" placeholder ="age" /></td>
           </tr>
           <tr>
               <th>hobby</th>
               <td><input type="text"  name="hobby" placeholder ="hobby" /></td>
           </tr>
           <tr>
               <th>location</th>
               <td><input type="text"  name="location" placeholder ="location" /></td>
           </tr>
           <tr>
               <th>image</th>
               <td><input type="text"  name="pet_image" placeholder ="image" /></td>
           </tr>
           <tr>
               <td><button class="btn btn-info mr-4" type ="submit">Insert new Pet</button></td>
               <td><a href= "admin.php"><button class="btn btn-info"  type="button">Back</button></a></td>
           </tr >
       </table>
   </form>

</fieldset >

</body>
</html>