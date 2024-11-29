<?php
session_start();
?>
<html>
	<head><title>login </title>
	</head>
	<body>
	<input type="button" value="sign up" onclick="window.location.href='signup.php';">
	<center>
	<form action="#" method="POST">
	<h1>LOGIN</h1>
		
			<label>USERNAME :</label>
			<input type="text" name="uname"><br><br>
		
			<label>PASSWORD : </label>
			<input type="password" name="passcode"><br><br>
			<input type="submit" name="login" value="login">
	
	</form>
	</center>
	</body>
</html>
<?php
require "connect.php";
if(isset($_POST['login'])){
$user = $_POST['uname'];
$password = $_POST['passcode'];
$login_query = "select * from collection where user='$user'and pass='$password'";
$login_result = mysqli_query($con,$login_query);
$login_values = mysqli_fetch_array($login_result);
if(!$login_result){
echo "login error";
}
$login_rows = mysqli_num_rows($login_result);
if($login_rows == 1){
$_SESSION['username'] = $login_vlaues[0];
header("location:home.php");
}
else{
echo "there is no user";
}
}
?>
