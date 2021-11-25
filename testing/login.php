<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Pgae</title>
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","lizhimu0627","Assignment");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location:list.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";}}else{
?>
<div class="form">
<h1>Login</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p><a href='registration.php'>Register</a></p>
</div>
<?php } ?>
</body>
</html>
