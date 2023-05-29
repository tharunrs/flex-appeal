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

</head>

<body>
	<!-- Page Preloder -->


	<!-- Header Section -->
	<?php include 'include/header.php'; ?>
	<!-- Header Section end -->




	<!-- Slideshow start-->
	<section id="slider-sect">
		<section class="page-top-section set-bg" data-setbg="img/gallery/13.jpg" style="display:none" id="back-img-13">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/7.jpg" style="display:none" id="back-img-7">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/8.jpg" style="display:none" id="back-img-8">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/9.jpg" style="display:none" id="back-img-9">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/10.jpg" style="display:none" id="back-img-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/11.jpg" style="display:none" id="back-img-11">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>

		<section class="page-top-section set-bg" data-setbg="img/gallery/12.jpg" style="display:none" id="back-img-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2 class="main_text" styles="font-size=10vh">BULK BOIS</h2>
						<p>Let's Get Ya Bulke'n</p>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!-- Slideshow end -->



	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="" id="muscle-man-logo">
				<h2>Pricing plans</h2>
				<!-- <p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p> -->
			</div>
			<div class="row">
				<?php

				$sql = "SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date from tbladdpackage";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $result) {
				?>
						<div class="col-lg-4 col-sm-6">
							<div class="pricing-item">
								<div class="pi-top">
									<h4>
										<?php echo $result->titlename; ?>
									</h4>
								</div>
								<div class="pi-price">
									<h3>
										<?php echo htmlentities($result->Price); ?>
									</h3>
									<p>
										<?php echo $result->PackageDuratiobn; ?>
									</p>
								</div>
								<ul>
									<?php echo $result->Description; ?>

								</ul>
								<?php if (strlen($_SESSION['uid']) == 0) : ?>
									<a href="login.php" class="site-btn sb-line-gradient">Book Now</a>
								<?php else : ?>
									<!-- <a href="#" class="site-btn sb-line-gradient">Booking Now</a> -->
									<form method='post'>
										<input type='hidden' name='pid' value='<?php echo htmlentities($result->id); ?>'>


										<input class='site-btn sb-line-gradient' type='submit' name='submit' value='Booking Now' onclick="return confirm('Do you really want to book this package.');">
									</form>
								<?php endif; ?>
							</div>
						</div>
				<?php $cnt = $cnt + 1;
					}
				} ?>
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
