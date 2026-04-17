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

    <title>Sporty: Venue List</title>

    <link href="assets/img/bola.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Carlito&family=Inconsolata&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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

               <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Venue List</h1>
                    </div>

                <?php

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


                 echo'<div class="col-lg-6">';
                echo' <div class="card shadow mb-4" style="height :90%">';
                echo'<div class="card-header py-3">';
        echo'<h6 class="m-0 font-weight-bold text-primary">Venue Type : '. $venue['FLD_VENUETYPE'].'</h6>';
                echo'</div>';

                echo'<div class="card-body " style="height :90%">';

           
            echo'<div class="row">';
                echo'<div class="col-md-6">';
                    
                    echo'<img src="assets/img/venue/'.$venue['FLD_VENUEIMAGE'].' "class="img-fluid" alt="Card Image" style ="width : 300px; height : auto; max-width: 100%; display: block; margin: auto;">';
                echo'</div>';

                echo'<div class="col-md-6">';
                  
                   echo'<div class="form-group">';
                        echo'<p id="type">';
                            echo'<strong>'. $venue['FLD_VENUEID'] . '-'. $venue['FLD_VENUENAME'] . '</strong>';
                        echo'</p>';
                        echo'<p id="price">';
                            echo'<strong>Price per Session </strong> : RM'. $venue['FLD_VENUEPRICE'] .' / '. $venue['FLD_VENUETIMEGAP'] .'

                        </p>';

                        echo'<p id="address">';
                           echo '<strong>Address</strong> : '. $venue['FLD_VENUEADDRESS'] .'
                        </p>';

                         echo'<p id="time">';
                            echo '<strong>Operation Time</strong> : '. $venue['FLD_VENUEOPENTIME'] .'- '. $venue['FLD_VENUECLOSETIME'] .'
                        </p>';

                        echo'<p id="time">';
                            echo '<strong>Number of Venue</strong> : '. $venue['FLD_VENUENUMBER'] .'
                        </p>';

                    echo'&nbsp';
                    echo'<a href="edit_venue.php?id=' . $venue['FLD_VENUEID'] .'"class="btn btn-primary mr-2">';
                        echo'<i class="fas fa-edit"></i> Edit';
                    echo'</a>';

                    echo '<a href="delete_venue.php?id=' . $venue['FLD_VENUEID'] . '" class="btn btn-danger">';
                        echo'<i class="fas fa-trash-alt"></i> Delete';
                    echo'</a>';
                    

                    echo'</div>';
                echo'</div>';
            echo'</div>';

           
        echo'</div>';
    echo'</div>';
echo'</div>';

}


         echo '</div>';
    } else {
        echo "No records found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn = null;
}
?>
<!--sampai sini-->
                






















                    </div><!--Container Fluid-->     


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

</body>

</html>