<?php session_start();
error_reporting(0);
include  'include/config.php';
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
  include  'include/config.php';
  if (isset($_POST['Submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $empemail = trim($_POST['empemail']);
    $empdesignation = $_POST['empdesignation'];
    $empphone = $_POST['empphone'];
    $empsalary = $_POST['empsalary'];
    $empcertificate = $_POST['empcertificate'];
    $password = md5(($_POST['emppassword']));
    $empaddress = $_POST['empaddress'];

    $sql = "INSERT INTO tblemployee (first_name,last_name,email,phone,designation,salary,address) 
            Values(:fname,:lname,:email,:phone,:designation,:salary,:address)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $first_name, PDO::PARAM_STR);
    $query->bindParam(':lname', $last_name, PDO::PARAM_STR);
    $query->bindParam(':email', $empemail, PDO::PARAM_STR);
    $query->bindParam(':phone', $empphone, PDO::PARAM_STR);
    $query->bindParam(':designation', $empdesignation, PDO::PARAM_STR);
    $query->bindParam(':salary', $empsalary, PDO::PARAM_STR);
    $query->bindParam(':address', $empaddress, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId > 0) {
      if($empdesignation==="Trainer"){
        $sql="INSERT INTO tbltrainer (emp_id,certification,password) 
              VALUES (:empid,:empcertif,:pass)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':empid',$lastInsertId,PDO::PARAM_STR);
        $query->bindParam(':empcertif',$empcertificate,PDO::PARAM_STR);
        $query->bindParam(':pass',$password,PDO::PARAM_STR);
        $query->execute();
      }
      echo "<script>alert('Employee Added succesfully.');</script>";
      echo "<script> window.location.href='index.php';</script>";
    } else {

      $errormsg = "Data not insert successfully";
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta name="description" content="Vali is a">
    <title>Admin | Add Employee</title>
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
      <h3> Add Employee </h3>
      <hr />
      <div class="row">

        <div class="col-md-12">
          <div class="tile">
            <!---Success Message--->
            <?php if ($msg) { ?>
              <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
              </div>
            <?php } ?>

            <!---Error Message--->
            <?php if ($errormsg) { ?>
              <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> <?php echo htmlentities($errormsg); ?>
              </div>
            <?php } ?>
            <div class="tile-body">
              <form class="row" method="post">

                <div class="form-group col-md-6">
                  <label class="control-label">First Name</label>
                  <input class="form-control" name="first_name" id="first_name" type="text" placeholder="Enter First Name">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Last Name</label>
                  <input class="form-control" name="last_name" id="last_name" type="text" placeholder="Enter Last Name">
                </div>


                <div class="form-group col-md-6">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" name="empemail" name="empemail" placeholder="Enter Employee email">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Designation</label>
                  <select class="form-control" name="empdesignation" onchange="showFields(this.value)">
                    <option value="">Select Designation</option>
                    <option value="Trainer">Trainer</option>
                    <option value="Janitor">Janitor</option>
                    <option value="Assistant Manager">Assistant Manager</option>
                    <option value="Manager">Manager</option>
                    <option value="Receptionist">Receptionist</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Phone Number</label>
                  <input class="form-control" type="tel" name="empphone" placeholder="Enter Phone Number">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Salary</label>
                  <input class="form-control" type="number" name="empsalary" placeholder="Enter Salary">
                </div>


                <div class="form-group col-md-6" id="certificateField" style="display: none;">
                  <label class="control-label">Certificate</label>
                  <input class="form-control" type="text" name="empcertificate" placeholder="Enter Certificate Level">
                </div>

                <div class="form-group col-md-6" id="passwordField" style="display: none;">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="password" name="emppassword" placeholder="Enter Password">
                </div>


                <div class="form-group col-md-6">
                  <label class="control-label">Address</label>
                  <input type="text" class="form-control" name="empaddress" placeholder="Enter Address">
                </div>


                <script>
                  function showFields(designation) {
                    var certificateField = document.getElementById('certificateField');
                    var passwordField = document.getElementById('passwordField');

                    if (designation === 'Trainer') {
                      certificateField.style.display = 'block';
                      passwordField.style.display = 'block';
                    } else {
                      certificateField.style.display = 'none';
                      passwordField.style.display = 'none';
                    }
                  }
                </script>

                <!-- <div class="form-group col-md-6">
                  <label class="control-label">File</label>
                  <input class="form-control" type="file" name="photo" id="photo">
                </div> -->


                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
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
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
      bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



  </body>

  </html>

  <!-- Script -->
  <script>
    function getdistrict(val) {
      $.ajax({
        type: "POST",
        url: "ajaxfile.php",
        data: 'category=' + val,
        success: function(data) {
          $("#package").html(data);
        }
      });
    }
  </script>
<?php } ?>