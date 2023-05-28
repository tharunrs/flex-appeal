<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["uid"])==0)
    {   
header('location:login.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$email=$_SESSION['email'];
$sql ="SELECT password FROM tbluser WHERE email=:email and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set password=:newpassword where email=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";	
}
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>BulkBois | Changepassword</title>
	<link rel="icon" type="image/x-icon" href="img/bell.png">
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	                                                                              
	<!-- Page top Section -->
	<!-- <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2 style="font-size: 75px;">change password</h2>
				</div>
			</div>
		</div>
	</section> -->

	<!-- Slideshow start-->
	<section id="slider-sect">
		<section class="page-top-section set-bg" data-setbg="img/gallery/13.jpg" style="display:none" id="back-img-13">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size: 50px;">Change Password</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/7.jpg" style="display:none" id="back-img-7">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size: 50px;">Change Password</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/8.jpg" style="display:none" id="back-img-8">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size: 50px;">Change Password</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/9.jpg" style="display:none" id="back-img-9">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size: 50px">Change Password</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/10.jpg" style="display:none" id="back-img-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size: 50px;">Change Password</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/11.jpg" style="display:none" id="back-img-11">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size:50px; color:red;">Change Password</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/12.jpg" style="display:none" id="back-img-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 m-auto text-white">
						<h2 class="main_text" styles="font-size: 50px;">Change Password</h2>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!-- Slideshow end -->



	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="pricing-item entermediate" style="height:440px;">
						<div class="pi-top" style="height:100px;">
							<h4>change password</h4>
						</div>
						  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<br>
						<form class="singup-form contact-form" method="post" onSubmit="return valid();">
						<div class="row" style="padding-left:50px; padding-right:50px;">
							<div class="col-md-12">
								<input type="password" name="password" id="password" placeholder="Old Password" autocomplete="off">
							</div>
							<div class="col-md-12">
								<input type="password" name="newpassword" id="newpassword" placeholder="New Password" autocomplete="off">
							</div>
							
							<div class="col-md-12">
								<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" autocomplete="off">
							</div>
							
						</div>
						<br>
					
					<input type="submit" id="submit" name="submit" value="Submit" class="site-btn sb-gradient" style="width:50px;">
</form>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					
				</div>
				
			</div>
		</div>
	</section>
	

	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	

	<script>
		var slide1 = document.getElementById('back-img-13');
		var slide2 = document.getElementById('back-img-7');
		var slide3 = document.getElementById('back-img-8');
		var slide4 = document.getElementById('back-img-9');
		var slide5 = document.getElementById('back-img-10');
		var slide6 = document.getElementById('back-img-11');
		var slide7 = document.getElementById('back-img-12');
		var i = 0;
		var intervalTime = 3000; // Interval time in milliseconds (3 seconds)

		function changeSlide() {
			switch (i % 7) {
				case 0:
					slide7.style.display = "none";
					slide1.style.display = "block";
					break;
				case 1:
					slide1.style.display = "none";
					slide2.style.display = "block";
					break;
				case 2:
					slide2.style.display = "none";
					slide3.style.display = "block";
					break;
				case 3:
					slide3.style.display = "none";
					slide4.style.display = "block";
					break;
				case 4:
					slide4.style.display = "none";
					slide5.style.display = "block";
					break;
				case 5:
					slide5.style.display = "none";
					slide6.style.display = "block";
					break;
				case 6:
					slide6.style.display = "none";
					slide7.style.display = "block";
					break;
			}

			i++;
			setTimeout(changeSlide, intervalTime);
		}

		// Start the slideshow
		changeSlide();
	</script>


	</body>
</html>
<?php } ?>	