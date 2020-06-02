<?php
	include 'init.php';
	$data=array();
	$count=1;
	$sql="SELECT * FROM reservation";
	$result=mysqli_query($connect,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$data[]=$row;
	}

?>

<style type="text/css">
	body{
		direction: rtl;
	}
</style>

<h1 class="text-center">الحجز</h1>
		<div class="container">
			<div class="table-responsive">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>التاريخ</th>
						<th>الوقت</th>
						<th>التليفون</th>
						<th>القسم</th>
						<th>الدكتور</th>
						<th>التحكم</th>
					</tr>
					<?php foreach($data as $key=>$value){
						$doctor_id=$value['doctor_id'];
						$select_doctor="SELECT * FROM doctors WHERE doctor_id='$doctor_id'";
						$result_doctor=mysqli_query($connect,$select_doctor);
						$doctor_row=mysqli_fetch_assoc($result_doctor);

						$dep_id=$doctor_row['dep_id'];
						$select_dep="SELECT * FROM departments WHERE dep_id='$dep_id'";
						$result_dep=mysqli_query($connect,$select_dep);
						$dep_row=mysqli_fetch_assoc($result_dep);

						$the_time=$value['the_time'];
						$select_time="SELECT * FROM the_time WHERE time_id='$the_time'";
						$result_time=mysqli_query($connect,$select_time);
						$time_row=mysqli_fetch_assoc($result_time);
					?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['the_date']; ?></td>
						<td><?php echo $time_row['title']; ?></td>
						<td><?php echo $value['phone']; ?></td>
						<td><?php echo $dep_row['name']; ?></td>
						<td><?php echo $doctor_row['name']; ?></td>
						<td>
							<a href="delete_reservation.php?id=<?php echo $value['reserve_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								Delete</a>
					
						</td>
					</tr>
					<?php $count++;} ?>
				</table>
			</div>
