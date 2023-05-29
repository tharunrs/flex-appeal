<?php session_start();
error_reporting(0);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata');
ini_set('display_errors', 1);
include  'include/config.php'; 
if (strlen($_SESSION['trainerid']==0)) {
  header('location:logout.php');
  exit();
  } else{


//mark attendance login

if(isset($_GET['mark']))
{
$uid=intval($_GET['mark']);
$currentDateTime = date('Y-m-d H:i:s');
$sql = "INSERT INTO tblsession (client_id, login_time) VALUES (:id, :currentDateTime)";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $uid, PDO::PARAM_INT);
$query->bindParam(':currentDateTime', $currentDateTime, PDO::PARAM_STR);


if ($query->execute()) {
    echo "<script>alert('Login Marked successfully');</script>";
    echo "<script>window.location.href='client-login.php'</script>";
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
   <title>Trainer | Mark Login</title>
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
     <h3>Mark Login</h3>
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
                  $sql="select id,fname from tbluser where trainer_id=:trainer";
                  $query= $dbh->prepare($sql);
                  $query->bindParam(':trainer', $_SESSION['trainerid'], PDO::PARAM_INT);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>

                <tbody>
                  <tr>
                    <td><?php echo htmlentities($result->id);?></td>
                    <td><?php echo htmlentities($result->fname);?></td>
                    <td>
                      <!-- <a href="add-category.php?cid=<?php echo htmlentities($result->id);?>"><button class="btn btn-primary" type="button">Edit</button></a>  -->
                      <a href="client-login.php?mark=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger" type="button">Login</button></a></td>
                  </tr>
                    <?php  } } ?>
              
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
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  
  </body>
</html>
<?php } ?>