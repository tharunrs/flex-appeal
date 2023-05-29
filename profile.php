<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if (strlen($_SESSION["uid"]) == 0) {
	header('location:login.php');
} else {


	if (isset($_POST['submit'])) {
		$uid = $_SESSION['uid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$address = $_POST['address'];
		$sql = "update tbluser set fname=:fname,lname=:lname,mobile=:mobile,city=:city,state=:state,address=:Address where id=:uid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lname, PDO::PARAM_STR);
		$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$query->bindParam(':city', $city, PDO::PARAM_STR);
		$query->bindParam(':state', $state, PDO::PARAM_STR);
		$query->bindParam(':Address', $address, PDO::PARAM_STR);
		$query->bindParam(':uid', $uid, PDO::PARAM_STR);
		$query->execute();
		//$msg="<script>toastr.success('Mobile info updated Successfully', {timeOut: 5000})</script>";
		echo "<script>alert('Profile has been updated.');</script>";
		echo "<script> window.location.href =profile.php;</script>";
	}


?>
	<!DOCTYPE html>
	<html lang="zxx">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Font-icon css-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>BulkBois | Profile</title>
		<link rel="icon" type="image/x-icon" href="img/bell.png">
		<style>
			.header-top{
				background-color: rgba(0,0,0,0);
			}
		</style>
	</head>

	<body>
		<section class="vh-100" style="background-image: url(img/changepwdbg.jpg) ;background-repeat: no-repeat; background-size: cover; height:100%">
			<div class="mask" style="background-color: rgba(0, 0, 0, 0);">
				<?php include 'include/header.php'; ?>
				<br><br><br><br><br><br>
				<div class="container py-5 h-50">
					<div class="row d-flex justify-content-center align-items-center h-50">
						<div class="col-12 col-md-8 col-lg-6 col-xl-5">
							<div class="card bg-transparent  text-black" style="border-radius: 1rem;">
								<div class="card-body p-5 text-center bg-light" style="border-radius: 1rem; height:30rem;">
									<div class="mb-md-5 mt-md-1 pb-5">
										<h2 class="fw-bold mb-2 text-uppercase" style="color: black">Profile</h2>
										<!-- <p class="text-black-50 mb-3">Enter your details below!</p> -->
										<form class="singup-form contact-form" method="post">
											<div class="row">
												<?php
												$uid = $_SESSION['uid'];
												$sql = "SELECT id, fname, lname, email, mobile, password, address,state,city, create_date from tbluser where id=:uid ";
												$query = $dbh->prepare($sql);
												$query->bindParam(':uid', $uid, PDO::PARAM_STR);
												$query->execute();
												$results = $query->fetchAll(PDO::FETCH_OBJ);
												$cnt = 1;
												if ($query->rowCount() > 0) {
													foreach ($results as $result) {				?>
														<div class="col-md-6">
															<input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $result->fname; ?>">
														</div>
														<div class="col-md-6">
															<input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $result->lname; ?>">
														</div>
														<div class="col-md-6">
															<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $result->email; ?>" readonly>
														</div>
														<div class="col-md-6">
															<input type="text" name="mobile" id="mobile" placeholder="Mobile Number" autocomplete="off" value="<?php echo $result->mobile; ?>">
														</div>
														<div class="col-md-6">
															<input type="text" name="state" id="state" placeholder="State" autocomplete="off" value="<?php echo $result->state; ?>">
														</div>
														<div class="col-md-6">
															<input type="text" name="city" id="city" placeholder="City" autocomplete="off" value="<?php echo $result->city; ?>">
														</div>

														<div class="col-md-12">
															<input type="text" name="address" id="address" placeholder="Address" autocomplete="off" value="<?php echo $result->address; ?>">
														</div>
														<div class="col-md-12">
															<input type="submit" id="submit" name="submit" value="Update" class="site-btn sb-gradient">
														</div>
												<?php }
												} ?>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- Search model -->

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

	</body>

	</html>
<?php } ?>

<style>
	.errorWrap {
		padding: 10px;
		margin: 0 0 20px 0;
		background: #dd3d36;
		color: #fff;
		-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	}

	.succWrap {
		padding: 10px;
		margin: 0 0 20px 0;
		background: #5cb85c;
		color: #fff;
		-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	}
</style>