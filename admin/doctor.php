<?php
	include 'init.php';
	$data=array();
	$count=1;
	$sql="SELECT * FROM doctors";
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
<h1 class="text-center">Doctors</h1>
		<div class="container">
			<div class="table-responsive">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>المكانة</th>
						<th>القسم</th>
						<th>الصورة</th>
						<th>التحكم</th>
					</tr>
					<?php foreach($data as $key=>$value){
						$dep_id=$value['dep_id'];
						$select_dep="SELECT * FROM departments WHERE dep_id='$dep_id'";
						$dep_result=mysqli_query($connect,$select_dep);
						$dep_row=mysqli_fetch_assoc($dep_result);
					?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['position']; ?></td>
						<td><?php echo $dep_row['name'] ?></td>
						<td><img width="70px" height="70px" src="../upload/images/<?php echo $value['image']; ?>"></td>
						<td>
							<a href="edit.php?id=<?php echo $value['doctor_id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i>
								تعديل
							</a>
							<a href="delete.php?id=<?php echo $value['doctor_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
					
						</td>
					</tr>
					<?php $count++;} ?>
				</table>
			</div>
			<a href='add.php' class="btn btn-primary">
				<i class="fa fa-plus"> </i> دكتور جديد </a>