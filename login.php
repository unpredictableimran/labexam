<?php

$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="labfinal";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	
	
	
	
	if(isset($_POST['login_btn']))
	{
		session_start();
		
		
		
		
		$id = mysqli_real_escape_string($conn,$_POST['user_id']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		
		
		$result = mysqli_query($conn,"SELECT * FROM user WHERE Id =  '$id' AND Password = '$password'") 
				  or die("Failed to fetch the data".mysql_error());
		$row = mysqli_fetch_array($result);
		$_SESSION["id"]= $row['Id'];
		$_SESSION["password"]= $row['Password'];
		$_SESSION["name"]= $row['Name'];
		$_SESSION["user_type"]= $row['User_type'];
		
		if ($row['Id'] == $id && $row['Password'] == $password && $row['User_type'] == "Admin")
		{
			header("location: admin_home.php");
			
		}
		
		if ($row['Id'] == $id && $row['Password'] == $password && $row['User_type'] == "User")
		{
			header("location: user_home.php");
			
		}
		else 
		{
		
		echo "failed";
		}
		
	}
	
	

?>

<html>
<center>
<form method="Post" action="login.php">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<fieldset>
					<legend><h3>LOGIN</h3></legend>
					User Id<br/>
					<input type="text" name="user_id"><br/>                               
					Password<br/>
					<input type="password" name="password">
					<br /><hr/>
					<input type="submit" name= "login_btn" value="Login">
					<a href="registration.php">Register</a>
				</fieldset>
			</td>
		</tr>                                
	</table>
</form>
</center>
</html>