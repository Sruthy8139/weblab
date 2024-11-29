<html lang="en">
	<head>
	<title>Registration</title>
	</head>
	
	<body>
		<h2>REGISTRATION</h2>
		<form name="form" action="#" method="POST">
		<table>
		<tr>
			<th>Name</th>
			<td><input type="text" name="fname"> </td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email"> </td>
		</tr>
		<tr>
			<th>Mob NO </th>
			<td><input type="tel" name="mob"> </td>
		</tr>
		<tr>
			<th>Username </th>
			<td><input type="text" name="user"> </td>
		</tr>
		<tr>
			<th>Password </th>
			<td><input type="password" name="password"> </td>
		</tr>
		<tr class="center">
			<th colspan="2"><input type="submit" value="submit" name="submit"></th>
		</tr>
		</table>
		</form>
<?php
	$con = mysqli_connect("localhost","root","","form");
	if(isset($_POST['submit']))
	{
		$name = $_POST['fname'];
		$email = $_POST['email'];
		$mobile = $_POST['mob'];
		$user = $_POST['user'];
		$password = $_POST['password'];
	if($_POST['fname'] == ""){
		echo "<script>alert('Enter First Name !!')</script>";
		}
	else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
		echo "<script>alert('Enter Your Name !!')</script>";
		}
	else if($_POST['email'] == ""){
		echo "<script>alert('Enter Email !!')</script>";
		}
	else if(!preg_match('/^[0-9]{10}+$/', $_POST['mob'])){
		echo "<script>alert('Enter Valid Mobile Number !!')</script>";
		}
	else if($_POST['user'] == ""){
		echo "<script>alert('Enter User Name !!')</script>";
		}
	else if($_POST['password'] == ""){
		echo "<script>alert('Enter Password !!')</script>";
		}
	else if (strlen($_POST["password"]) < 8) {
		echo "<script>alert('Your Password Must Contain At Least 8 Characters!')</script>";
		}
	else if(!preg_match("#[0-9]+#",$password)) {
		echo "<script>alert('Your Password Must Contain At Least 1 Number!')</script>";
		}
	else if(!preg_match("#[A-Z]+#",$password)) {
		echo "<script>alert('Your Password Must Contain At Least 1 Capital Letter!')</script>";
		}
	else if(!preg_match("#[a-z]+#",$password)) {
		echo "<script>alert('Your Password Must Contain At Least 1 Lowercase
		Letter!')</script>";
		}
	else{
		$query = "insert into collection values('$name','$email','$mobile','$user','$password')";
		if(mysqli_query($con,$query)){
			echo "success";
			}
		else{
			echo "error".$query.mysqli_error($con);
			}	
		}
	}
?>
	</body>
</html>
