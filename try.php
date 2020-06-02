<?php
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
<form method="post">
<select name="date">
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
<input type="submit" name="" value="ok">
</form>
<?php
if (isset($_POST['date'])) {
	$date=$_POST['date'];
	echo $date;
}

?>
<select>
	<option>9</option>
	<option>10</option>
	<option disabled="" style="color: red">11-complete</option>
	<option>12</option>
</select>