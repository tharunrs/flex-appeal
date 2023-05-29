<?php session_start();
error_reporting(0);
include  'include/config.php';
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>Admin | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">

  </head>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content bg-dark">

      <div>
        <h3><i class="fa fa-dashboard "></i> Dashboard</h3>
      </div>

      <div class="row">

        <div class="col-md-6 col-lg-6">
          <?php
          $sql = "SELECT count(id) as totalcat FROM tbladdpackage;";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $result) {
          ?>
            <a href="add-post.php">
              <div class="widget-small icon border border-solid bg-secondary bg-secondary bg-secondary"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                  <h4 style="color:white">Add Membership Package</h4>
                  <p><b><?php echo $result->totalcat; ?></b></p>
                </div>
              </div>
            </a>
          <?php  } ?>
        </div>


        <div class="col-md-6 col-lg-6">
          <?php
          $sql = "SELECT count(id) as totalpost FROM tbladdpackage;";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>

              <a href="manage-post.php">
                <div class="widget-small icon border border-dotted bg-secondary"><i class="icon fa fa-file fa-3x"></i>
                  <div class="info">
                    <h4 style="color:white">View Membership Packages</h4>
                    <p><b><?php echo $result->totalpost; ?></b></p>
                  </div>
                </div>
              </a>
          <?php $cnt = $cnt + 1;
            }
          } ?>
        </div>


        <div class="col-md-6 col-lg-6">
          <?php
          $sql = "SELECT count(id) as totalbookings FROM tblbooking;";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $result) {
          ?>
            <a href="booking-history.php">
              <div class="widget-small icon border border-solid bg-secondary"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <h4 style="color:white">Bookings</h4>
                  <p><b><?php echo $result->totalbookings; ?></b></p>
                </div>
              </div>
            </a>
          <?php  } ?>
        </div>

        <div class="col-md-6 col-lg-6">
          <?php
          $sql = "SELECT count(id) as totalemployees FROM tblemployee";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $result) {
          ?>
            <a href="employee.php">
              <div class="widget-small icon border border-solid bg-secondary bg-secondary bg-secondary"><i class="icon fa fa-user fa-3x"></i>
                <div class="info">
                  <h4 style="color:white">Employees</h4>
                  <p><b><?php echo $result->totalemployees; ?></b></p>
                </div>
              </div>
            </a>
          <?php  } ?>
        </div>


        <div class="col-md-6 col-lg-6">
          <?php
          $sql = "SELECT count(id) as totaltrainers FROM tbltrainer";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $result) {
          ?>
            <a href="trainers.php">
              <div class="widget-small icon border border-solid bg-secondary bg-secondary bg-secondary"><i class="icon fa fa-user fa-3x"></i>
                <div class="info">
                  <h4 style="color:white">Trainers</h4>
                  <p><b><?php echo $result->totaltrainers; ?></b></p>
                </div>
              </div>
            </a>
          <?php  } ?>
        </div>


        <div class="col-md-6 col-lg-6">
          <?php
          $sql = "SELECT count(id) as totalbookings FROM tblbooking where paymentType='Full Payment'";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $result) {
          ?>
            <a href="add-employee.php">
              <div class="widget-small icon border border-solid bg-secondary bg-secondary bg-secondary"><i class="icon fa fa-user fa-3x"></i>
                <div class="info">
                  <h4 style="color:white">Add Employee</h4>
                </div>
              </div>
            </a>
          <?php  } ?>
        </div>




    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#sampleTable').DataTable();
    </script>

  </body>

  </html>
<?php } ?>