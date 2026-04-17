<?php 

include "db.php";
include "session.php";
$sportyid = $_SESSION["sportyid"];


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sporty: Update Schedule</title>

    <link href="assets/img/bola.png" rel="icon">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Carlito&family=Inconsolata&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <style type="text/css">

        .form-group legend {
    font-size: 1.3em;
    margin-bottom: 8px;
    font-family: 'Carlito', sans-serif;
    }

    .form-group .number {
    background: #e74a3b;
    color: #fff;
    height: 25px;
    width: 25px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 3px;
    line-height: 25px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
    
}


    .centered-button {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

   
    .btn-fancy {
        background-color: #3498db; 
        color: white; /* White text color */
        padding: 10px 30px; /* Padding around the text, adjusted for more width */
        font-size: 16px; /* Font size */
        border-radius: 5px; 
        cursor: pointer; 
        border: none; 
    }

    
    .btn-fancy:hover {
        background-color: #2980b9; 
    }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-volleyball-ball"></i>
                </div>
                <div class="sidebar-brand-text mx-3">S P O R T Y</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index_sm.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Nav Item - My Profile -->
            <li class="nav-item">
                <a class="nav-link" href="my_profile.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - List Venue -->
            <li class="nav-item">
                <a class="nav-link" href="list_venue.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>List Venue</span></a>
            </li>

            <!-- Nav Item - Add Venue -->
            <li class="nav-item">
                <a class="nav-link" href="add_venue.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Venue</span></a>
            </li>

            <!-- Nav Item - Update Schedule -->
            <li class="nav-item">
                <a class="nav-link" href="update_schedule2.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Update Schedule</span></a>
            </li>

             <!-- Nav Item - Booking History -->
            <li class="nav-item">
                <a class="nav-link" href="list_booking.php">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Booking History</span></a>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                          <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-0.5 d-none d-lg-inline text-gray-900 small" style="font-size: 16px;">Hello, Admin!</span>
                                
                            </a>

                           


                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                          <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                           <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" style="color: black;">
                    <i class="fas fa-sign-out-alt fa-fw"></i>
                    Logout
                    </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                </div>
                <!-- /.container-fluid -->

                <!-- Page Heading -->
                    
                <div class="container">
                <div class="row">
                <div class="col-lg-8"  style="margin-right: 100px; margin-left: 120px;">
                <div class="card shadow" style="background-color: #fcfafa; border: 1px solid #dee2e6;">
                  <div class="card-body">

                    <h1 class="h3 mb-4 text-gray-800 font-weight-bold" style="font-family: 'Signika Negative', sans-serif;">UPDATE SCHEDULE</h1>


                    <h5 class="card-title font-weight-bold" style="font-family: 'Inconsolata', monospace;">Please select the venue and date to update</h5>

                    <!-- Divider -->
                    <div class="mb-4"></div>

                     <!-- Add Venue Form -->
                

                <!--Form-->
                 <form action="update_schedule_backend.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                 <div class="row">

                     <!--Venue ID & Venue Name-->
                    <div class="col-md-6">
                        <legend><span class="number">1</span>Venue Name</legend>
                        <select class="form-control select2-no-search" name="venuename" id="venueSelect" required>
                            <option label="Choose one"></option>
                                <?php
                                    // Establish a connection to the database
                                     try {
        
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                        // Fetch all data from the table
                                        $stmt = $conn->prepare("SELECT * FROM tbl_sport_venue_sporty WHERE FLD_MANAGEMENTID = :sportyid");
                                        $stmt->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
                                        $stmt->execute();
                                        $venues = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        if (!empty($venues)) {
                                        echo '<div class="row">';

                                         foreach ($venues as $venue) {

                                            echo '<option value="' . $venue["FLD_VENUEID"] . '">' . $venue["FLD_VENUENAME"] . '</option>';


                                        }
                                        } else {
                                            echo "No records found.";
                                        }

                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    } finally {
                                        $conn = null;
                                    }
                                ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <legend><span class="number">2</span>Venue ID</legend>
                        <input type="text" class="form-control" id="venueid" name="venueid" readonly>
                     </div>

                  </div>
                </div>

            <!--Venue Address -->
            <div class="form-group">  
            <legend><span class="number">3</span>Venue Address</legend>
           <textarea rows="3" class="form-control" id="address" name="address" readonly></textarea>
            </div>

            <!-- Display the "Select Court" section if the condition is true -->
            <div class="form-group">  
                <legend><span class="number">4</span>Date</legend>
                <input class="form-control select2-no-search" type="date" id="date" name="date"/>
            </div>

            <!--Date & Time Slots-->
            <div class="form-group">    
                 <div class="row">

                    <div class="col-md-6">
                        <legend><span class="number">5</span>Select Court</legend>

                        <select class="form-control select2-no-search" id="venue_label" name="venue_label" required >
                            <option label="Choose one"></option>
                            
                        </select>
                        
                    </div>

                    <div class="col-md-6">
                    <legend><span class="number">6</span>Time Slots</legend>
                    <select class="form-control select2-no-search" id="timeslot" name="timeslot" required>
                    <option label="Choose one"></option>
                    
                    </select>
                    </div>

                  </div>
            </div>

            <!--Open time & Close Time-->

                <!--submit button-->
                <div class="centered-button">
                <button type="submit" name="submit" class="btn btn-fancy">Update</button>
                </div>
            </form>
            <!-- End Basic Form -->
                </div>
            </div>
        </div>
    </div>
</div>



            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Script to set minutes to 0 -->
<script>

$(document).ready(function () {
    $('#venueSelect').select();

    $('#venueSelect').on('change', function () {
      var selectedVenueId = $(this).val();
      $('#venueid').val(selectedVenueId);

      // Fetch venue address using AJAX
      $.ajax({
        type: "POST",
        url: "getVenueAddress.php",  // Replace with the actual server-side script to fetch venue address
        data: { venueId: selectedVenueId },
        success: function (response) {
          $('#address').val(response);
        },
        error: function () {
          console.log("Error fetching venue address");
        }
      });

      // Fetch venue_label using AJAX
        $.ajax({
          type: "POST",
          url: "getVenueLable.php",  // Replace with the actual server-side script to fetch venue label
          data: { venueId: selectedVenueId },
          success: function (labelResponse) {
            // console.log("Label response:", labelResponse);

            $('#venue_label').empty();
                // Iterate through the array and append options to the dropdown
                labelResponse.forEach(function (labelObject) {
                    $('#venue_label').append('<option value="' + labelObject.FLD_VENUE_LABEL + '">' + labelObject.FLD_VENUE_LABEL + '</option>');
                });
                $('#venue_label').trigger('change');
          },
          error: function () {
            console.log("Error fetching venue label");

          }
        });


        // Event handler for date change
        $('#date').on('change', function () {
            // Get the selected date
            var bookDate = $(this).val();

            // Get the venue ID from the data attribute
            var sportVenueId = selectedVenueId;

            // Update time slots using the selected sport venue ID, date, and selected court
            updateTimeSlots(sportVenueId, bookDate, $('#venue_label').val());
        });

        // Event handler for court change
        $('#venue_label').on('change', function () {
            // Get the selected court
            var selectVenue = $(this).val();

            // Update time slots using the selected sport venue ID, date, and selected court
            updateTimeSlots(selectedVenueId, $('#date').val(), selectVenue);
        });

        function updateTimeSlots(sportVenueId, bookDate, selectVenue) {
            // Use AJAX to fetch time slots based on the selected sport venue and date
            $.ajax({
                url: 'fetch_time_slots2.php', // Replace with the actual PHP file that fetches time slots
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
                    $('#timeslot').html(response);
                },
                error: function (xhr, status, error) {
                    // Debugging: Log the error to the console
                    console.error(xhr.responseText);

                    alert('Error fetching time slots');
                }
            });
        }


    });
  });
</script>

</body>

</html>