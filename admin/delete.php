<?php
include 'init.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=0;
}
$sql="DELETE FROM `doctors` WHERE doctor_id=$id";
//echo $sql;die();
$result=mysqli_query($connect,$sql);
if($result){
	header("location: doctor.php");
	exit();
}