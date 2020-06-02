<?php
  include 'head.php';
  include 'header.php';

  $day=date('d');
  $month=date('m');
  $next_month=$month+1;
  if($next_month<10) {
    $next_month='0'.$next_month;
  }
  if($month==12) {
    $next_month='01';
  }
  $year='20'.date('y');
  $div=$year%4;
  $months_31= array('01','03','05','07','08','10','12');
  $months_30= array('04','06','09','11');
  if (in_array($month, $months_31)) {
    $end=31;
  }elseif (in_array($month, $months_30)) {
    $end=30;
  }elseif ($month==02 && $year%4==0) {
    $end=29;
  }elseif ($month==02 && $year%4 != 0) {
    $end=28;
  }
?>






<!-- contact head starts here -->
<div class="abouthead">
	<div class="container">
		<div class="row">
			<h1>أحجز الان<h1>
		</div>
	</div>
</div>
<!-- contact head ends here -->


<!-- reserve now starts here -->
<div class="myreserve">
  <div class="container">
    <div class="row">
      <div class="reservform col-lg-8 col-md-8 col-sm-12 col-xs-12" id="reserve_content">
        <form method="post" id="appointment" name="appointment-form">
          <div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>أختار  القسم</label><br>
              <select name="select_department" id="select_department" class="form-control">
                <option value="0">اختر....</option>
                <?php foreach ($dept_data as $key => $value) { ?>
                <option value="<?php echo $value['dep_id']; ?>"><?php echo $value['name']; ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>أختار الدكتور</label><br>
            <select class="form-control" name="select_doctor" id="select_doctor">
              <option value="0">اختر....</option>
            </select>
          </div>
          <div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>التاريخ</label><br>
            <select class="form-control" name="the_date" id="the_date">
              <option value="0">اختر....</option>
              <?php for ($i=$day; $i <= $end ; $i++) { 
                if ($i!= $day && $i<10) { ?>
                  <option value='0<?php echo $i."/".$month."/".$year; ?>'>0<?php echo $i."/".$month."/".$year; ?></option>;
              <?php }else{ ?>
                  <option value='<?php echo $i."/".$month."/".$year; ?>'><?php echo $i."/".$month."/".$year; ?></option>;
              <?php } } ?>
              <?php for ($m=1; $m <= $end ; $m++) { 
                if ($m<10) { ?>
                  <option value='0<?php echo $m."/".$next_month."/".$year; ?>'>0<?php echo $m."/".$next_month."/".$year; ?></option>;
              <?php }else{ ?>
                  <option value='<?php echo $m."/".$next_month."/".$year; ?>'><?php echo $m."/".$next_month."/".$year; ?></option>;
              <?php } } ?>
            </select>
          </div>

          <div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>الوقت</label><br>
            <select class="form-control" name="the_time" id="the_time">
              <option value="0">اختر....</option>
            </select>
          </div>

          <div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>الاسم</label><br>
            <input type="text" class="form-control" placeholder=".................." required="" name="form_name" />
          </div>

          <div class="reservepart col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>التيلفون</label><br>
            <input type="text" class="form-control" placeholder="...................." required="" name="phone" />
          </div>

          <input type="submit" value="إرسال" name="submit" />
        </form>
      </div>

      <div class="reservimg col-lg-4 col-md-4 col-sm-0 col-xs-0">
        <img src="images/ad1.jpeg" alt="" class="img-responsive">
        <img src="images/ad1.jpeg" alt="" class="img-responsive" id="img2">
        <img src="images/ad1.jpeg" alt="" class="img-responsive" id="img3">
      </div>

    </div>
  </div>
</div>
<!-- reserve now ends here -->









<div class="clearfix"></div>

<?php
  include 'footer.php';
?>