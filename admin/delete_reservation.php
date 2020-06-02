<?php
include 'init.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=0;
}
$sql="DELETE FROM `reservation` WHERE reserve_id=$id";
//echo $sql;die();
$result=mysqli_query($connect,$sql);
if($result){
	header("location: reservation.php");
	exit();
}