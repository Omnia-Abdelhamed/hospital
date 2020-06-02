<?php
	include 'init.php';
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else{
		$id=0;
	}
	$select_sql="SELECT * FROM departments WHERE dep_id=$id";
	$select_result=mysqli_query($connect,$select_sql);
	$row=mysqli_fetch_assoc($select_result);

	if(isset($_POST['Name'])){
		$Name=$_POST['Name'];
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
		
		if(!empty($Name) & !empty($Description)){
			if (!empty($image_name)) {
				if(in_array($image_extension, $allowed_extensions)){
					$image_name=rand(0,100000).'_'.$image_name;
	            	move_uploaded_file($image_temp, "..\upload\images\\".$image_name);
				}
			}

			$sql="UPDATE `departments` SET `name`='$Name',`body`='$Description',`image`='$image_name' WHERE dep_id=$id";
				
				$result=mysqli_query($connect,$sql);
			if($result){
				header("location: department.php");
			}
		}
	}

?>

<h1 class="text-center">Edit Department</h1>
			<div class="container">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Name</label>
						
						<div class="col-sm-10 col-md-4">
							<input class="form-control" type="text" name="Name" 
							 autocomplete="off" value="<?php echo $row['name']?>" required="required">
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Description</label>
						
						<div class="col-sm-10 col-md-4">
							<textarea class="form-control" name="Description" 
							 required="required"><?php echo $row['body']?></textarea>
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Image</label>
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
