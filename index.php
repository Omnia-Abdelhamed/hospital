<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hospital</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Mada" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        <link href="awssem/css/font-awesome.css" rel="stylesheet" type="text/css" />

        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
        <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css" />

        <link href="awssem/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>

<?php 
  include 'header.php'; 
  $service_sql = "SELECT * FROM  hospital_services";
  $service_result = mysqli_query($connect , $service_sql);
  $service_data = array();
  while($service_row = mysqli_fetch_assoc($service_result))
  {
      $service_data [] = $service_row;
  }

?>

<!-- carousel starts here -->
<div class="slider">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <div class="item active">
      <img src="images/slider2.jpg" alt="header" class="img-responsive">
      <div class="carousel-caption">
        <h1>البسمة شعارنا الدائم
حتى نخفف عليكم المرض والمشقه نلقاكم بإبتسامة دائمة         </h1>
        <p>
</p>
<a href="contact.php"> <button id="btncar">أتصل بنا</button></a>
<a href="reserve.php">  <button id="btncar">إحجز الان</button></a>

      </div>
    </div>

    <div class="item">
      <img src="images/slider.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h1>حملنا الامانه والمنهج
وأخذنا على عاتقنا تحقيق الرؤية الملكية بالوصول لقطاع صحي متميز
</h1>
        <p>


        </p>
        <a href="contact.php"> <button id="btncar">أتصل بنا</button></a>
        <a href="reserve.php">  <button id="btncar">إحجز الان</button></a>

      </div>
    </div>


  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<!-- carousel ends here -->
<div class="clearfix"></div>

<div class="myreserve">
  <div class="reserveHead">
    <h3>
حرصت ادارة المستشفى على توفير جميع الأقسام والاختصاصات الفرعية</h3>
  </div>
</div>

        <!-- departments starts here -->
        <div class="departments">
          <div class="container">
            <div class="row">

              <div class="departHead">
                <h1>أقسامنا</h1>
              </div>
<?php 
    $dept_sql = "SELECT * FROM  departments LIMIT 6";
    $dept_result = mysqli_query($connect , $dept_sql);
    $dept_data = array();
    while($dept_row = mysqli_fetch_assoc($dept_result))
    {
        $dept_data [] = $dept_row;
    }


?>
              <div class="alldepartments col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!-- start looping -->
<?php foreach ($dept_data as $key => $value) { ?>
                <div class="departBlock col-lg-4 col-md-4 col-sm-6 col-xs-6">
                  <div class="departBlockimg col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="upload/images/<?php echo $value['image']; ?>" alt="<?php echo $value['image']; ?>" class="img-responsive">
                  </div>
                  <div class="departBlockconts col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3><?php echo $value['name']; ?></h3>
                    <p><?php echo $value['body']; ?></p>
                    <a href="department.php?id=<?php echo $value['dep_id'] ?>">إقرأ المزيد</a>
                  </div>
                </div>
<?php } ?>
<!-- end looping -->
            </div>
          </div>
        </div>
        <!-- departments ends here -->





        <!-- news starts here -->
        <div class="news">
          <div class="container">
            <div class="row">

              <div class="newhead">
                <h1>أخبارنا</h1>
                <!-- <p>عندما تاتي الينا يمكن الاستمتاع</p> -->
              </div>

              	<div class="owl-carousel owl-theme">
<?php foreach ($news_data as $key => $value) { ?>
                  <div class="newsblock">
                    <a href="innernews.php?id=<?php echo $value['news_id']; ?>"><img src="upload/images/<?php echo $value['image']; ?>" alt="<?php echo $value['image']; ?>" class="img-responsive"></a>
                    <h2><?php echo $value['title']; ?></h2>
                    <p><?php echo $value['body']; ?></p>
                  </div>

<?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- news ends here -->





        <!-- services starts here -->
        <div class="services">
          <div class="container">
            <div class="row">
              <div class="serhead">
                <h1>خدماتنا</h1>
                <p> عندما تاتي الينا يمكن الاستمتاع بخدماتنا على مدار الساعه</p>
              </div>

              <div class="allservices">
<?php foreach ($service_data as $key => $value) { ?>
                <div class="serviceBlock col-lg-4 col-md-4 col-sm-6">
                  <i class="fa fa-home"></i>
                  <h3><?php echo $value['title']; ?></h3>
                  <p><?php echo $value['body']; ?></p>
                </div>
<?php } ?>

              </div>
<div class="clearfix"></div>


            </div>
          </div>
        </div>
        <!-- services ends here -->


<div class="clearfix"></div>



<?php
  include 'footer.php';
?>