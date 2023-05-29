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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BulkBois | Changepwd</title>
	<link rel="icon" type="image/x-icon" href="img/bell.png">
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
			.header-top{
				background-color: rgba(0,0,0,0);
			}
		</style>

</head>

<body>
	<!-- Header Section -->
	<!-- Header Section end -->

	<section class="vh-100"
		style = "background-image: url(img/changepwdbg.jpg) ;background-repeat: no-repeat; background-size: cover; height: 100%;">
		<div class="mask" style="background-color: rgba(0, 0, 0, 0);">
		<?php include 'include/header.php';?>
		<br><br><br><br><br><br>
		<div class="container py-5 h-50">
			<div class="row d-flex justify-content-center align-items-center h-50">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-transparent  text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center bg-light" style="border-radius: 1rem; height:25rem;">
							<div class="mb-md-5 mt-md-1 pb-5">
								<h2 class="fw-bold mb-2 text-uppercase" style="color: black" >Change password</h2>
								<!-- <p class="text-white-50 mb-3">Enter your details below!</p> -->
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
									<input type="submit" id="submit" name="submit" value="Submit" class="site-btn sb-gradient" style="width:50px;">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- <div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div> -->

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

<?php } ?>