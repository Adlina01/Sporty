<?php 

include "db.php";
include "session.php";
$sportyid = $_SESSION["sportyid"];
$selectedMonth = '';
?>

<?php

include"modal_handler.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sporty: Booking List</title>

    <link href="assets/img/bola.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

        <script>
        $(document).ready(function () {
        $('#monthFilter').change(function () {
        var selectedMonth = $(this).val();
        // Reload the page with the selected month as a query parameter
        window.location.href = 'list_booking.php?month=' + selectedMonth;
        });

         // Set the selected month in the dropdown if it's in the URL
        var urlParams = new URLSearchParams(window.location.search);
        var selectedMonthParam = urlParams.get('month');
        if (selectedMonthParam) {
        $('#monthFilter').val(selectedMonthParam);
    }
});
</script>

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

                    <div class="d-flex justify-content-between align-items-center mb-4">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Booking History</h1>

                    <!-- Filter by Date (Dropdown) -->
                    <div class="form-group">
                     <label for="monthFilter">Filter by Month:</label>
                    <select class="form-control" id="monthFilter" name="monthFilter">
                    <option value="">All</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                     <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                     <option value="11">November</option>
                    <option value="12">December</option>
                     <!-- Add options for the remaining months -->
                    </select>
                    </div>
                </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>-->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <?php  
                        $selectedMonth = isset($_GET['month']) ? $_GET['month'] : ''; 
                        $recordsPerPage = 10;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $startFrom = ($page - 1) * $recordsPerPage;


                         try {
    
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Fetch all data from the table
                    $query = "SELECT b.FLD_BOOKINGID, c.FLD_CUSTNAME, b.FLD_BOOKINGDATE, b.FLD_BOOKINGTIME FROM tbl_booking_sporty b
                           JOIN tbl_sport_venue_sporty v ON b.FLD_VENUEID = v.FLD_VENUEID
                            JOIN tbl_customer_sporty c ON b.FLD_CUSTUSERNAME = c.FLD_CUSTUSERNAME
                           WHERE v.FLD_MANAGEMENTID = :sportyid";

                     if (!empty($selectedMonth)) {
                     $query .= " AND MONTH(b.FLD_BOOKINGDATE) = :selectedMonth";
                    }

                    // Add LIMIT clause for pagination
                     $query .= " LIMIT :startFrom, :recordsPerPage";

                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);

                    if (!empty($selectedMonth)) {
                    $stmt->bindParam(':selectedMonth', $selectedMonth, PDO::PARAM_INT);
                    }

                    // Bind parameters for pagination
                    $stmt->bindParam(':startFrom', $startFrom, PDO::PARAM_INT);
                    $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);

                    $stmt->execute();
                    $venues = $stmt->fetchAll(PDO::FETCH_ASSOC);

                     // Fetch total count without LIMIT for pagination
                    $countQuery = "SELECT COUNT(*) as total FROM tbl_booking_sporty b
                                JOIN tbl_sport_venue_sporty v ON b.FLD_VENUEID = v.FLD_VENUEID
                                JOIN tbl_customer_sporty c ON b.FLD_CUSTUSERNAME = c.FLD_CUSTUSERNAME
                                WHERE v.FLD_MANAGEMENTID = :sportyid";

                    $stmtCount = $conn->prepare($countQuery);
                    $stmtCount->bindParam(':sportyid', $sportyid, PDO::PARAM_STR);
                     if (!empty($selectedMonth)) {
                        $countQuery .= " AND MONTH(b.FLD_BOOKINGDATE) = :selectedMonth";}

                     $stmtCount->execute();
                     $rowCount = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];

                    // Calculate total number of pages
                    $totalPages = ceil($rowCount / $recordsPerPage);


                    if (!empty($venues)) {


                                    echo'<thead>';
                                        echo'<tr>';
                                            echo'<th>BOOKING ID</th>';
                                            echo'<th>BOOKED BY</th>';
                                            echo'<th>DATE</th>';
                                            echo'<th>TIME</th>';
                                            echo'<th>ACTION</th>';
                                        echo'</tr>';
                                    echo'</thead>';
                                    echo'<tbody>';

                       
                        foreach ($venues as $venue) {

                                    echo' <tr>';
                                    echo'<td>'. $venue['FLD_BOOKINGID'].'</td>';
                                    echo'<td>'. $venue['FLD_CUSTNAME'].'</td>';
                                    echo'<td>'. $venue['FLD_BOOKINGDATE'].'</td>';
                                    echo'<td>'. $venue['FLD_BOOKINGTIME'].'</td>';
                                    echo'<td>';
                                  echo '<button class="btn btn-primary details-btn" name="bookingid" data-toggle="modal" data-target="#bookingDetailsModal" data-bookingid="' . $venue['FLD_BOOKINGID'] . '">Details</button>';
                                    echo'</tr>';
                                }
                                       
                                    echo'</tbody>';

                                     echo '<ul class="pagination">';
                                     for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="list_booking.php?page=' . $i . '&month=' . $selectedMonth . '">' . $i . '</a></li>';
                                        }
                                        echo '</ul>';

                                    } else {
                        echo "No records found.";
                    }

                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null
                    ?>

                                </table>
                            </div>
                        </div>
                    </div>




            


                </div>
                <!-- /.container-fluid -->





            </div>
            <!-- End of Main Content -->

            

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

    <!-- Modal Content -->
<div class="modal fade" id="bookingDetailsModal" tabindex="-1" role="dialog" aria-labelledby="bookingDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingDetailsModalLabel">Booking Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bookingDetailsContent">
                <!-- Content will be loaded dynamically here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    <script>
    $(document).ready(function () {
        $('.details-btn').on('click', function () {
            var bookingId = $(this).data('bookingid');

            // Use AJAX to fetch and display modal content
            $.ajax({
                url: 'modal_handler.php',
                method: 'POST',
                data: { bookingId: bookingId },
                success: function (response) {
                    $('#bookingDetailsContent').html(response);
                    $('#bookingDetailsModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching modal content:', error);
                    alert('Error fetching modal content.');
                }
            });
        });
    });
</script>


</body>

</html>