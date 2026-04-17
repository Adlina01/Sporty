<?php
include "db.php";
include "session.php";
$sportyid = $_SESSION["sportyid"];
// require('config.php');

try {
    // Retrieve the venue ID from the URL parameter
    $venue_id = isset($_GET['venue_id']) ? $_GET['venue_id'] : null;
	// $venue_price = isset($_GET['venue_price']) ? $_GET['venue_price'] : null;
    

    if (!$venue_id) {
        // Handle the case where venue ID is not provided
        echo "Error: Venue ID not provided.";
        exit();
    }

    // Example query to retrieve venue details based on the venue ID
    $stmt_venue_details = $conn->prepare("SELECT * FROM tbl_sport_venue_sporty WHERE FLD_VENUEID = :venue_id");
    $stmt_venue_details->bindParam(':venue_id', $venue_id, PDO::PARAM_STR);
    $stmt_venue_details->execute();

		// Debugging: Print the SQL query
		// echo $stmt_venue_details->queryString;

    $venue_details = $stmt_venue_details->fetch(PDO::FETCH_ASSOC);

    $venue_price = $venue_details['FLD_VENUEPRICE'];
    $venue_price2 = $venue_details['FLD_VENUEPRICE'];
    $venue_name = $venue_details['FLD_VENUENAME'];

    $stmt2 = $conn->prepare("SELECT * FROM tbl_venue_number WHERE FLD_VENUE_ID = :venue_id");
    $stmt2->bindParam(':venue_id', $venue_id, PDO::PARAM_STR);
    $stmt2->execute();

    // echo $stmt2->queryString;

    // $venue_numbers = $stmt2->fetch(PDO::FETCH_ASSOC);

    // $venue_label = $venue_number['FLDVENUE_LABEL'];

    $stmt3 = $conn->prepare("SELECT * FROM tbl_customer_sporty WHERE FLD_CUSTUSERNAME = :sportyid");
    $stmt3->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
    $stmt3->execute();

    // echo $stmt3->queryString;

    $cust_details = $stmt3->fetch(PDO::FETCH_ASSOC);
    $cust_email = $cust_details['FLD_CUSTEMAIL'];
    $cust_phone = $cust_details['FLD_CUSTPHONE'];
    $cust_name = $cust_details['FLD_CUSTNAME'];


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sporty: Booking</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/bola.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> 
 
  <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<style>
	

	  .flex-container {
	  	width: 100%;
        margin: 0 auto;
	    display: flex;
	    background-color: white;
	    justify-content: center;
	  }
	  .flex-container > div {
	    background-color: #f1f1f1;
	    margin: 5px;
	    padding: 20px;
	    font-size: 30px;
	  }
	  .leading {
	    border-bottom: 5px solid #ccc;
	    padding: 10px;
	    line-height: 2;
	    display: flex;
	    justify-content: flex-start;
	    flex-direction: row;
	    flex-wrap: wrap;
	    margin-bottom: 0px;
	    cursor: pointer;
	    transition: all 0.5s;
	    -webkit-transition: all 0.5s;
	  }

      .responsive {
		  width: 100%;
		  max-width: 400px;
		  height: auto;
		  border-radius: 5px;
		}

	  .venue_detail {
	    line-height: 1.0;
	    flex: 10 0 0;
	    font-size: 15px;
	    color: #000000;
	    padding-left: 30px;
	  }

	  	div.elem-group {
		  margin: 20px 0;
		  font-size: 1.30em;
		}
		

		.button {
			       width: 50%;
            padding: 10px;
            background-color: #e96b56; 
            color: #fff;
            text-align: center;
            text-decoration: none;
            display: block;
            justify-content: center;
		}
		.vertical-center {
		  text-align: center;
		}
    
	  .card-body{
	    padding:5px;
	  }

    /* Style for the date input */
#book_date {
  width: 85%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
}

/* Style for the select dropdown */
#book_time {
  width: 85%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
  position: relative;
}

/* Style for the dropdown arrow */
#book_time::after {
  content: "\25BC"; /* Unicode character for a downward-pointing triangle */
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  pointer-events: none;
}

/* Style for the dropdown options */
#book_time option {
  background-color: #fff;
  color: #000;
}

