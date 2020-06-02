<?php
	include 'init.php';
	$data=array();
	$count=1;
	$sql="SELECT * FROM departments";
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

		<div class="container">
			<h1 class="text-center">الاقسام</h1>
			<div class="table-responsive">
				<form>
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>الصورة</th>
						<th>التحكم</th>
					</tr>
					<?php foreach($data as $key=>$value){?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><img width="70px" height="70px" src="../upload/images/<?php echo $value['image']; ?>"></td>
						<td>
							<a href="edit_department.php?id=<?php echo $value['dep_id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i>
								تعديل
							</a>
							<a href="delete_department.php?id=<?php echo $value['dep_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
							<a href="adServices.php?id=<?php echo $value['dep_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								اضافة خدمة</a>
					
						</td>
					</tr>
					<?php $count++;} ?>
				</table>
			</form>
				<div style="margin-bottom: 100px">
					<a href='add_department.php' class="btn btn-primary">
						<i class="fa fa-plus">  </i>&nbspقسم جديد</a>
				</div>
			</div>
			