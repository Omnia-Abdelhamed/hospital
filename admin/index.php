<?php 
	
	session_start();
	if(isset($_SESSION['username'])){
		header("location: reservation.php");
	}

	$noNavbar='';
	include 'init.php'; 

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$hashedpass=sha1($password);

		//select from database

		$sql="SELECT * FROM admin WHERE userName='$username' AND password='$hashedpass'";
		//echo $sql;die();
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_assoc($result);
		//print_r($row);die();
		$count=mysqli_num_rows($result);
		if($count>0){
			$_SESSION['username']=$username;
			$_SESSION['id']=$row['id'];
			header("location: reservation.php");
			exit();
		}
	}
?>

	<form class="login" method="post">
		<h4 class="text-center">ADMIN LOGIN</h4>
		<input class="form-control" type="text" name="username" 
		placeholder="Username" autocomplete="off">
		<input class="form-control" type="password" name="password" 
		placeholder="Password" autocomplete="new-password">
		<input class="btn btn-primary btn-block" type="submit" name="submit" value="Login">
	</form>