/* Style for the dropdown on hover */
#book_time:hover,
#book_time:focus {
  border-color: #e96b56;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

/* Style for the selected option */
#book_time option:checked {
  background-color: #e96b56;
  color: #fff;
}

/* Style for the select dropdown */
#venue_label {
  width: 85%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
  position: relative;
}

/* Style for the dropdown arrow */
#venue_label::after {
  content: "\25BC"; /* Unicode character for a downward-pointing triangle */
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  pointer-events: none;
}

/* Style for the dropdown options */
#venue_label option {
  background-color: #fff;
  color: #000;
}

/* Style for the dropdown on hover */
#venue_label:hover,
#venue_label:focus {
  border-color: #e96b56;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

/* Style for the selected option */
#venue_label option:checked {
  background-color: #e96b56;
  color: #fff;
}

.portfolio-info {
        margin-bottom: 10px; /* Adjust the value to your desired margin */
    }
</style
	</style>

</head>
<body>

<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">Sporty</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index_cust.php">Home</a></li>
          
          <li><a href="browsevenue_cust.php">Explore</a></li>
          
          <li><a href="about_cust.php">About</a></li>

          <li><a href="customerbooking.php">My Booking</a></li>
          
           <li><a class="getstarted scrollto" href="#" onclick="confirmLogout()">Log out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

     <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Booking</li>
        </ol>
        <h2>Venue Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/venue/<?php echo $venue_details['FLD_VENUEIMAGE']; ?>" class="responsive"style="max-width: 100%; height: auto;">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Venue Details</h3>
              <ul>
                <li><strong>Name</strong>: <?php echo $venue_details['FLD_VENUENAME']; ?></li>
                <li><strong>Address</strong>: <?php echo $venue_details['FLD_VENUEADDRESS']; ?></li>
                <li><strong>Venue Type</strong>: <?php echo $venue_details['FLD_VENUETYPE']; ?></li>
                <li><strong>Price</strong>: RM<?php echo $venue_details['FLD_VENUEPRICE'] . ' / ' . $venue_details['FLD_VENUETIMEGAP']; ?> </li>
              </ul>
            </div>

            <form autocomplete="off" action="booking_process.php" method="post">
                                  <input type="hidden" name="venue_id" value="<?php echo $venue_id; ?>">
                                <input type="hidden" name="venue_price" value="<?php echo $venue_price; ?>">
                                <input type="hidden" name="venue_name" value="<?php echo $venue_name; ?>">
                                <input type="hidden" name="cust_name" value="<?php echo $cust_name; ?>">
                                <input type="hidden" name="cust_email" value="<?php echo $cust_email; ?>">
                                <input type="hidden" name="cust_phone" value="<?php echo $cust_phone; ?>">

                                 <div class="portfolio-info">
              <h3>Booking Details</h3>
              <ul>
               
                              

                               <input style="width: 85%" type="date" name="book_date" required id="book_date" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" onchange="updateTimeSlots(<?php echo json_encode($venue_id); ?>, this.value, $('#venue_label').val())">


                <li><strong>Select Time</strong>: <select style="width: 85%" name="book_time" required id="book_time">

                </select> </li>

               <?php if ($venue_details['FLD_VENUENUMBER'] > 1): ?>
    <!-- Display the "Select Court" section if the condition is true -->
    <li>
        <strong>Select Court</strong>:
        <select style="width: 85%" name="venue_label" required id="venue_label" onchange="updateTimeSlots(<?php echo json_encode($venue_id); ?>, $('#book_date').val(), this.value)">
            <?php
            // Iterate over the fetched records to populate the dropdown
            while ($venue_number = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $venue_label = $venue_number['FLD_VENUE_LABEL'];
                echo "<option value=\"$venue_label\">$venue_label</option>";
            }
            ?>
        </select>
    </li>
<?php else: ?>
    <script>
        // Call updateTimeSlots with default value "A"
        updateTimeSlots(<?php echo json_encode($venue_id); ?>, $('#book_date').val(),"A");
    </script>
