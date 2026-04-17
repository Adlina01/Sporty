<?php
include "db.php"; // Include your database connection file

// Check if the venue ID is provided in the URL
if (isset($_GET['id'])) {
    // Retrieve the venue ID from the URL
    $venueId = $_GET['id'];


    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Delete the venue from the database
        $stmt = $conn->prepare("DELETE FROM tbl_sport_venue_sporty WHERE FLD_VENUEID = :venueId");
        $stmt->bindParam(':venueId', $venueId, PDO::PARAM_STR);
        $stmt->execute();

        // Redirect back to the list after deletion
        header("Location: list_venue.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;

     }else {
        // If the confirmation parameter is not present, show the confirmation dialog
        echo "Are you sure you want to delete this venue?";
        echo "<br>";
        echo "<a href='delete_venue.php?id=$venueId&confirm=true'>Yes</a> | <a href='list_venue.php'>No</a>";
    }

} else {
    // If the venue ID is not provided, redirect to the list page
    header("Location: list_venue.php");
}
?>
