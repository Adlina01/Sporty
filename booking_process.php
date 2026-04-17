<?php
// booking_process.php
// Set error reporting to hide deprecated messages
error_reporting(E_ALL & ~E_DEPRECATED);

include_once 'database.php';
include "session.php";
include('config.php');



try {
    $sportyid = $_SESSION['sportyid'];
    $booking_id = generateBookingId($conn);

    // Check if the booking ID is not null before proceeding
    if ($booking_id !== null) {
        $venue_id = isset($_POST['venue_id']) ? $_POST['venue_id'] : null;
        $venue_price = isset($_POST['venue_price']) ? $_POST['venue_price'] : null;
        $venue_label = isset($_POST['venue_label']) ? $_POST['venue_label'] : null;
        $venue_name = isset($_POST['venue_name']) ? $_POST['venue_name'] : null;
        $booking_date = isset($_POST['book_date']) ? $_POST['book_date'] : null; 
        $booking_time = isset($_POST['book_time']) ? $_POST['book_time'] : null;
        $cust_name = isset($_POST['cust_name']) ? $_POST['cust_name'] : null;
        $cust_email = isset($_POST['cust_email']) ? $_POST['cust_email'] : null;
        $cust_phone = isset($_POST['cust_phone']) ? $_POST['cust_phone'] : null;

          // Check if the same date, time, and venue combination already exists
        if (!isBookingExists($conn, $venue_id, $booking_date, $booking_time, $venue_label)) {

            $token = $_POST["stripeToken"];
            $contact_name = $_POST['cust_name'];
            $token_card_type = $_POST["stripeTokenType"];
            $phone = ($_POST['cust_phone']);
            $email  = $_POST['cust_email'];
            $amount  = $_POST['venue_price']; 
            $desc = $_POST['venue_id'];
            $charge = \Stripe\Charge::create([
            "amount" => str_replace(",","",$amount) * 100,
            "currency" => 'myr',
            "description"=>$desc,
            "source"=> $token,
            ]);
    
                $stmt = $conn->prepare("INSERT INTO tbl_booking_sporty (FLD_BOOKINGID, FLD_CUSTUSERNAME, FLD_VENUEID, FLD_BOOKINGDATE, FLD_BOOKINGTIME, FLD_BOOKINGPRICE, FLD_VENUELABEL) VALUES (:booking_id, :custusername, :venue_id, :booking_date, :booking_time, :venue_price, :venue_label)");
                    $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);
                    $stmt->bindParam(':custusername', $sportyid, PDO::PARAM_STR);
                    $stmt->bindParam(':venue_id', $venue_id, PDO::PARAM_STR);
                    $stmt->bindParam(':venue_price', $venue_price, PDO::PARAM_INT);
                    $stmt->bindParam(':booking_date', $booking_date, PDO::PARAM_STR);
                    $stmt->bindParam(':booking_time', $booking_time, PDO::PARAM_STR);

                    // Assuming $venue_label contains the value you want to insert
                    $stmt->bindParam(':venue_label', $venue_label, PDO::PARAM_STR);
                    
                    $stmt->execute();


                    // $stmt2 = $conn->prepare("INSERT INTO tbl_sport_venue_management_sporty (FLD_ACCBALANCE) VALUES (:venue_price) WHERE FLD_MANAGEMENTID = :sportyid");
                    // $stmt2->bindParam(':venue_price', $venue_price, PDO::PARAM_INT);
                    // $stmt2->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
                    // $stmt2->execute();

                    echo '<script>';
echo 'alert("Booking successful! Your Booking ID is ' . $booking_id . ' ");';

// Add a delay of 3 seconds (3000 milliseconds) before redirecting
echo 'setTimeout(function() {';
echo '  window.location.href = "customerbooking.php";';
echo '}, 0);'; // 3000 milliseconds = 3 seconds

echo '</script>';
exit();
      
        
    } else {
            // Display an error message if the booking already exists
            //echo "Booking already exists for the selected date, time, and venue.";

            echo '<script>alert("Booking already exists for the selected date, time, and venue.");';
            echo 'window.location.href = "booking.php?venue_id=' . $venue_id . '";</script>';
        }
    } else {
        echo "Error generating Booking ID.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    // Handle the error as needed
}



// Function to check if a booking already exists for the specified date, time, and venue
function isBookingExists($conn, $venue_id, $booking_date, $booking_time, $venue_label) {
    // Use INNER JOIN to include the condition from tbl_venue_number
    $stmt = $conn->prepare("
        SELECT COUNT(*) 
        FROM tbl_booking_sporty AS booking
        WHERE booking.FLD_VENUEID = :venue_id 
        AND booking.FLD_BOOKINGDATE = :booking_date 
        AND booking.FLD_BOOKINGTIME = :booking_time
        AND booking.FLD_VENUELABEL = :venue_label
    ");
    $stmt->bindParam(':venue_id', $venue_id, PDO::PARAM_STR);
    $stmt->bindParam(':booking_date', $booking_date, PDO::PARAM_STR);
    $stmt->bindParam(':booking_time', $booking_time, PDO::PARAM_STR);
    $stmt->bindParam(':venue_label', $venue_label, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetchColumn();
    
    // If count is greater than 0, a booking already exists
    return ($count > 0);
}


function generateBookingId($conn) {
    try {
        $conn->beginTransaction();

        // Fetch the current counter value
        $stmt = $conn->query("SELECT COUNTER_VALUE FROM booking_counter_sporty WHERE COUNTER_ID = 2");
        
        if ($stmt) {
            $counter = $stmt->fetchColumn();

            // Increment the counter
            $counter++;

            // Update the counter value in the database
            $updateStmt = $conn->prepare("UPDATE booking_counter_sporty SET COUNTER_VALUE = :counter WHERE COUNTER_ID = 2");
            $updateStmt->bindParam(':counter', $counter, PDO::PARAM_INT);
            $updateStmt->execute();

            $conn->commit();

            // Format the booking ID with the static prefix and padded counter
            $bookingId = "B" . str_pad($counter, 3, '0', STR_PAD_LEFT);

            return $bookingId;
        } else {
            throw new Exception("Failed to execute query.");
        }
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
        return null;
    } catch (Exception $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
        return null;
    }
}
?>
