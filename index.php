<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $userEmail = trim($_POST['userEmail']);
 $userEmail = strip_tags($userEmail);
 $userEmail = htmlspecialchars($userEmail);

 $userPass = trim($_POST[ 'userPass']);
 $userPass = strip_tags($userPass);
 $userPass = htmlspecialchars($userPass);
 // prevent sql injections / clear user invalid inputs

 if(empty($userEmail)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($userEmail,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($userPass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $userPass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$userEmail'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 
  if( $count == 1 && $row['userPass' ]==$password ) {
    if($row["status"] == 'admin'){
      $_SESSION["admin"] = $row["user_id"];
      header("Location: admin.php");

    } else
    {
      $_SESSION['user'] = $row['user_id'];
      header("Location: home.php");
    } 
   
  } 
  
  else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style>
body {
   background: url("https://images.unsplash.com/photo-1534361960057-19889db9621e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");
  background-repeat: no-repeat;
  background-size: cover;
}
:placeholder-shown {
   opacity:0.5;
}

</style>
</head>

<body>
<div class="container-fluid">
<div class="row justify-content-center">
<h1 class="text-white font-italic mt-5">Adopt your best Friend for Live!</h1>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-4 ml-5 mt-5"> 
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
 
   <h2 class="text-white">Sign In.</h2 >
            
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
           
         
     <input  type="email" name="userEmail"  class="form-control mb-2" placeholder= "Your Email" value="<?php echo $userEmail; ?>"  maxlength="40" />
       
    <span class="text-danger"><?php  echo $emailError; ?></span >
 
    <input  type="password" name="userPass"  class="form-control mb-2" placeholder ="Your Password" maxlength="15"  />
    <span  class="text-danger"><?php  echo $passError; ?></span>
    <button  type="submit" name= "btn-login" class="btn btn-info">Sign In</button>
    <span> <a  href="register.php"><button type="button" class="btn btn-info text-danger">Sign Up</button></a></span>
 
 </form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>