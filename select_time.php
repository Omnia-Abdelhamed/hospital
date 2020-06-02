<?php
include 'connect.php';
if(isset($_POST['doctor_id'])){
    $doctor_id=$_POST['doctor_id'];
    $the_date=$_POST['the_date'];
    if ($doctor_id != 0) {
    	$time_sql="SELECT * FROM the_time";
    	$time_result=mysqli_query($connect,$time_sql);
    	$time_count=mysqli_num_rows($time_result);
    	if ($time_count>0) {
    		while($row=mysqli_fetch_assoc($time_result)){
    			$the_time=$row['time_id'];
    			$reserve_sql="SELECT * FROM reservation WHERE doctor_id='$doctor_id' AND the_date='$the_date' AND the_time='$the_time'";
    			$reserve_result=mysqli_query($connect,$reserve_sql);
    			$count=mysqli_num_rows($reserve_result);
    			if ($count<2) {
    				echo '<option value="'.$row['time_id'].'">'.$row['title'].'</option>';
    			}else{
    				echo '<option style="color:red" disabled="" value="'.$row['time_id'].'">'.$row['title'].' -- مكتمل</option>';
    			}
			}
    	}else{
		 	echo "<option value='0'>اختر....</option>";
		}
	}
//echo '<option value="'.$doctor_id.'">'.$doctor_id.$the_date.'</option>';
}