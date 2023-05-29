<?php session_start();
error_reporting(0);
require_once('include/config.php');
if (strlen($_SESSION["uid"]) == 0) {
	header('location:login.php');
} else {
	$uid = $_SESSION['uid'];
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
		<section class="section1">

		</section>


	</body>

	</html>

<?php } ?>