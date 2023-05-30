<?php session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["uid"])==0)
    {
header('location:login.php');
}
else{
$uid=$_SESSION['uid'];
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
    <title>User | Attendance</title>
	<link rel="icon" type="image/x-icon" href="img/bell.png">
  <style>
			.header-top{
				background-color: rgba(0,0,0,0);
			}
      /* .vh-100{
        filter: grayscale(100%) brightness(200%);
      } */
		footer {
			background-color: transparent;
			position: relative;
			left: 0px;
			bottom: 0px;
			width: 100%;
		}

	</style>  
</head>
<body>
	<!-- Page Preloder -->


	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	<section class="vh-100"
	style = "background-image: url(img/changepwdbg-old.jpg) ;background-repeat: no-repeat; background-size: cover;height:fit-content	">
		<div class="mask" style="background-color: rgba(0, 0, 0, 0);">
			<h2 style="color: white; text-align: center; padding-top:210px;" >ATTENDANCE TRACKER</h2>
			<section class="contact-page-section spad overflow-hidden">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-bordered bg-light">
								<thead>
									<tr>
										<th>Date</th>
                                        <th>Duration</th>
                                        <th>Comment from trainer</th>
									</tr>
								</thead>
								<?php
								$uid=$_SESSION['uid'];
										/*$sql="select id, product_id, userid, product_title, packages, category, PackageDuratiobn, price, descripation, booking_date from tblbooking where userid=:uid";*/
										$sql="SELECT * FROM tblsession where client_id=:uid;";
								$query= $dbh->prepare($sql);
								$query->bindParam(':uid',$uid, PDO::PARAM_STR);
								$query-> execute();
								$results = $query -> fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query -> rowCount() > 0)
								{
								foreach($results as $result)
								{
								?>
								<tbody>
									<tr>
										<td><?php echo htmlentities(date('Y-m-d',strtotime($result->login_time)));?></td>
                                        <td><?php echo htmlentities($result->duration);?></td>
										<td><?php echo htmlentities($result->comment);?></td>
									</tr>
								<?php  $cnt=$cnt+1; } } ?>
								</tbody>
  							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include 'include/footer.php'; ?>

	</section>
	<!-- Trainers Section end -->



	<!-- Footer Section -->
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

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
    background: #dd3d36;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #5cb85c;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>

<?php } ?>