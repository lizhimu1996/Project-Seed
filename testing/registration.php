<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","lizhimu0627","Assignment");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);

$smtpserver = "li.ursse.org";
$smtpserverport = 25;
$smtpusermail = "lizhimu0627@li.ursse.org";
$smtpuser = "lizhimu0627@li.ursse.org";
$smtppass = "lizhimu0627";
$smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
$emailtype = "HTML";
$smtpemailto = $email;
$smtpemailfrom = $smtpusermail;
$emailsubject = "Registration Email Verification";
$emailbody = "Hi" . $username . "</br>Click Here to Comfirm Registration: <a>Comfirm</a>";
$rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
if ($rs ==1){
$msg = "Success";
        $query = "insert into `users` (username, password, email) values ('$username', '$password' , '$email')";
$result = mysqli_query($con,$query);
echo "<div class='form'>
<h3>you are registered now.</h3>
<br/><a href='login.php'>Login</a></div>";}
else{$msg = $rs;}
echo $msg;}
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
  <input type="text" name="username" placeholder="Username" required />
<input type="text" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php  ?>
</body>
</html>
