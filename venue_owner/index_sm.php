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

    <title>Sporty: Dashboard</title>

    <link href="assets/img/bola.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_sm.php">
                <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-volleyball-ball"></i>
                </div>
                <div class="sidebar-brand-text mx-3">S P O R T Y </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

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



                <?php
                    // Establish a connection to the database
                     try {

                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Fetch all data from the table
                        $stmt = $conn->prepare("SELECT COUNT(*) as totalVenues FROM tbl_sport_venue_sporty WHERE FLD_MANAGEMENTID = :sportyid");
                        $stmt->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $totalVenues = $row['totalVenues'];


                        $stmtBooking = $conn->prepare("SELECT COUNT(*) as totalBookings FROM tbl_booking_sporty b
                               JOIN tbl_sport_venue_sporty v ON b.FLD_VENUEID = v.FLD_VENUEID
                               WHERE v.FLD_MANAGEMENTID = :sportyid");
                        $stmtBooking->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
                        $stmtBooking->execute();

                        $rowBooking = $stmtBooking->fetch(PDO::FETCH_ASSOC);
                        $totalBookings = $rowBooking['totalBookings'];


                        $stmtCommission = $conn->prepare("SELECT SUM(FLD_BOOKINGPRICE) as totalCommission FROM tbl_booking_sporty b
                               JOIN tbl_sport_venue_sporty v ON b.FLD_VENUEID = v.FLD_VENUEID
                               WHERE v.FLD_MANAGEMENTID = :sportyid");
                        $stmtCommission->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
                        $stmtCommission->execute();

                        $rowCommission = $stmtCommission->fetch(PDO::FETCH_ASSOC);
                        $totalCommission = $rowCommission['totalCommission'];


                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    } finally {
                        $conn = null;
                    }
                ?>

              <div class="container-fluid">

    <!-- Page Heading and Card/Button in the same row -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <!-- Overview Heading -->
        <h1 class="h3 mb-0 text-gray-900 font-weight-bold">Overview</h1>


    <!-- Small Card with Withdraw Button -->
        <div class="card" style="height: 100px; width:270px;/* font-family: 'Inconsolata';*/background-color: #ffff"> <!-- Adjust the height as needed -->
            <div class="card border-left-danger shadow h-100 py-2">
            
            <div class="card-body">
                <div style="padding-left: 3px;" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Filter Display</div>

                <div class="form-group">

                    <select style="border: none;" id="monthFilter">
                        <option value="All">All</option>
                        <option value="1">JANUARY</option>
                        <option value="2">FEBRUARY</option>
                        <option value="3">MARCH</option>
                        <option value="4">APRIL</option>
                        <option value="5">MAY</option>
                        <option value="6">JUNE</option>
                        <option value="7">JULY</option>
                        <option value="8">AUGUST</option>
                        <option value="9">SEPTEMBER</option>
                        <option value="10">OCTOBER</option>
                        <option value="11">NOVEMBER</option>
                        <option value="12">DECEMBER</option>
                    </select>
                </div>
               
            </div>
            </div>

</div>

    </div>

         <!-- Content Row -->
                    <div id="contentContainer" class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total All Venues</div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">10 venues</div> -->
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalVenues; ?> venues</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table-tennis fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Booking </div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">10 venue</div> -->
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalBookings; ?> bookings</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Commission </div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">RM 300</div> -->
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM <?php echo $totalCommission; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                    </div><!--row-->

                    <!-- Content Row -->

                    <div class="row">

                        <div class="col-xl-12 col-lg-7" style="width: 150%;">

                       
                            <!-- Bar Chart (nak custom kat bar_chart.js)-->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Booking Court By Month</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!--row atas-->

                    <div class=row>
                    
                        <div class="col-xl-8 col-lg-7">

                             

                              <!-- Area Chart (nak custom kat area_chart1.js)-->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Commission By Month</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="height :310px;">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>


                        </div>
                 
           
                        <!-- Pie Chart (nak custom kat pie_chart_new.js)-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Type of Sport Venue</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart" style="height :300px;"></canvas>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="row">

                        <div class="col-xl-12 col-lg-7" style="width: 150%;">

                            <!-- Bar Chart (nak custom kat bar_chart_new.js) -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Booking By Customer</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart1"></canvas>

                                    </div>
                                </div>
                            </div>

                          
                        </div>

                    </div><!--row atas-->

                   

                </div><!--Jangan delete-->
                <!-- /.container-fluid -->

            </div><!--Jangan Delete-->
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
    <!-- <script src="js/demo/bar_graph.js"></script> -->
    <!-- <script src="js/demo/chart-bar-demo.js"></script> -->
    <!-- <script src="bar_graph.js"></script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initial load
            updateContent();

            // Add event listener for month filter change
            document.getElementById('monthFilter').addEventListener('change', function () {
                updateContent();
            });

            function updateContent() {
                var selectedMonth = document.getElementById('monthFilter').value;

                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Configure it: GET-request for the URL /your_server_script.php
                xhr.open('POST', 'fetch_dashboard.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                // Send the request
                xhr.send('selectedMonth=' + encodeURIComponent(selectedMonth));

                // This will be called after the response is received
                xhr.onload = function () {
                    if (xhr.status != 200) {
                        // handle error
                        alert('Error fetching data.');
                    } else {
                        // Update the content based on the server response
                        document.getElementById('contentContainer').innerHTML = xhr.responseText;
                    }
                };
            }
        });

    </script>
    <!-- <script src="bar_chart.js" ></script> -->
    <script src="pie_chart_new.js" defer></script>
    <!-- <script src="area_chart1.js" defer></script> -->
    <script src="bar_chart_new.js" defer></script>

    <script type="module" src="area_chart1.js"></script>
    <script type="module" src="bar_chart.js"></script>
    <script type="module" src="chartUpdater.js"></script>
    <!-- Content Row -->
                    


</body>

</html>