<?php
include_once 'db.php';
session_start();

if (isset($_POST["login"])) {
    if (empty($_POST["sportyid"]) || empty($_POST["password"])) {
        echo "<script>alert('All fields are required');</script>";
    } else {
        $sportyid = $_POST["sportyid"];
        $password = $_POST["password"];

        try {
            // Check for management user in the staff table (Replace with your actual table name)
            $querySManagement = "SELECT * FROM tbl_sport_venue_management_sporty WHERE FLD_MANAGEMENTID = :sportyid AND FLD_MANAGEMENTPASSWORD = :password ";
            $stmtSManagement = $conn->prepare($querySManagement);
            $stmtSManagement->bindParam(':sportyid', $sportyid);
            $stmtSManagement->bindParam(':password', $password);
            $stmtSManagement->execute();

            // Check for customer user in the admin table (Replace with your actual table name)
            $queryCust = "SELECT * FROM tbl_customer_sporty WHERE FLD_CUSTUSERNAME = :sportyid AND FLD_CUSTPASSWORD = :password";
            $stmtCust = $conn->prepare($queryCust);
            $stmtCust->bindParam(':sportyid', $sportyid);
            $stmtCust->bindParam(':password', $password);
            $stmtCust->execute();

            $countSManagement = $stmtSManagement->rowCount();
            $countCust = $stmtCust->rowCount();

    
            if ($countSManagement > 0) {
                // Redirect staff to the Sport Management page
                $management_data = $stmtSManagement->fetch(PDO::FETCH_ASSOC);
                $name = $management_data['FLD_MANAGEMENTNAME'];
            
                $_SESSION["sportyid"] = $sportyid;
                echo '<script>alert("Welcome ' . $name . ' to Sporty : Management System !");';
                echo 'window.location.href = "index_sm.php";</script>';
                exit();
               //echo 'alert("Welcome to Sporty, '.$sportyid.'! as Sport Management");'; 

            } elseif ($countCust > 0) {
                $customer_data = $stmtCust->fetch(PDO::FETCH_ASSOC);
                $name = $customer_data['FLD_CUSTNAME'];

                // Redirect admin to the Customer page
                $_SESSION["sportyid"] = $sportyid;
                echo '<script>alert("Welcome ' . $name . ' to Sporty : Sport Venue Booking System !");';
                echo 'window.location.href = "index_cust.php";</script>';
                exit();
                //echo 'alert("Welcome to Sporty, '.$sportyid.'! as Customer");'; 

            } else {
                echo '<script>alert("Wrong Password or Unknown user");';
                echo 'window.location.href = "login.php";</script>';
    exit();

            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">

.form-group {
    position: relative;
}

.tooltip-trigger {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #0000FF; /* Custom color */
}

.custom-tooltip {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    color: #333;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 250px;
    top: 100%;
    left: 0;
    margin-top: 5px;
    z-index: 1;
}

.tooltip-trigger:hover + .custom-tooltip {
    display: block;
}




</style>



    </head>
    <body>

    <form method="POST" action="login.php">
    <section class="ftco-section">
        <div class="container">



            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10" style="margin-top: 70px;">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(assets/img/login-bg.png);">
                  </div>

                 
                    
                        <div class="login-wrap p-4 p-md-5">
                            <div class="image" style="display: flex; justify-content: center; align-items: center;">
                    <img src="assets/img/bola.png" style="width: 150px; height: 150px;">
                            </div>

                    <div class="d-flex">
                        <div class="w-100 text-center">
                            <h3 class="mb-4">Welcome back Champion!</h3>
                        </div>          
                    </div>

                    <div class="d-flex">
                        <div class="w-100">
                            <h6 class="mb-4">Login To Your Account :</h6>
                        </div>          
                    </div>


                            <div class="form-group mb-3">
                    <input type="text" class="form-control" name="sportyid" id="sportyid" placeholder="Username/ID" required>
                    <span class="tooltip-trigger"><i class="fas fa-question-circle"></i></span>
                    <div class="custom-tooltip">For Sport Management, Please log in using your ID</div>
                            </div>

                        

                        <div class="form-group mb-3">
                            <div class="password-input">
                            <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
                                <i class="fas fa-eye" id="password-toggle"></i> <!-- Font Awesome icon for the "eye" -->
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script>
    // Add a click event listener to the eye icon
        $(document).ready(function() {
        $('#password-toggle').on('click', function() {
            var passwordInput = $('#password');
            var icon = $(this);

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash'); // Change the icon to an eye-slash
            } else {
                passwordInput.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye'); // Change the icon back to an eye
            }
        });
    });
        </script>








                    <div class="form-group text-center">
                <button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3" style="width: 150px; height: 40px; background-color: red; color: white;">Sign In</button>
                    </div>
                    
                  </form>
                  <p class="text-center">Not a member? 

                    <a  href=" register_customer.php" style="color: #2da7e4;">Sign Up</a></p>

                 
                </div>
              </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

    </body>
</html>


