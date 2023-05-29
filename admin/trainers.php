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
    <meta name="description" content="Vali is a responsive">

    <title>Admin | View Trainers </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <h3>View Trainers</h3>
              <hr />
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Trainer ID</th>
                    <th>Name</th>
                    <th>Certification</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                  </tr>
                </thead>

                <?php
                include  'include/config.php';
                $sql = "SELECT * FROM tbltrainer NATURAL JOIN tblemployee;";
                $query = $dbh->prepare($sql);

                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {
                ?>

                    <tbody>
                      <tr>
                        <td><?php echo htmlentities($result->id); ?></td>
                        <td><?php echo htmlentities($result->first_name),"   ",htmlentities($result->last_name); ?></td>
                        <td><?php echo htmlentities($result->certification); ?></td>
                        <td><?php echo htmlentities($result->email); ?></td>
                        <td><?php echo htmlentities($result->phone); ?></td>
                      </tr>


                    </tbody>

                    <!--    // end modal popup code........ -->
                <?php $cnt = $cnt + 1;
                  }
                } ?>
              </table>
            </div>
          </div>
        </div>
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