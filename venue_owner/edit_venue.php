<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sporty : Edit Venue</title>

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


    .right-aligned-button {
        display: flex;
        justify-content: flex-end;
        margin-top: 5px;
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
                <a class="nav-link" href="#">
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

                        <!-- Nav Item - Alerts -->
                       

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

                    <h1 class="h3 mb-4 text-gray-800 font-weight-bold" style="font-family: 'Signika Negative', sans-serif;">EDIT VENUE</h1>


                    <h5 class="card-title font-weight-bold" style="font-family: 'Inconsolata', monospace;">Please update all the information below</h5>

                    <!-- Divider -->
                    <div class="mb-4"></div>

                     <!-- Add Venue Form -->
                        <?php
                     // Include your database connection file
                     include "db.php";


                    // Check if the venue ID is provided in the URL
                    if (isset($_GET['id'])) {
                     // Retrieve the venue ID from the URL
                    $venueId = $_GET['id'];

                    // Database connection
                    try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                 // Retrieve existing venue data based on the venue ID
                    $stmt = $conn->prepare("SELECT * FROM tbl_sport_venue_sporty WHERE FLD_VENUEID = :venueId");
                    $stmt->bindParam(':venueId', $venueId, PDO::PARAM_STR);
                    $stmt->execute();

                // Fetch the data
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Check if data is found
                    if ($row) {
                    // Display the edit form with existing data
                    ?>

                <!--Venue ID & Venue Name-->
                 <form action="update_venue.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                 <div class="row">

                     <!--Venue ID & Venue Name-->
                    <div class="col-md-6">
                    <legend><span class="number">1</span>Venue ID</legend>
                    <input type="text" class="form-control" id="venueid" name="venueid" placeholder="ex: V000" value="<?php echo $row['FLD_VENUEID']; ?>" readonly>
                 </div>

                <div class="col-md-6">
                <legend><span class="number">2</span>Venue Name</legend>
                <input type="text" class="form-control" id="venuename" name="venuename" placeholder="ex : Futsal Kpz" value="<?php echo $row['FLD_VENUENAME']; ?>" required>
                </div>
              </div>
            </div>

            <!--Venue Address -->
            <div class="form-group">  
            <legend><span class="number">3</span>Venue Address</legend>
           <textarea rows="3" class="form-control" id="address" name="address" placeholder="ex : Gelanggang Futsal, Kolej Pendeta Za'ba, 43600 UKM Bangi " reuired><?php echo $row['FLD_VENUEADDRESS']; ?></textarea>
            </div>

            <!--Price & Category-->
            <div class="form-group">    
                 <div class="row">
                    <div class="col-md-6">
                    <legend><span class="number">4</span>Price (RM)</legend>
                    <input type="text" class="form-control" id="price"name="price" placeholder="ex : 00.00" value="<?php echo $row['FLD_VENUEPRICE']; ?>" required>
                    </div>

                    <div class="col-md-6">
                    <legend><span class="number">5</span>Category</legend>
                    <select class="form-control select2-no-search" name="category" required>
                    <option label="Choose one"></option>
                    <option value="Badminton" <?php echo ($row['FLD_VENUETYPE'] == 'Badminton') ? 'selected' : ''; ?>>Badminton</option>
                    <option value="Soccer" <?php echo ($row['FLD_VENUETYPE'] == 'Soccer') ? 
                        'selected' : ''; ?>>Soccer</option>
                    <option value="Tennis" <?php echo ($row['FLD_VENUETYPE'] == 'Tennis') ? 'selected' : ''; ?>>Tennis</option>
                    <option value="Futsal" <?php echo ($row['FLD_VENUETYPE'] == 'Futsal') ? '
                        selected' : ''; ?>>Futsal</option>
                    </select>
                    </div>
                  </div>
            </div>

            <!--Open time & Close Time-->

              <div class="form-group">    
                 <div class="row">
                    <div class="col-md-6">
                    <legend><span class="number">6</span>Open Time</legend>
                    <input class="form-control" id="otime" name="otime" type="time" value="<?php echo $row['FLD_VENUEOPENTIME']; ?>" required>
                    </div>

                     <div class="col-md-6">
                    <legend><span class="number">7</span>Close Time</legend>
                    <input class="form-control" id="ctime" name="ctime" type="time" value="<?php echo $row['FLD_VENUECLOSETIME']; ?>" required>
                    </div>
                </div>
              </div>

              <!--Duration & Venue Image-->
              <div class="form-group">    
                 <div class="row">
                    <div class="col-md-6">
                    <legend><span class="number">8</span>Duration</legend>
                    <select class="form-control select2-no-search" id="duration" name="duration" required>
                    <option label="Choose one"></option>
                    <option value="1 hour" <?php echo ($row['FLD_VENUETIMEGAP'] == '1 hour') ? 'selected' : ''; ?>>1 hour</option>
                    <option value="2 hours" <?php echo ($row['FLD_VENUETIMEGAP'] == '2 hours') ? 'selected' : ''; ?>>2 hours</option>
                    <option value="3 hours" <?php echo ($row['FLD_VENUETIMEGAP'] == '3 hours') ? 'selected' : ''; ?>>3 hours</option>
                    </select>
                    </div>

                     <div class="col-md-6">
                    <legend><span class="number">9</span>Venue Image</legend>
                    <input type="file" id="image" name="image" >
                     <!-- Display current file name -->
                    <?php
                    $currentFileName = $row['FLD_VENUEIMAGE'];
                    if (!empty($currentFileName)) {
                    echo '<p>Current File: ' . $currentFileName . '</p>';
                     }
                    ?>
                    </div>
                </div>
              </div>  

              <div class= row>
              <!--edit button-->
                <div class="right-aligned-button" style="margin-left : 220px;">
                <a href="list_venue.php" class="btn btn-fancy" style="background-color: 
                #ff0000; ">Cancel</a>
                </div>

                <!--submit button-->
                <div class="right-aligned-button" style="margin-left : 20px;">
                <button type="submit" name="update" class="btn btn-fancy" style="background-color: #0722ba;">Update</button>
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