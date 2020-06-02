<?php
	include 'init.php';
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$position=$_POST['position'];
		$Description=$_POST['Description'];
		$department=$_POST['department'];
		$image = $_FILES['image'];
        
        $image_name=$image['name'];
        $image_type=$image['type'];
        $image_temp=$image['tmp_name'];
        $image_size=$image['size'];
        $allowed_extensions=array("jpeg","jpg","png");
        $image_extension=explode('.', $image_name);
        $image_extension=strtolower(end($image_extension));

		if(!empty($name) & !empty($department) & !empty($position) & !empty($image_name)){
			if(in_array($image_extension, $allowed_extensions)){
				$image_name=rand(0,100000).'_'.$image_name;
	            move_uploaded_file($image_temp, "..\upload\images\\".$image_name);
			}
			$sql="INSERT INTO doctors(name,position,dep_id,body,image) VALUES('$name','$position','$department','$Description','$image_name')";
			//echo $sql;die();
			$result=mysqli_query($connect,$sql);
			if($result)
			{	
				header("location: doctor.php");
			}
		}
	}

?>

<h1 class="text-center">Add New Doctor</h1>
			<div class="container">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Name
						</label>
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="text" name="name" 
							 autocomplete="off" required="required">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">position</label>
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="text" name="position" 
							 required="required">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">description</label>
						<div class="col-sm-10 col-md-4">
							<textarea class="form-control" name="Description" 
							 ></textarea>
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Department
						</label>
						<div class="col-sm-10 col-md-4">
							<select name="department" class="form-control">
								<?php 
									$dep_select="SELECT * FROM departments";
									$dep_result=mysqli_query($connect,$dep_select);
									$dep_data=array();
									while($dep_row=mysqli_fetch_assoc($dep_result)){
										$dep_data[]=$dep_row;
									}
									
								 foreach ($dep_data as $key => $dep) { ?>
									<option value="<?php echo $dep['dep_id']; ?>"><?php echo $dep['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="file" name="image" 
							 required="required">
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
