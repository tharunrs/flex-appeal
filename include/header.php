<script>
      window.addEventListener('load', function() {
        // Get the element to modify
        var home = document.getElementById('home_nav');
		var about = document.getElementById('about_nav');
		var contact = document.getElementById('contact_nav');
		var dietpro = document.getElementById('dietpro_nav');
		var bookinghist = document.getElementById('booking_nav');

        //get address of current page
		var addr= document.location.href;
        //switch case to set selected item as active
		switch(addr){
			case 'http://localhost/index.php':
				home.classList.add('active');
				break;
				
			case 'http://localhost/':
				home.classList.add('active');
				break;
			case 'http://localhost/about.php':
				about.classList.add('active');
				break;
			case 'http://localhost/contact.php':
				contact.classList.add('active');
				break;
			case 'http://localhost/dietpro.php':
				dietpro.classList.add('active');
				break;
				
			case 'http://localhost/booking-history.php':
				bookinghist.classList.add('active');
				break;
		}
        });
    </script>
<header class="header-section">
		<div class="header-top">
			<div class="row m-0">
				<div class="col-md-6 d-none d-md-block p-0">
					<!-- <div class="header-info">
						<i class="material-icons">map</i>
						<p>184 Main Collins Street</p>
					</div>
					<div class="header-info">
						<i class="material-icons">phone</i>
						<p>(965) 436 3274</p>
					</div> -->
				</div>
				<div class="col-md-6 text-left text-md-right p-0">
                 <?php if(strlen($_SESSION['uid'])==0): ?>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">account_circle</i>
						<a href="login.php" styles="text-color: white"><p>Login</p></a>
					</div>
					<?php else :?>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">account_circle</i>
						<a href="profile.php"><p>My Profile</p></a>
					</div>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">brightness_7</i>
						<a href="changepassword.php"><p>Change Password</p></a>
					</div>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">logout</i>
						<a href="logout.php"><p>Logout</p></a>
					</div>
					
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<a href="index.php" class="site-logo" style="color:#fff; font-weight:bold; font-size:26px;">
				BulkBois<br />
				<!-- <small style="margin-top:-4%;">Gym Motto</small> -->
			</a>
			
			<div class="container">
				<ul class="main-menu">
					<li><a href="index.php" id="home_nav">Home</a></li>
					<li><a href="about.php" id="about_nav">About</a></li>
					<li><a href="contact.php" id="contact_nav">Contact</a></li>
					<li><a href="dietpro.php" id="dietpro_nav">DietPro</a></li>

					<!--If you add another menu item, be sure to add it in the script on page top-->

					<?php if(strlen($_SESSION['uid'])==0): ?>
			<!--li><a href="admin/">Admin</a></li-->
					<?php else :?>
						<li><a href="booking-history.php" id="booking_nav">Booking History</a></li>
						<?php endif;?>
				</ul>
			</div>
		</div>
	</header>