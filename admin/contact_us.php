<?php
	include 'init.php';
	$data=array();
	$count=1;
	$sql="SELECT * FROM contact";
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

<h1 class="text-center">الرسائل</h1>
		<div class="container">
			<div class="table-responsive">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>الايميل</th>
						<th>التليفون</th>
						<th>الرسالة</th>
						<th>التحكم</th>
					</tr>
					<?php foreach($data as $key=>$value){?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['phone']; ?></td>
						<td><?php echo $value['message']; ?></td>
						
						<td>
							<a href="delete_contactus.php?id=<?php echo $value['id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
						</td>
					</tr>
					<?php $count++;} ?>
				</table>
			</div>
