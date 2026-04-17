<?php
include "db.php";
include "session.php";
$sportyid = $_SESSION["sportyid"];

$month = $_GET['month'] ?? 'All';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch venue names and corresponding commission for the specified sportyid
$comissionCountQuery = "SELECT v.FLD_VENUENAME, 
                               COALESCE(SUM(b.FLD_BOOKINGPRICE), 0) AS total_commission
                        FROM tbl_sport_venue_sporty v
                        LEFT JOIN tbl_booking_sporty b ON v.FLD_VENUEID = b.FLD_VENUEID
                        WHERE v.FLD_MANAGEMENTID = :sportyid";

if ($month !== 'All') {
    $comissionCountQuery .= " AND MONTH(b.FLD_BOOKINGDATE) = :month";
}

$comissionCountQuery .= " GROUP BY v.FLD_VENUENAME";

$comissionCountStmt = $conn->prepare($comissionCountQuery);
$comissionCountStmt->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);

if ($month !== 'All') {
    $comissionCountStmt->bindParam(':month', $month, PDO::PARAM_INT);
}

$comissionCountStmt->execute();
$comissionCountData = $comissionCountStmt->fetchAll(PDO::FETCH_ASSOC);

// Return the commission data as JSON
header('Content-Type: application/json');
echo json_encode($comissionCountData);
?>
