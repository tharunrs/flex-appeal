<?php

error_reporting(0);
ob_start();
//DB Connection
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dietpro');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

$id = $_GET['content_id'];
$bmi = $_GET['bmi'];
$gauge_val=$bmi/40;



$sql = "SELECT content FROM mapping where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
    $result_id = ($result->content);
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>User | Dietplan</title>
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
    <section class="vh-100" style = "background-image: url(img/diet.avif) ;background-repeat: no-repeat; background-size: cover;">
        <div class="result-box">
            <h2><p style="color: #92efdc; font-size:35px;"><u>CUSTOMIZED DIET PLAN</u></p><?php echo htmlentities($result->content); ?></h2>
        </div>
        <div class="meter">
            <div class="gauge">
                <div class="gauge__body">
                    <div class="gauge__fill"></div>
                    <div class="gauge__cover"></div>
                </div>
            </div>
        </div>
    </section>


    <script>
        const gaugeElement = document.querySelector(".gauge");

        function setGaugeValue(gauge, value) {
            if (value < 0 || value > 1) {
                return;
            }

            gauge.querySelector(".gauge__fill").style.transform = `rotate(${value / 2}turn)`;
            gauge.querySelector(".gauge__cover").textContent = `${Math.round(value * 100)}%`;
        }

        setGaugeValue(gaugeElement, <?php echo $gauge_val;?>);
    </script>
</body>
<?php
}
?>