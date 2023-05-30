<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];


	$sql = "INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':uid', $uid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('Package has been booked.');</script>";
	echo "<script>window.location.href='booking-history.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>BulkBois</title>
	<link rel="icon" type="image/x-icon" href="img/bell.png">
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/nice-select.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/animate.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />
	<style>
		footer {
			background-color: transparent;
			position: fixed;
			left: 0px;
			bottom: 0px;
			width: 100%;
		}

		.pricing-section {
			color: rgba(0, 0, 0, 0);
			background: rgba(0, 0, 0, 0);
		}

		.page-top-section {
			background-color: rgba(2, 2, 2, 1);
			height: 100vh;
		}
		.contact-card{
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: baseline;
		}
	</style>

</head>

<body class="page-top-section set-bg" data-setbg="img/gallery/contact.jpg">
	<!-- Page Preloder -->


	<!-- Header Section -->
	<?php include 'include/header.php'; ?>
	<!-- Header Section end -->




	<!-- Page top Section -->
	<!-- Slideshow start-->
	<!-- <section id="slider-sect">
		<section class="page-top-section set-bg" data-setbg="img/gallery/13.jpg" style="display:none" id="back-img-13">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/7.jpg" style="display:none" id="back-img-7">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/8.jpg" style="display:none" id="back-img-8">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/9.jpg" style="display:none" id="back-img-9">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/10.jpg" style="display:none" id="back-img-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/11.jpg" style="display:none" id="back-img-11">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/12.jpg" style="display:none" id="back-img-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">ABOUT US</h2>
					</div>
				</div>
			</div>
		</section>
	</section> -->
	<!-- Slideshow end -->

	<!-- <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2 class="main_text">About us</h2>
				</div>
			</div>
		</div>
	</section> -->


	<!-- Pricing Section -->
	<section class="">
		<div class="container" style="align-items:center;">
			<!-- <div class="section-title text-center"> -->
			<!-- <img src="img/icons/logo-icon.png" alt=""> -->
			<!-- <h2>About Us</h2> -->
			<!-- </div> -->


			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<h2 style="color:aliceblue; z-index:2;"> Contact </h2>
					<section class="pricing-section spad" style="padding-top:3.5rem">
						<div class="container" style="justify-content:center;">

							<div class="row">

								<div class="contact-card" style="font-size:50px;">
									<p><strong>Email:</strong> info@yourdomain.com</p>
									<p><strong>Contact No:</strong> 1234567890, 1122334455</p>
									<p><strong>Address:</strong> Test Address</p>
								</div>
							</div>
						</div>
					</section>
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
		var intervalTime = 10000; // Interval time in milliseconds (3 seconds)

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