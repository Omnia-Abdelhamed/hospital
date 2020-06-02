<?php
    include 'head.php';
    include 'header.php';

    if (isset($_POST['submit'])) {
    	$name=$_POST['username'];
    	$email=$_POST['useremail'];
    	$phone=$_POST['phone'];
    	$message=$_POST['message'];

    	if (!empty($name) & !empty($email) & !empty($phone) & !empty($message)) {
    		$contact_sql="INSERT INTO contact (name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
    		$contact_result=mysqli_query($connect,$contact_sql);
    	}
    }
    
?>
<!-- contact head starts here -->
<div class="contacthead">
	<div class="container">
		<div class="row">
			<h1>اتصل بنا<h1>
		</div>
	</div>
</div>
<!-- contact head ends here -->

<!-- contact body starts here -->
<div class="contactblock">
	<div class="container">
		<div class="row">



			<div class="mycontactblock col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="mycontactblockform col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<form method="post">
						<div class="myinput">
							<label>الاسم</label>
							<input type="text" name="username" placeholder="" class="form-control">
						</div>
						<div class="myinput">
							<label>الايميل</label>
							<input type="email" name="useremail" placeholder="" class="form-control">
						</div>
						<div class="myinput">
							<label>رقم التليفون</label>
							<input type="text" name="phone" placeholder="" class="form-control">
						</div>

						<div class="myinput">
							<textarea class="form-control" placeholder="اكتب رسالتك هنا" name="message"></textarea>
						</div>

						<div class="myinput">
							<input type="submit" name="submit" value="إرسال" class="form-control">
						</div>


					</form>
				</div>
				<div class="mycontactblockinfo col-lg-4 col-md-4 col-sm-6 col-xs-12">

					<div class="aboutinfo col-lg-12 col-md-12 col-sm-4 col-xs-6">
						<div class="aboutinfoImg col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="aboutinfobody col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<h4>العنوان</h4>
							<span><?php echo $address; ?></span>
						</div>
					</div>

          <div class="aboutinfo col-lg-12 col-md-12 col-sm-4 col-xs-6">
						<div class="aboutinfoImg col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<i class="fa fa-envelope-o"></i>
						</div>
						<div class="aboutinfobody col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<h4>الايميل</h4>
							<span><?php echo $email; ?></span>
						</div>
					</div>


          <div class="aboutinfo col-lg-12 col-md-12 col-sm-4 col-xs-6">
						<div class="aboutinfoImg col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<i class="glyphicon glyphicon-earphone"></i>
						</div>
						<div class="aboutinfobody col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<h4>التليفون</h4>
							<span><?php echo $phone; ?></span>
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>
<!-- contact body ends here -->
<div class="clearfix"></div>

<?php
  include 'footer.php';
?>