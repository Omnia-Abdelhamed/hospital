<?php
	include 'init.php';
	if(isset($_POST['addServices'])){
		$ser=$_POST['addServices'];
		$SID = $_POST['SID'];
		if(!empty($ser)){	            
				$sql="INSERT INTO `dep_services`( `body`,`dep_id`) VALUES ('$ser','$SID')";
				$result=mysqli_query($connect,$sql);
				if($result)
				{	
					header("location: department.php");
				}
			
		}
	}

?>
<?php $serID = $_GET['id']; ?>
<h1 class="text-center">Add New department</h1>
			<div class="container">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Add Services
						</label>
						<div class="col-sm-10 col-md-4">
							<textarea class="form-control" name="addServices" 
							 required="required"></textarea>
						</div>
						<input type="text" name="SID" value="<?php echo $serID; ?>" hidden>
					</div>	
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input class="btn btn-primary btn-lg" type="submit" name="add" 
							value="Save">
						</div>
					</div>
				</form>
			</div>
