<?php
    include 'head.php';
    include 'header.php';
    
?>



<!-- gallery about starts here -->
<div class="abouthead">
	<div class="container">
		<div class="row">
			<h1>أخبارنا<h1>
		</div>
	</div>
</div>
<!-- gallery about ends here -->

<!-- all news starts here -->
<div class="news">
  <div class="container">
    <div class="row">
<!-- start looping -->
<?php foreach ($news_data as $key => $value) { ?>
      <div class="newsBlock col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="newsBlockimg col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img src="upload/images/<?php echo $value['image']; ?>" alt="<?php echo $value['image']; ?>" class="img-responsive">
        </div>
        <div class="newsBlockcont col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3><?php echo $value['title']; ?></h3>
          <p><?php echo $value['body']; ?></p>
          <a href="innernews.php?id=<?php echo $value['news_id']; ?>">إقرأ المزيد</a>
        </div>
      </div>
<?php } ?>
<!-- end looping -->
    </div>
  </div>
</div>
<!-- all news ends here -->













<div class="clearfix"></div>


<?php
  include 'footer.php';
?>