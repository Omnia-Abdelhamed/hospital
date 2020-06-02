<?php
    include 'connect.php';
    $dept_sql = "SELECT * FROM  departments";
    $dept_result = mysqli_query($connect , $dept_sql);
    $dept_data = array();
    while($dept_row = mysqli_fetch_assoc($dept_result))
    {
        $dept_data [] = $dept_row;
    }

    $news_sql = "SELECT * FROM  news Order by news_id desc";
    $news_result = mysqli_query($connect , $news_sql);
    $news_data = array();
    while($news_row = mysqli_fetch_assoc($news_result))
    {
        $news_data [] = $news_row;
    }

    $address_sql="SELECT * FROM settings WHERE title='address'";
    $address_result=mysqli_query($connect,$address_sql);
    $address_row=mysqli_fetch_assoc($address_result);
    $address=$address_row['content'];

    $email_sql="SELECT * FROM settings WHERE title='email'";
    $email_result=mysqli_query($connect,$email_sql);
    $email_row=mysqli_fetch_assoc($email_result);
    $email=$email_row['content'];

    $phone_sql="SELECT * FROM settings WHERE title='phone'";
    $phone_result=mysqli_query($connect,$phone_sql);
    $phone_row=mysqli_fetch_assoc($phone_result);
    $phone=$phone_row['content'];

?>

<div class="mymenu">
  <ul>
    <a href="index.php"><li>الرئيسيه</li></a>
    <a href="about.php"><li>من نحن</li></a>
    <a href="department.php"><li>الاقسام </li></a>
    <a href="news.php"><li>الاخبار</li></a>
    <a href="gallery.php"><li>الصور</li></a>
    <a href="contact.php"><li>اتصل بنا</li></a>
    <a href="reserve.php"><li>أحجز الأن</li></a>

  </ul>
</div>




        <!-- top head starts here -->
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="topinfo col-lg-6 col-md-6 col-sm-8 col-xs-12">
                        <li><i class="fa fa-home"></i><span><?php echo $address; ?></span></li>
                        <li><i class="fa fa-phone"></i><span><?php echo $phone; ?></span></li>
                        <li id="mail2"><i class="fa fa-fa fa-envelope-o"></i><span id="mail"><?php echo $email; ?></span></li>
                    </div>


                    <div class="topsocial col-lg-2 col-md-2 col-sm-4 col-xs-0">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google"></i></a>
                      <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>

                   


                </div>
            </div>
        </div>
        <!-- top head ends here -->

<div class="clearfix"></div>

        <!-- header starts here -->
        <div class="header">
            <div class="container">
                <div class="row">
                  <div class="logo col-lg-3 col-md-2 col-sm-3 col-xs-3">
                    <span>مستشفى الحياة</span>
                  </div>
                  <div class="menu col-lg-9 col-md-10 col-sm-8 col-xs-8">
                    <nav class="navbar">
        			        <div class="container-fluid">
        			            <div class="navbar-header">
        			                <button type="button" class="navbar-toggle" data-toggle="" data-target="#myNavbar">
        			                    <span class="icon-bar"></span>
        			                    <span class="icon-bar"></span>
        			                    <span class="icon-bar"></span>
        			                </button>
        			            </div>

        			           <div class=" " id="myNavbar">
        			                <ul class="nav navbar-nav">

        			                    <li class="active"><a href="index.php">الرئيسيه</a></li>
        			                    <li><a href="about.php">من نحن</a></li>

        			                    <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">الاقسام
                                                <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
<?php foreach ($dept_data as $key => $value) { ?>
                                                    <li><a href="department.php?id=<?php echo $value['dep_id'] ?>"><?php echo $value['name'] ?></a></li>
<?php } ?>
                                                </ul>

                                          </li>

                                  <li><a href="news.php">الاخبار</a></li>
                                  <li><a href="gallery.php">الصور</a></li>
        			                    <li><a href="contact.php">اتصل بنا</a></li>
                                   <li><a href="reserve.php">أحجز الأن</a></li>


        			                </ul>


        			            </div>


        			        </div>
			    </nav>

                  </div>
                </div>
            </div>
        </div>
        <!-- header ends here -->



<div class="clearfix"></div>

