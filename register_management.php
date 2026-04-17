<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sporty: Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <style type="text/css">
        .register-photo {
            background: #f1f7fc;
            padding: 80px 0;
        }

        .register-photo .image-holder {
            display: table-cell;
            width: auto;
            background: url(assets/img/login-bg.png);
            background-size: cover;
        }

        .register-photo .form-container {
            display: table;
            max-width: 900px;
            width: 90%;
            margin: 0 auto;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .register-photo form {
            display: table-cell;
            width: 400px;
            background-color: #ffffff;
            padding: 40px 60px;
            color: #505e6c;
        }

        @media (max-width: 991px) {
            .register-photo form {
                padding: 40px;
            }
        }

        .register-photo form h2 {
            font-size: 24px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        .register-photo form .form-control {
            background: #f7f9fc;
            border: none;
            border-bottom: 1px solid #dfe7f1;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
            text-indent: 6px;
            height: 40px;
        }

        .register-photo form .form-check {
            font-size: 13px;
            line-height: 20px;
        }

        .register-photo form .btn-primary {
            background: #f4476b;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 35px;
            text-shadow: none;
            outline: none !important;
        }

        .register-photo form .btn-primary:hover,
        .register-photo form .btn-primary:active {
            background: #eb3b60;
        }

        .register-photo form .btn-primary:active {
            transform: translateY(1px);
        }

        .register-photo form .already {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: 0.9;
            text-decoration: none;
        }

        .border-button {
    background-color: #f2786f; 
    border: none;
    color: white;
    padding: 8px 20px; /* Adjusted padding */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px; /* Adjusted font size */
    margin: 4px 2px;
    cursor: pointer;
}
}

.border-button-disabled {
  background-color: #f2786f; 
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  opacity: 0.6;
  cursor: not-allowed;
}
    </style>
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
             <form action="register_management_process.php" method="POST">
                <div class="image" style="text-align: center;">
                    <img src="assets/img/bola.png" style="width: 150px; height: 150px; display: inline-block;">
                    <h2 class="text-center"><strong>Register</strong> an account.</h2>
                    <p>Please fill in the information below</p>
                </div>
                <div class="form-group" style="text-align: center;">
                    <a class="border-button" href="register_customer.php">Customer</a>
                       <a class="border-button-disabled"  href="register_management.php">Management</a>
                </div><br>
                <div class="form-group"><input class="form-control" type="text" name="managementid" placeholder="Management ID (ex: K000)" required pattern="K\d+" title="Please enter a valid ID starting with 'K' followed by numbers"></div>
                <div class="form-group"><input class="form-control" type="text" name="managementname" placeholder="Management Name" required></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="tel" name="mobile" placeholder="Mobile Numbers" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div><br>
                <div class="form-group" style="text-align: center;">
                    <button class="btn btn-primary btn-block" type="submit" style="display: flex; margin: auto;">Sign Up</button>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Include jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>
</html>