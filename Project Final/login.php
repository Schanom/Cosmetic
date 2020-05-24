<?php
ob_start();
session_start();
require_once 'dbconnect.php';


// it will never let you open index(login) page if session is set
if ( isset($_SESSION['users' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }


 if (!$error) {
 
  $password = hash( 'sha256', $pass); 

  $res=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); 
 
  if($count == 1 && $row['pass']==$password ) {
   if($row['type'] == "admin"){
  $_SESSION['admin'] = $row['users_id'];
  header("Location: admin.php");
   } else {
    $_SESSION['users'] = $row['users_id'];
    header("Location: home.php");
   }
  } else {
   $errMSG = "<p id='wrong'>Incorrect Email or Password, Please try again...</p>" ;
  }
 
 }
 
}
$error = false;
if ( isset($_POST['btn-signup']) ) {
	$error = false; 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
 
  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $date = trim($_POST['date']);
 $date = strip_tags($date);
 $date = htmlspecialchars($date);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO users(`name`, email, pass, birth_date, `type`) VALUES('$name', '$email','$password', '$date', 'user')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
   unset($date);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html><html>
<head>
  <title>Login</title>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
</head>
​
<link rel="stylesheet" type="text/css" href="login.css">
​
</style></head>
<body>
<script type="text/javascript" src="login.js"></script>
        <div class="login">
            <div class="wrap">
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="terms">
				<h2>Nutzungsbedingungen</h2>
                    <p class="small">Letzte Änderung: April 15, 2020</p>
                    <h3>Willkommen bei</h3>
                    
                    <p>Für weitere Informationen .....</p>
                </div>
​

				<div class="recovery">
                    <h2>Passwort zurücksetzen</h2>
                    <p>Geben Sie entweder Ihre <strong>Email Adresse</strong> oder den <strong>Username</strong> des Account an und klicken Sie anschließend <strong>Senden</strong></p>
                    <p>Informationen zur Zurücksetzung des Passwort erhalten Sie via E-Mail.</p>
                    <form class="recovery-form" action="" method="post">
                        <input type="text" class="input" id="user_recover" placeholder="Enter Email or Username Here">
                        <input type="submit" class="button" value="Submit">
                    </form>
                    <p class="mssg">An email has been sent to you with further instructions.</p>
                </div>
​

                <div class="content">
       
                    <div id="slideshow">
                        <div class="one">
                            <h2><span>BEHANDLUNGEN</span></h2>
                            <p>lorem lorem lorem</p>
                        </div>
                        <div class="two">
                            <h2><span>PRODUKTE</span></h2>
                            <p>lorem lorem lorem</p>
                        </div>
                        <div class="three">
                            <h2><span>STUDIO</span></h2>
                            <p>lorem lorem lorem</p>
                        </div>
                        <div class="four">
                            <h2><span>ANGEBOTE</span></h2>
                            <p>lorem lorem lorem</p>
                        </div>
                    </div>
                </div>
             
                <div class="user other">
               
                    <div class="form-wrap ">
                     
					<div class="tabs">
                            <h3 id="header" class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Anmelden<span></a></h3>
                    		<h3 class="signup-tab"><a class="sign-up" href="#signup-tab-content"><span>Registrieren</span></a></h3>
                    	</div>
                     
                    	<div class="tabs-content">
                           
                    		<div id="login-tab-content" class="active">
                    			<form class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete= "off">
                    				<input  type="email" name="email"  class="input" id="email" autocomplete="off" placeholder="Email"  value='<?= $email; ?>'>
                              
                    				<input type="password" name="pass" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    				<input type="checkbox" class="checkbox" checked id="remember_me">
                    				<label for="remember_me">Email speichern</label>
                    				<input type="submit" name="btn-login" >
                    			</form>
                    			<div class="help-action">
                    				<p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="forgot" href="#">Passwort vergessen?</a></p>
                    			</div>
                                <div class="logo1">
                                    <img src="img/logo.svg" height="95">
                                </div>
                    		</div>
                           
                    		<div id="signup-tab-content">
                    			<form class="signup-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
								
									<input type="text" class="input" name="name"  autocomplete="off" placeholder="Name" value = "<?= $name ?>">
                    				<input type="email" class="input" name='email'  autocomplete="off" placeholder="Email" value='<?= $email; ?>'>
									<input type="date" name='date' value='<?= $date; ?>'>
                    				<input type="password" name="pass"  id='pass' class="input" autocomplete="off" placeholder="Password">
                    				<input type="submit" name="btn-signup" class="btn">
                    			</form>
                    			<div class="help-action">
                    				<p>Mit der Registrierung akzeptieren sie unsere</p>
                    				<p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="agree" href="#">Nutzungsbedingungen</a></p>
                    			</div>
                    		</div>
                    	</div>
                	</div>
                </div>
            </div>
        </div>
​
​

​




</body>
</html>

<?php ob_end_flush(); ?>







