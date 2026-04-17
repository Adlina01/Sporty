<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Sporty - Edit Profile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Carlito&family=Inconsolata&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <style type="text/css">

        .form-group legend {
    font-size: 1.3em;
    margin-bottom: 8px;
    font-family: 'Carlito', sans-serif;
    }

    

    .centered-button {
        display: flex;
        justify-content: center;
        margin-top: 30px;
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

    h5{
        font-family: 'Ubuntu', sans-serif;
    }

    .text-center {
      text-align: center;
      margin-bottom: 20px; /* Adjust the margin as needed to create a gap */
    }

   input {
      
      text-align: center;
  }
      
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_sm.php">
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
                <a class="nav-link" href="update_schedule.php">
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

                             <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw" style="color: black;"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">+1</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown" style="color: red;">
                                <h6 class="dropdown-header">
                                    Notification

                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                            </div>
                        </li>


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
            

                    <h1 class="h3 mb-4 text-gray-800 font-weight-bold text-center" style="font-family: 'Signika Negative', sans-serif;" >E D I T &nbsp P R O F I L E</h1>

                   

                    <!-- Divider -->
                    <div class="mb-5"></div>

                       <?php
                     // Include your database connection file
                     include "db.php";


                    // Check if the venue ID is provided in the URL
                    if (isset($_GET['id'])) {
                     // Retrieve the venue ID from the URL
                    $sportyId = $_GET['id'];

                    // Database connection
                    try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                 // Retrieve existing venue data based on the venue ID
                    $stmt = $conn->prepare("SELECT FLD_MANAGEMENTID, FLD_MANAGEMENTNAME, FLD_MANAGEMENTPHONE, FLD_MANAGEMENTEMAIL, FLD_ACCBALANCE FROM tbl_sport_venue_management_sporty WHERE FLD_MANAGEMENTID = :sportyId");
                    $stmt->bindParam(':sportyId', $sportyId, PDO::PARAM_STR);
                    $stmt->execute();

                // Fetch the data
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Check if data is found
                    if ($row) {
                    // Display the edit form with existing data
                    ?>

                    <form action="update_profile.php" method="post" enctype="multipart/form-data">
                    <div class="text-center">
                    <h5>ID Number</h5>
                    <input type="text" id="managementId" name="managementId" style="width: 250px" value="<?php echo $row['FLD_MANAGEMENTID']; ?>" disabled>
                    </div>


                    <div class="text-center">
                   <h5>Name</h5>
                    <input type="text" id="managementName" name="managementName" style="width: 250px; border: 1px solid #95989c;" value="<?php echo $row['FLD_MANAGEMENTNAME']; ?>">
                    </div>

                    <div class="text-center">
                   <h5>Phone Number</h5>
                    <input type="text" id="managementPhone" name="managementPhone" style="width: 250px; border: 1px solid #95989c;" pattern="[0-9]{11}" value="<?php echo $row['FLD_MANAGEMENTPHONE']; ?>">
                    </div>

                    <div class="text-center">
                   <h5>Email</h5>
                   <input type="email" id="managementEmail" name="managementEmail" style="width: 250px; border: 1px solid #95989c;" value="<?php echo $row['FLD_MANAGEMENTEMAIL']; ?>">
                    </div>

                   
                    <div class="text-center">
                   <h5>Balance Account</h5>
                    <input type="text" id="accbalance" name="accbalance" style="width: 250px;" value="<?php echo $row['FLD_ACCBALANCE']; ?>" disabled>
                    </div>
                  
        
                <!--submit button-->
                   <div class="centered-button">

                <!--edit button-->
                
                <a href="my_profile.php" class="btn btn-fancy" style="background-color: 
                #ff0000; ">Cancel</a>
               
                
                <button type="submit" name="update" class="btn btn-sm btn-primary ml-3" style="background-color: #0722ba;"><i class="fas fa-user-edit fa-sm text-white-50"></i>Edit Profile</button>
                </div>

                
                </div>
            </form>

            <?php
            } else {
                echo "Venue not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    } else {
        echo "Venue ID not provided.";
    }
    ?>
           
           
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

</body>

</html>