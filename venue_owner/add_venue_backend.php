<?php

if (isset($_POST['submit'])) {

    include "db.php";
    include "session.php";
   $sportyid = $_SESSION["sportyid"];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $venueid = generateVenueId($conn);

        // Handle file upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // File type validation
            $allowedTypes = ['image/jpeg', 'image/png'];

            if (!in_array($_FILES['image']['type'], $allowedTypes)) {
                echo "Invalid file type. Only JPEG and PNG files are allowed.";
                exit;
            }

            // File size limit (2MB)
            $maxFileSize = 2 * 1024 * 1024; // 2 MB

            if ($_FILES['image']['size'] > $maxFileSize) {
                echo "File size exceeds the maximum limit (2MB).";
                exit;
            }

            // Unique file names to avoid overwriting
            $image = uniqid() . '_' . $_FILES['image']['name'];
            $targetDirectory = "assets/img/venue/"; // Change this to your upload directory
            $targetFile = $targetDirectory . basename($image);

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "Sorry, there was an error uploading your file.";
                exit; // Exit the script if file upload fails
            }
        } else {
            echo "File upload failed or no file selected.";
            exit; // Exit the script if no file is selected
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO tbl_sport_venue_sporty(FLD_VENUEID, FLD_MANAGEMENTID,FLD_VENUETYPE, FLD_VENUENAME, FLD_VENUEADDRESS, FLD_VENUEPRICE, FLD_VENUEIMAGE, FLD_VENUEOPENTIME, FLD_VENUECLOSETIME, FLD_VENUETIMEGAP, FLD_VENUENUMBER) 
        VALUES (:venueid, :sportyid, :category, :venuename, :address, :price, :image, :otime, :ctime, :duration, :venuenumber)");

        // Bind the parameters
        $stmt->bindParam(':venueid', $venueid, PDO::PARAM_STR);
        $stmt->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':venuename', $venuename, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':otime', $otime, PDO::PARAM_STR);
        $stmt->bindParam(':ctime', $ctime, PDO::PARAM_STR);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_STR);
        $stmt->bindParam(':venuenumber', $venuenumber, PDO::PARAM_STR);

        // Give value to the variables
        // $venueid = $_POST['venueid'];
        $venuename = $_POST['venuename'];
        $address = $_POST['address'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $otime = $_POST['otime'];
        $ctime = $_POST['ctime'];
        $duration = $_POST['duration'];
        $venuenumber = $_POST['venuenumber'];

        $stmt->execute();

        for ($i = 1; $i <= $venuenumber; $i++) {

        $venueNumberid = generateVenueNumberId($conn);
        $venueLabel = generateAlphabetLabel($i);

        // Insert data into tbl_venue_number
        $stmt2 = $conn->prepare("INSERT INTO tbl_venue_number (FLD_VENUE_ID, FLD_VENUE_NUMBER_ID, FLD_VENUE_LABEL) VALUES (:venueid, :venueNumberid, :venueLabel)");

        
        // Bind parameters for the second table
        $stmt2->bindParam(':venueid', $venueid, PDO::PARAM_STR);
        $stmt2->bindParam(':venueNumberid', $venueNumberid, PDO::PARAM_STR);
        $stmt2->bindParam(':venueLabel', $venueLabel, PDO::PARAM_STR);

        // Execute the second table insertion
        $stmt2->execute();

        }

         header("Location: list_venue.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "Error: You have executed the wrong PHP. Please contact the web administrator.";
    die();
}

function generateVenueId($conn) {
    try {
        $conn->beginTransaction();

        // Fetch the current counter value
        $stmt = $conn->query("SELECT COUNTER_VALUE FROM booking_counter_sporty WHERE COUNTER_ID = 3");
        
        if ($stmt) {
            $counter = $stmt->fetchColumn();

            // Increment the counter
            $counter++;

            // Update the counter value in the database
            $updateStmt = $conn->prepare("UPDATE booking_counter_sporty SET COUNTER_VALUE = :counter WHERE COUNTER_ID = 3");
            $updateStmt->bindParam(':counter', $counter, PDO::PARAM_INT);
            $updateStmt->execute();

            $conn->commit();

            // Format the booking ID with the static prefix and padded counter
            $venueId = "V" . str_pad($counter, 3, '0', STR_PAD_LEFT);

            return $venueId;
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

function generateVenueNumberId($conn) {
    try {
        $conn->beginTransaction();

        // Fetch the current counter value
        $stmt = $conn->query("SELECT COUNTER_VALUE FROM booking_counter_sporty WHERE COUNTER_ID = 4");
        
        if ($stmt) {
            $counter = $stmt->fetchColumn();

            // Increment the counter
            $counter++;

            // Update the counter value in the database
            $updateStmt = $conn->prepare("UPDATE booking_counter_sporty SET COUNTER_VALUE = :counter WHERE COUNTER_ID = 4");
            $updateStmt->bindParam(':counter', $counter, PDO::PARAM_INT);
            $updateStmt->execute();

            $conn->commit();

            // Format the booking ID with the static prefix and padded counter
            $venueNumberId = "VN" . str_pad($counter, 3, '0', STR_PAD_LEFT);

            return $venueNumberId;
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

function generateAlphabetLabel($number) {
    $alphabet = range('A', 'Z');

    // Adjust the number to start from 0 (assuming 0 corresponds to 'A')
    $adjustedNumber = $number - 1;

    // Use modulo to handle cases where the number exceeds the length of the alphabet
    $index = $adjustedNumber % count($alphabet);

    return $alphabet[$index];
}


?>
