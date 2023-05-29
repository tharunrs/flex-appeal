<?php session_start();
error_reporting(0);
//error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata');
ini_set('display_errors', 1);
include  'include/config.php';
if (strlen($_SESSION['trainerid'] == 0)) {
  header('location:logout.php');
  exit();
} else {


  //mark attendance logout

  if (isset($_GET['mark'])) {
    $uid = intval($_GET['mark']);
    $log = date($_GET['log']);
    $currentDateTime = date('Y-m-d H:i:s');


    //date objects

    $logob = DateTime::createFromFormat("Y-m-d H:i:s", $log);
    $currentDateTimeob = DateTime::createFromFormat("Y-m-d H:i:s", $currentDateTime);

    $diff = $logob->diff($currentDateTimeob);

    $duration = round($diff->h+$diff->days * 24);
    $sql = "UPDATE tblsession SET logout_time=:logout,duration=:duration WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $uid, PDO::PARAM_INT);
    $query->bindParam(':duration', $duration, PDO::PARAM_INT);
    $query->bindParam(':logout', $currentDateTime, PDO::PARAM_STR);


    if ($query->execute()) {
      echo "<script>alert('logout Marked successfully');</script>";
      echo "<script>window.location.href='client-logout.php'</script>";
      exit();
    } else {
      echo "Error: " . $query->errorInfo()[2]; // Display the specific error message
      exit();
    }
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta name="description" content="Vali is a">
    <title>Trainer | Mark Logout</title>
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
      <h3>Mark Logout</h3>
      <hr />
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <?php
                $sql = "SELECT s.id AS id,u.fname AS fname, u.id AS u_id, s.login_time AS log FROM tblsession s join tbluser u on s.client_id=u.id where s.logout_time is NULL and u.trainer_id=:trainer";
                $query = $dbh->prepare($sql);
                $query->bindParam(':trainer', $_SESSION['trainerid'], PDO::PARAM_INT);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {
                ?>

                    <tbody>
                      <tr>
                        <td><?php echo htmlentities($result->u_id); ?></td>
                        <td><?php echo htmlentities($result->fname); ?></td>
                        <td>
                          <a href="client-logout.php?mark=<?php echo htmlentities($result->id); ?>&log=<?php echo htmlentities($result->log) ?>"><button class="btn btn-danger" type="button">logout</button></a>
                        </td>
                      </tr>
                  <?php  }
                } ?>

                    </tbody>
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
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#sampleTable').DataTable();
    </script>

  </body>

  </html>
<?php } ?>