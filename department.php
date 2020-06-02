<?php
  include 'head.php';
  include 'header.php';

  if (isset($_GET['id'])) {
    $dep_id=$_GET['id'];
  }else{
    $dep_id=0;
  }

  $department_sql="SELECT * FROM departments WHERE dep_id='$dep_id'";
  $department_result=mysqli_query($connect,$department_sql);
  $department_row=mysqli_fetch_assoc($department_result);


  $doctors_sql = "SELECT * FROM  doctors WHERE dep_id='$dep_id'";
  $doctors_result = mysqli_query($connect , $doctors_sql);
  $doctors_data = array();
  while($doctors_row = mysqli_fetch_assoc($doctors_result)){
    $doctors_data [] = $doctors_row;
  }

  $dep_service_sql = "SELECT * FROM  dep_services WHERE dep_id='$dep_id'";
  $dep_service_result = mysqli_query($connect , $dep_service_sql);
  $dep_service_data = array();
  while($dep_service_row = mysqli_fetch_assoc($dep_service_result)){
    $dep_service_data [] = $dep_service_row;
  }
?>






<!-- departmenthead starts here -->
<div class="departmenthead">
	<div class="container">
		<div class="row">
			<h1><?php echo $department_row['name']; ?></h1>
		</div>
	</div>
</div>
<!-- departmenthead ends here -->


<!-- department content starts here -->
<div class="department">
  <div class="container">
    <div class="row">

      <div class="departmentconts col-lg-8 col-md-8 col-sm-12">
        <p></p>
        <h4><?php echo $department_row['body']; ?></h4>
        <ul>
<?php foreach ($dep_service_data as $key => $value) { ?>
          <li><?php echo $value['body'] ?></li>
<?php } ?>      
        </ul>
      </div>

      <div class="departmentside col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h2>  الاقسام الاخرى</h2>
        <ul>
        <?php foreach ($dept_data as $key => $value) { ?>
          <a href="department.php?id=<?php echo $value['dep_id'] ?>"><li><?php echo $value['name'] ?></li></a>
        <?php } ?>
        </ul>
      </div>

    </div>
  </div>
</div>
<!-- department content ends here -->



<div class="clearfix"></div>

<!-- department doctors starts here -->
<div class="doctors">
  <div class="container">
    <div class="row">

      <div class="doctorsHead col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1>دكاترة القسم</h1>
      </div>
<?php foreach ($doctors_data as $key => $value) { ?>
      <div class="doctorBlock col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="doctorBlockimg col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img src="upload/images/<?php echo $value['image'] ?>" alt="" class="img-responsive">
        </div>
        <div class="doctorBlockbody col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5><?php echo $value['name'] ?></h5>
          <span><?php echo $value['position'] ?></span>
          <p><?php echo $value['body'] ?></p>
        </div>
      </div>
<?php } ?>

    </div>
  </div>
</div>
<!-- department doctors ends here -->

<?php
  include 'footer.php';
?>