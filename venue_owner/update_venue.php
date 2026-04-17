<?php
// Include your database connection file
include "db.php";
include "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Extract data from the form
    $venueId = $_POST['venueid'];
    $venuename = $_POST['venuename'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $otime = $_POST['otime'];
    $ctime = $_POST['ctime'];
    $duration = $_POST['duration'];

    // Handle image upload
    $targetDirectory = "assets/img/venue/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if a new image file is provided
    if (!empty($_FILES["image"]["tmp_name"])) {
        // Check file size (adjust as needed)
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        // Allow only certain file formats (you can customize this)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }

        // Update the venue information including the image
        $image = $_FILES["image"]["name"];
        $updateImage = true;
    } else {
        // Update the venue information without changing the image
        $updateImage = false;
    }

    // Database connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update the venue information in the database
        if ($updateImage) {
            $stmt = $conn->prepare("UPDATE tbl_sport_venue_sporty SET 
                FLD_VENUENAME = :venuename,
                FLD_VENUEADDRESS = :address,
                FLD_VENUEPRICE = :price,
                FLD_VENUETYPE = :category,
                FLD_VENUEOPENTIME = :otime,
                FLD_VENUECLOSETIME = :ctime,
                FLD_VENUETIMEGAP = :duration,
                FLD_VENUEIMAGE = :image
                WHERE FLD_VENUEID = :venueId");
        } else {
            $stmt = $conn->prepare("UPDATE tbl_sport_venue_sporty SET 
                FLD_VENUENAME = :venuename,
                FLD_VENUEADDRESS = :address,
                FLD_VENUEPRICE = :price,
                FLD_VENUETYPE = :category,
                FLD_VENUEOPENTIME = :otime,
                FLD_VENUECLOSETIME = :ctime,
                FLD_VENUETIMEGAP = :duration
                WHERE FLD_VENUEID = :venueId");
        }

        $stmt->bindParam(':venueId', $venueId, PDO::PARAM_STR);
        $stmt->bindParam(':venuename', $venuename, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':otime', $otime, PDO::PARAM_STR);
        $stmt->bindParam(':ctime', $ctime, PDO::PARAM_STR);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_STR);

        if ($updateImage) {
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        }

        $stmt->execute();

            echo '<script>';
            echo 'alert("Venue updated succesfully");';
            echo 'window.location.href = "list_venue.php";';
            echo '</script>';

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    // Handle the case where the form is not submitted properly
    echo "Invalid request. Please submit the update form.";
}
?>