<?php
    include 'head.php';
    include 'header.php';

    $gallery_data=array();
    $gallery_sql="SELECT * FROM gallery";
    $gallery_result=mysqli_query($connect,$gallery_sql);
    while ($gallery_row=mysqli_fetch_assoc($gallery_result)) {
      $gallery_data[]=$gallery_row;
    }

?>





<!-- gallery about starts here -->
<div class="abouthead">
	<div class="container">
		<div class="row">
			<h1>صورنا<h1>
		</div>
	</div>
</div>
<!-- gallery about ends here -->



<!-- our gallery here -->
<div class="ourgallery">
  <div class="container">
    <div class="row">
    <?php foreach ($gallery_data as $key => $value) { ?>
      <div class="ourimg col-lg-3 col-md-3 col-sm-6 col-xs-6">
        <img src="upload/images/<?php echo $value['image']; ?>" alt="<?php echo $value['image']; ?>" class="img-responsive">
      </div>
    <?php } ?>
    </div>
  </div>
</div>
<!-- our gallery ends here -->

<?php
  include 'footer.php';
?>