<?php endif; ?>
                
                
              </ul>
            </div>

            
             
                       
          <!-- Pay Button (Aligned to the Right) -->
                            <div class="text-end">
                              <!-- <button type="button" class="btn btn-danger" onclick="cancelPayment()">Cancel</button> -->
                                <!-- <button type="submit" class="btn btn-primary"  onclick="return confirmPayment()">Pay Now</button> -->
                                
                                   <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                data-key="pk_test_51OTPpaGc4xZv66DfTls8MdNT6OEefKeEXZmxqquMDbqYHPu1oxOs95mV7mi7pUxbZ5itfSRsoqwNDWWTQDCQXoWG00gpBKSVhM"
                data-amount=<?php echo str_replace(",","",$venue_price2) * 100?>
                data-name="<?php echo $venue_details['FLD_VENUENAME']?>"
                data-image="assets/img/venue/<?php echo $venue_details['FLD_VENUEIMAGE']; ?>"
                data-email="<?php echo $cust_email?>"
                data-currency="myr"
                data-locale="auto">
                </script>

               
                            </form>
             
            </div>
 
        </div>

     


    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   
<script>

$(document).ready(function () {
    updateTimeSlots(<?php echo json_encode($venue_id); ?>, $('#book_date').val(), $('#venue_label').val());

    // Event handler for date change
    $('#book_date').on('change', function () {
        // Get the selected date
        var bookDate = $(this).val();

        // Update time slots using the selected sport venue ID, date, and selected court
        updateTimeSlots(<?php echo json_encode($venue_id); ?>, bookDate, $('#venue_label').val());

      
    });

     
    // Event handler for court change
    $('#venue_label').on('change', function () {
        // Get the selected court
        var selectVenue = $(this).val();

        // Update time slots using the selected sport venue ID, date, and selected court
        updateTimeSlots(<?php echo json_encode($venue_id); ?>, $('#book_date').val(), selectVenue);

          
    });

    function updateTimeSlots(sportVenueId, bookDate, selectVenue) {
    // Use AJAX to fetch time slots based on the selected sport venue and date
    $.ajax({
        url: 'fetch_time_slots.php', // Replace with the actual PHP file that fetches time slots
        type: 'POST',
        data: {
            sportVenueId: sportVenueId,
            bookDate: bookDate, // Add bookDate to the data object
            selectVenue: selectVenue
        },
        success: function (response) {
            // Debugging: Log the response to the console
            console.log(response);

            // Update the time_slot select element with the fetched time slots
            $('#book_time').html(response);
        },
        error: function (xhr, status, error) {
            // Debugging: Log the error to the console
            console.error(xhr.responseText);

            alert('Error fetching time slots');
        }
    });
}
});

function confirmPayment() {
    return confirm("Are you sure you want to book this venue?");
}

function cancelPayment() {
    var confirmCancel = confirm("Are you sure you want to cancel?");
    // Redirect the user to another page (e.g., index.php)

    // If the user confirms, redirect to another page (e.g., index.php)
    if (confirmCancel) {
        window.location.href = 'browsevenue_cust.php';  // Change 'index.php' to the desired page
    }
}

 function confirmLogout() {
    var confirmLogout = confirm("Are you sure you want to log out?");
    if (confirmLogout) {
        window.location.href = "logout.php"; // Redirect to the logout page
    } else {
        // Do nothing or add additional logic as needed
    }
}

// document.addEventListener("DOMContentLoaded", function() {
//     // Call updateDescription on page load
//     updateDescription();

//     // Attach the updateDescription function to the onchange events
//     document.getElementById("book_date").addEventListener("change", updateDescription);
//     document.getElementById("book_time").addEventListener("change", updateDescription);
//     document.getElementById("venue_label").addEventListener("change", updateDescription);
// });


// function updateDescription() {
//     // Get the selected date, time, and court
//     var selectedDate = document.getElementById("book_date").value;
//     var selectedTime = document.getElementById("book_time").value;
//     var selectedCourt = document.getElementById("venue_label").value;

//     // Get the venue name (you can customize this based on your actual HTML structure)
//     var venueName = "<?php echo $venue_details['FLD_VENUENAME']?>";

//     // Update the data-description attribute
//     var stripeButton = document.querySelector('.stripe-button');
//     stripeButton.setAttribute('data-description', venueName + ' - ' + selectedDate + ' ' + selectedTime + ' - Court ' + selectedCourt);
// }


</script>



</body>
</html>