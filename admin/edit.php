<?php
	include 'init.php';
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else{
		$id=0;
	}
	$select_sql="SELECT * FROM doctors WHERE doctor_id=$id";
	$select_result=mysqli_query($connect,$select_sql);
	$row=mysqli_fetch_assoc($select_result);
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$position=$_POST['position'];
		$department=$_POST['department'];
		$Description=$_POST['Description'];
		$image = $_FILES['Image'];
        
        $image_name=$image['name'];
        $image_type=$image['type'];
        $image_temp=$image['tmp_name'];
        $image_size=$image['size'];
        $allowed_extensions=array("jpeg","jpg","png");
        $image_extension=explode('.', $image_name);
        $image_extension=strtolower(end($image_extension));

        if (empty($image_name)) {
        	$image_name=$row['image'];
        }
		if(!empty($name) & !empty($position) & !empty($department)){
			if (!empty($image_name)) {
				if(in_array($image_extension, $allowed_extensions)){
					$image_name=rand(0,100000).'_'.$image_name;
	            	move_uploaded_file($image_temp, "..\upload\images\\".$image_name);
				}
			}


			$update_sql="UPDATE `doctors` SET `name`='$name',`dep_id`='$department',`position`='$position',`body`='$Description',`image`='$image_name' WHERE doctor_id=$id";
			$update_result=mysqli_query($connect,$update_sql);
			if($update_result){
				header("location: doctor.php");
			}
		}
	}

?>

<h1 class="text-center">تعديل</h1>
			<div class="container">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">الاسم
						</label>
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="text" name="name" 
							 autocomplete="off" value="<?php echo $row['name']?>" required="required">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">المكانة</label>
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="text" name="position" 
							 required="required" value="<?php echo $row['position']?>">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">الوصف</label>
						<div class="col-sm-10 col-md-4">
							<textarea class="form-control" name="Description" 
							 ><?php echo $row['body']?></textarea>
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">القسم
						</label>
						<div class="col-sm-10 col-md-4">
							<select name="department" class="form-control">
								<?php 
									$dep_id=$row['dep_id'];
									$dep_select="SELECT * FROM departments WHERE dep_id='$dep_id'";
									$dep_result=mysqli_query($connect,$dep_select);
									$dep_row=mysqli_fetch_assoc($dep_result);
									?>
									<option value="<?php echo $dep_row['dep_id']; ?>"><?php echo $dep_row['name']; ?></option>

									<?php 
									$alldep_select="SELECT * FROM departments WHERE dep_id !='$dep_id'";
									$alldep_result=mysqli_query($connect,$alldep_select);
									$alldep_data=array();
									while($alldep_row=mysqli_fetch_assoc($alldep_result)){
										$alldep_data[]=$alldep_row;
									}
									
								 foreach ($alldep_data as $key => $alldep) { ?>
									<option value="<?php echo $alldep['dep_id']; ?>"><?php echo $alldep['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">الصورة</label>
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="file" name="Image">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input class="btn btn-primary btn-lg" type="submit" name="add" 
							value="Save">
						</div>
					</div>
				</form>
			</div>
