<?php
include 'connect.php';
if(isset($_POST['dep_id'])){
    $dep_id=$_POST['dep_id'];
	$sql_doctors="SELECT * FROM doctors WHERE dep_id='$dep_id'";
	//echo $sql_doctors;
	$result_doctors=mysqli_query($connect,$sql_doctors);
	$count=mysqli_num_rows($result_doctors);
	if($count>0){
		//echo $count;
		while($row=mysqli_fetch_assoc($result_doctors)){
			echo '<option value="'.$row['doctor_id'].'">'.$row['name'].'</option>';
		}
	}else{
		echo "<option value='0'>اختر....</option>";
	}
	
	//echo '<option value="'.$dep_id.'">'.$dep_id.'</option>';
}