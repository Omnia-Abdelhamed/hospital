<!--  footer starts here -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footerabout col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<h1>مستشفى الحياة</h1>
				<p>المهمة الاساسية لمستشفانا هى تحسين الرعاية الصحية و ذلك لصالح مجتمعنا عن طريق رفع مستوى جودة الخدمات الصحية المقدمة للمرضى. مستشفى مصر الدولى مهتمة و منحازة تماماً لتقديم خدمات عالية الجودة للمرضى سواء المريض الداخلى أو المريض الخارجى. و تقوم المستشفى بتحقيق هذا الهدف ليس بمعزل عن المجتمع الذى تحاول المستشفى دائماً مقابلة احتياجاته و تلبية مطالبه فى مجال الرعاية الطبية المتميزة.
				</p>

				<i class="fa fa-phone"></i><span><?php echo $phone; ?></span><br>
				<i class="fa fa-home"></i><span><?php echo $email; ?></span><br>

			</div>

			<div class="footerdepartment col-lg-2 col-md-2 col-sm-3  col-xs-6">
				<h1>الاقسام</h1>

				<ul>
<?php foreach ($dept_data as $key => $value ) { ?>
					<li><a href="#"><?php echo $value['name'] ; ?></a></li>
<?php } ?>
				</ul>
			</div>

			<div class="footerlinks col-lg-2 col-md-2 col-sm-3 col-xs-6">
				<h1>لينكات</h1>
				 <ul>
                    <li><a href="index.php">الرئيسيه</a></li>
                    <li><a href="about.php">من نحن</a></li>
                    <li><a href="department.php">الاقسام</a></li>
                    <!-- <li><a href="#">دليلك</a></li> -->
                    <li><a href="contact.php">اتصل بنا</a></li>
			     </ul>

			</div>

			<div class="footersubscribe col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<h1>إعجاب</h1>
				<p> </p>
				<input type="text" name="" class="form-control" placeholder="إعجاب">
				<input type="submit" name="" value="إعجاب">
			</div>

		</div>
	</div>
</div>
<!--  footer ends here -->




<!-- rights -->
<div class="rights">
	<div class="container">
		<div class="row">
			<span>
					جميع الحقوق محفوظه 2018
            </span>
		</div>
	</div>
</div>
<!-- rights -->



    <script src="js/jquery.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    </body>
</html>