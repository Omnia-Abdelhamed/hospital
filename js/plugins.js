$(document).ready(function(){


/*owl carousel */
	$('.owl-carousel').owlCarousel({
		autoplay : true,
		loop:true,
		margin:0,
		responsive:{
			0:{items:1},
			600:{items:2},
			768:{items:2},
			992:{items:3},
			1200:{items:3}
		},
	});


// navbar toggle button
	$(".navbar-toggle").click(function(){
		$(".mymenu").slideToggle();
	});

//select doctor by department
   $("#select_department").change(function() {
        $.ajax({
            url: "select_doctors.php",
            type: "POST",
            data:{dep_id:$("#select_department").val()},
            success: function(msg) { 
                $("#select_doctor").html(msg);
            },
            error: function(msg) {
                alert("error");
            }
        });
    });

//select time by date
	$("#the_date").change(function() {
        $.ajax({
            url: "select_time.php",
            type: "POST",
            data:{doctor_id:$("#select_doctor").val(),the_date:$("#the_date").val()},
            success: function(msg) { 
                $("#the_time").html(msg);
            },
            error: function(msg) {
                alert("error");
            }
        });
    });

//insert into reservation table
	$("#appointment").submit(function() {
        var form_data = $("#appointment").serialize();
        $.ajax({
            url: "final_reserve.php",
            type: "POST",
            data: form_data,
            success: function(msg) {
                $("#reserve_content").html(msg);
                $("#img2").hide();
                $("#img3").hide();
            },
            error: function(msg) {
                alert("error");
            }
        });
        return false;
    });

});