<?php
include 'connect.php';
$name=$_POST['form_name'];
$dep_id=$_POST['select_department'];
$doctor_id=$_POST['select_doctor'];
$date=$_POST['the_date'];
$phone=$_POST['phone'];
$the_time=$_POST['the_time'];

$select_dep="SELECT * FROM departments WHERE dep_id='$dep_id'";
$result_dep=mysqli_query($connect,$select_dep);
$dep_row=mysqli_fetch_assoc($result_dep);
$department=$dep_row['name'];

$select_doctor="SELECT * FROM doctors WHERE doctor_id='$doctor_id'";
$result_doctor=mysqli_query($connect,$select_doctor);
$doctor_row=mysqli_fetch_assoc($result_doctor);
$doctor=$doctor_row['name'];

$select_time="SELECT * FROM the_time WHERE time_id='$the_time'";
$result_time=mysqli_query($connect,$select_time);
$time_row=mysqli_fetch_assoc($result_time);
$time=$time_row['title'];

if (!empty($name) & !empty($phone) & $doctor_id != 0 & $date != 0 & $the_time != 0) {
	$reserve_sql="INSERT INTO reservation(name,phone,the_date,the_time,doctor_id) VALUES ('$name','$phone','$date','$the_time','$doctor_id')";
	//echo $reserve_sql;die();
	$reserve_result=mysqli_query($connect,$reserve_sql);
	if ($reserve_result) {
		echo '<div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12" style="    background-color:#00bcd4;border-radius: 20px;padding: 31px;padding-right: 45px;    margin-top: 25px;">
            <label style="color:#4a3c3c">اسم المريض /  </label><label style="color:#fff;margin-right: 10px;"> '.$name.'</label><br>
            <label style="color:#4a3c3c">القسم  / </label><label style="color:#fff;margin-right: 10px;"> '.$department.'</label><br>
            <label style="color:#4a3c3c">الدكتور / </label><label style="color:#fff;margin-right: 10px;"> '.$doctor.'</label><br>
            <label style="color:#4a3c3c">التاريخ  / </label><label style="color:#fff;margin-right: 10px;"> '.$date.'</label>
            <label style="color:#4a3c3c;margin-right: 48px">الوقت   / </label><label style="color:#fff;margin-right: 10px;"> '.$time.'</label>
          </div>';
	}
}
