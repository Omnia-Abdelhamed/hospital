<?php
    include 'head.php';
    include 'header.php';
    if (isset($_GET['id'])) {
      $id=$_GET['id'];
    }else{
      $id=0;
    }

    $sql="SELECT * FROM news WHERE news_id = '$id'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);
    
?>




<!-- contact head starts here -->
<div class="contacthead">
	<div class="container">
		<div class="row">
			<h1><?php echo $row['title']; ?></h1>
		</div>
	</div>
</div>
<!-- contact head ends here -->


<!-- inner news starts here -->
<div class="innernews">
  <div class="container">
    <div class="row">
      <div class="innerfree col-lg-2 col-md-2 col-sm-0 col-xs-0"></div>
      <div class="innerconts col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="innercontsimg col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img src="upload/images/<?php echo $row['image']; ?>" alt="<?php echo $value['image']; ?>" class="img-responsive">
        </div>
        <div class="innercontscontent col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <p><?php echo $row['body']; ?></p>
        </div>
      </div>
      <div class="innerfree col-lg-2 col-md-2 col-sm-0 col-xs-0"></div>
    </div>
  </div>
</div>
<!-- inner news ends here -->









<div class="clearfix"></div>

<?php
  include 'footer.php';
?>