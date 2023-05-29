<?php
session_start();
error_reporting(0);
include 'include/config.php';
if (strlen($_SESSION["uid"]) == 0) {
    header('location:login.php');
}
$uid = $_SESSION['uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Payment Processing');</script>";
    
    echo "<script>alert('Payment Done');</script>";
    echo "<script>window.location.href='booking-history.php'</script>";
}
?>


<html>

<head>
    <title>BulkBois| Payment</title>
    <link rel="icon" type="image/x-icon" href="img/bell.png">
    <link rel="stylesheet" href="css/payment.css" />
</head>

<body>
    <div class="mainscreen_div">
        <img src="img/paybg.avif" class="mainscreen" alt="">
        <div class="card">
            <div class="leftside">
                <img src="img/bro.avif" class="product" alt="Shoes" />
            </div>
            <div class="rightside">
                <form method="post">
                    <h2>CheckOut</h1>
                        <h3>Payment Information
                    </h2>
                    <p>Cardholder Name</p>
                    <input type="text" class="inputbox" name="name" required />
                    <p>Card Number</p>
                    <input type="number" class="inputbox" name="card_number" id="card_number" required />

                    <p>Card Type</p>
                    <select class="inputbox" name="card_type" id="card_type" required>
                        <option value="">--Select a Card Type--</option>
                        <option value="Visa">Visa</option>
                        <option value="RuPay">RuPay</option>
                        <option value="MasterCard">MasterCard</option>
                    </select>
                    <div class="expcvv">

                        <p class="expcvv_text">Expiry</p>
                        <input type="date" class="inputbox" name="exp_date" id="exp_date" required />


                        <p class="expcvv_text2">CVV</p>
                        <input type="password" class="inputbox" name="cvv" id="cvv" required />
                    </div>
                    <p></p>
                    <input type="submit" class="button" name="Submit" value="CheckOut">
                </form>
            </div>
        </div>
    </div>
</body>

</html>