<?php
include("connection.php");
date_default_timezone_set("Asia/Kolkata");

// Logic Functions
function getRemainingDays($endDate) {
    return round((strtotime($endDate) - time()) / (60 * 60 * 24)) + 1;
}

function fetchPassDetails($con, $id) {
    $stmt = $con->prepare("SELECT * FROM pass WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_assoc();
}

function getDestinationPrice($con, $destination) {
    $stmt = $con->prepare("SELECT price FROM destination WHERE name = ?");
    $stmt->bind_param("s", $destination);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_assoc()['price'] ?? 0;
}

function processRefund($con, $id, $refundAmount) {
    $stmt1 = $con->prepare("UPDATE pass SET paid = paid - ? WHERE id = ?");
    $stmt1->bind_param("di", $refundAmount, $id);
    $stmt1->execute();

    $stmt2 = $con->prepare("UPDATE pass SET date = CURDATE() WHERE id = ?");
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
}

// Execution block
if (!defined('PHPUNIT_RUNNING')) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $row = fetchPassDetails($con, $id);
        $nod = getRemainingDays($row['date']);
        $price = getDestinationPrice($con, $row['dest']);
        $amt = $price * $nod;
        processRefund($con, $id, $amt);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cloud Based Bus Pass System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div style="padding-block: 50px; margin-left:50px;">
    Refund has been initiated and <br><br>
    Rs. <strong><?php echo $amt; ?></strong> will be Credited to your account in 3-4 working days.
  </div>

  <form action="index.html">
    <input type="submit" class="btn btn-primary py-1 px-5 text-white" style="width: 200px; margin-left: 50px" value="Home">
  </form>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
