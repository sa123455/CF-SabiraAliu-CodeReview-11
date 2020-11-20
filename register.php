<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
include_once 'actions/db_connect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $userName = trim($_POST['userName']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $userName = strip_tags($userName);

  // strip_tags — strips HTML and PHP tags from a string

  $userName = htmlspecialchars($userName);
 // htmlspecialchars converts special characters to HTML entities

 $userEmail = trim($_POST[ 'userEmail']);
 $userEmail = strip_tags($userEmail);
 $userEmail = htmlspecialchars($userEmail);

 $userPass = trim($_POST['userPass']);
 $userPass = strip_tags($userPass);
 $userPass = htmlspecialchars($userPass);

  // basic name validation
 if (empty($userName)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($userName) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$userName)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($userEmail,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$userEmail'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($userPass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($userPass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $userPass);


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$userName','$userEmail','$password')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($userName);
    unset($userEmail);
   unset($userPass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Adopt a pet</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style>
body {
   background: url("https://images.unsplash.com/photo-1534361960057-19889db9621e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");
  background-repeat: no-repeat;
  background-size: cover;
}
:placeholder-shown {
   opacity:0.1;
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
<div class="col-4  mt-5 ml-5">
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
 
      <h2 class="text-white">Sign Up.</h2>
            
          <?php
   if ( isset($errMSG) ) {
 
   ?>
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php
  }
  ?>
         
      <input type ="text"  name="userName"  class ="form-control mb-2"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $userName ?>"  />
      <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
          <input   type = "email"   name = "userEmail"   class = "form-control mb-2"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $userEmail ?>"  />
    <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
     
          <input   type = "password"   name = "userPass"   class = "form-control mb-2"   placeholder = "Enter Password"   maxlength = "15"  />
            <span   class = "text-danger" > <?php   echo  $passError; ?> </span >
     
           <button   type = "submit"   class = "btn btn-block btn-info"   name = "btn-signup" >Sign Up</button >
         
            <a   href = "index.php" >Sign in Here...</a>
   
 
   </form >
   </div>
   </div>
   </div>
</body >
</html >
<?php  ob_end_flush(); ?>