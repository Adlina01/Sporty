<?php
include_once 'database.php';

session_start();

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	 

    if (!isset($_SESSION['sportyid'])) {

    echo '<script>alert("Please login first");</script>';
    header("refresh: 0; url=login.php");
    exit();   
    
    } else {

        $sportyid = $_SESSION['sportyid'];

try {
    // Your database operations here
  
	
	// Check if it's a customer or management
$stmt_customer = $conn->prepare("SELECT * FROM tbl_customer_sporty WHERE FLD_CUSTUSERNAME = :sportyid");
$stmt_management = $conn->prepare("SELECT * FROM tbl_sport_venue_management_sporty WHERE FLD_MANAGEMENTID = :sportyid");

$stmt_customer->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
$stmt_management->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);

$stmt_customer->execute();
$stmt_management->execute();

$customer_data = $stmt_customer->fetch(PDO::FETCH_ASSOC);
$management_data = $stmt_management->fetch(PDO::FETCH_ASSOC);


if ($customer_data) {
    // It's a customer
    $custid = $customer_data['FLD_CUSTUSERNAME'];
    $custname = $customer_data['FLD_CUSTNAME'];
    $custemail = $customer_data['FLD_CUSTEMAIL'];
    $custphone = $customer_data['FLD_CUSTPHONE'];
    $custpass = $customer_data['FLD_CUSTPASSWORD'];

    //echo "<script>alert('This is a customer.');</script>";
} elseif ($management_data) {
    // It's a management
    $mid = $management_data['FLD_MANAGEMENTID'];
    $name = $management_data['FLD_MANAGEMENTNAME'];
    $phone = $management_data['FLD_MANAGEMENTPHONE'];
    $email = $management_data['FLD_MANAGEMENTEMAIL'];
    $pass = $management_data['FLD_MANAGEMENTPASSWORD'];
    $bal = $management_data['FLD_ACCBALANCE'];

    //echo "<script>alert('This is a management.');</script>";

} else {
    echo '<script>alert("Please login first");</script>';
    header("refresh: 0; url=../login.php");
    exit();     
} 

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

}


?>   