<?php 

include "db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sporty</title>
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

  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include the Slick Carousel CSS and JS files -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



  <style>

    body {
/*        overflow-x: hidden;*/
    }

   /* Style for the "Red" button */
a.red-button.scrollto {
  background-color: white; /* Set the background color to white */
  color: #e96b56; /* Set the text color to the desired color */
  border: 2px solid #e96b56; /* Add a 2px solid border with the desired color */
  padding: 8px 16px; /* Adjust padding as needed */
  text-decoration: none; /* Remove the default underline style */
  border-radius: 20px; /* Add border-radius for rounded corners */
  transition: background-color 0.3s ease, color 0.3s ease; /* Add transition for smooth effect */
}

a.red-button.scrollto:hover {
  background-color: #e96b56; /* Change background color on hover */
  color: white; /* Change text color on hover */
}


    .card {
      margin-bottom: 20px;
    }
        .card-header {
            background-color: #ebebe0;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }

        .card-content {
           flex-grow: 1; /* Allow the content to take up remaining space */
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }

        /* Fixed height for images */
        .card img {
            width: 100%;
            height: 150px; /* Adjust the height as needed */
            object-fit: cover; /* Maintain aspect ratio and cover the container */
            margin-bottom: 10px; /* Add some bottom margin to the image */
            margin-top: 15px; /* Add some top margin to the button */
        }

        .book-now-button {
            width: 100%;
            padding: 10px;
            background-color: #e96b56; 
            color: #fff;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 10px; /* Add some top margin to the button */
            margin-bottom: 10px; /* Add some bottom margin to the image */
        }

        /* Responsive styling for smaller screens */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                align-items: stretch;
            }

            .card {
                width: 100%;
            }
        }

        /* Style for the section title and paragraph */
        .section-title {
            text-align: center;
            margin-bottom: 10px;
        }

        .section-title h2 {
            color: black; 
        }

        .section-title p {
            color: #555;
            font-size: 16px;
        }

/*newly added */
        #mz-gallery {
  position: relative;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: flex-start;
  width: calc(100% - 70px);
  height: calc(100% - 50px);
  max-height: 670px;
  max-width: 1900px;
  margin: 35px 0px;
  background-color: black;
  background-image: radial-gradient(rgba(124, 252, 0, 0.4) 1px, black 1px);
  background-size: 40px 40px;
  border: 1px dotted rgba(124, 252, 0, 0.7);
  outline: 1px dotted rgba(124, 252, 0, 0.7);
  outline-offset: 20px;
  overflow-x: auto;
  overflow-y: hidden;
  scroll-snap-type: x mandatory;
  scroll-padding: 0 0 0 55px;
  scroll-behavior: smooth;
  /* firefox scrollbar */
  scrollbar-color: #e96b56; #222;
  scrollbar-width: auto;
  animation: background 300s linear infinite;
}

@keyframes background {
  0% {
    background-position: -300% 100%;
  }
  100% {
    background-position: 100% -300%;
  }
}

#mz-gallery::-webkit-scrollbar {
  height: 25px;
}

#mz-gallery::-webkit-scrollbar-track {
  background: transparent;
}

#mz-gallery::-webkit-scrollbar-thumb {
  background: #666;
}

#mz-gallery::-webkit-scrollbar-thumb:hover {
  background: #555;
}

#mz-gallery::-webkit-scrollbar-thumb:active {
  background: #444;
}

#mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement {
  height: 25px;
  width: 80px;
  background-color: #e96b56;;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/%3E%3Cpath fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/%3E%3C/svg%3E");
  background-size: 20px;
  background-position: center;
  background-repeat: no-repeat;
}

#mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment {
  height: 25px;
  width: 80px;
  background-color: #e96b56;;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-right' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/%3E%3Cpath fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/%3E%3C/svg%3E");
  background-size: 20px;
  background-position: center;
  background-repeat: no-repeat;
}

#mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement:hover,
#mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment:hover {
  background-color: #59b500;
}

#mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement:active,
#mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment:active {
  background-color: #3d7d00;
}

#mz-gallery figure {
  position: relative;
  margin: unset;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 80%;
  width: auto;
  min-height: 100px;
  margin-right: 60px;
  scroll-snap-align: start;
  transition: all 0.3s ease-in-out;
}

#mz-gallery figure:nth-child(1) {
  margin-left: 60px;
}

#mz-gallery figure div {
  position: absolute;
  width: 1%;
  height: 1%;
  background: transparent;
  opacity: 0;
  transition: all 0.3s ease-in-out;
}

#mz-gallery figure div:nth-child(3) {
  top: 0;
  left: 0;
  border-left: 1px dotted #e96b56;;
  border-top: 1px solid #e96b56;;
  border-radius: 15px 0px 0px 0px;
}

#mz-gallery figure div:nth-child(4) {
  top: 0;
  right: 0;
  border-top: 1px solid white;
  border-right: 1px solid white;
  border-radius: 0px 15px 0px 0px;
}

#mz-gallery figure div:nth-child(5) {
  bottom: 0;
  right: 0;
  border-right: 1px dotted #e96b56;;
  border-bottom: 1px solid #e96b56;;
  border-radius: 0px 0px 15px 0px;
}

#mz-gallery figure div:nth-child(6) {
  bottom: 0;
  left: 0;
  border-bottom: 1px solid white;
  border-left: 1px solid white;
  border-radius: 0px 0px 0px 15px;
}

#mz-gallery figure img {
  height: 250px;
  width: auto;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px,
    rgba(0, 0, 0, 0.22) 0px 10px 10px;
  border-radius: 5px;
  opacity: 0.9;
  filter: brightness(1);
  outline: 1px solid transparent;
  outline-offset: -40px;
  transition: all 0.3s ease-in-out;
}

#mz-gallery figure figcaption {
  position: absolute;
  color: transparent;
  font-size: 18pt;
  line-height: 24pt;
  font-weight: 500;
  padding: 0px 20px;
  text-align: center;
  width: 80%;
  height: 80%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: radial-gradient(
    rgba(124, 252, 0, 0.7) 1px,
    rgba(0, 0, 0, 0.9) 1px
  );
  outline: 2px dotted transparent;
  outline-offset: 0px;
  background-size: 40px 40px;
  opacity: 0;
  border-radius: 100%;
  pointer-events: none;
  animation: background 100s linear infinite;
  transition: all 0.3s ease-in-out;
}

#mz-gallery figure:hover img {
  height: 220px;
  filter: brightness(1.5);
  border-radius: 10px;
  outline: 1px solid rgba(255, 255, 255, 0.8);
  outline-offset: 5px;
  transition: all 0.3s ease-in-out;
}

#mz-gallery figure:hover {
  padding: 0px 20px;
}

#mz-gallery figure:hover figcaption {
  opacity: 0.8;
  color: white;
  outline: 1px solid #e96b56;;
  outline-offset: -20px;
  text-shadow: 1px 1px 3px black, 0px 0px 5px black;
  transition: all 0.3s ease-in-out;
}

#mz-gallery figure:hover div {
  width: 25%;
  height: 25%;
  opacity: 1;
  transition: all 0.3s ease-in-out;
}

@media (max-width: 1145px) {
  #mz-gallery figure {
    scroll-snap-align: center;
  }
  #mz-gallery {
    scroll-padding: 0px 0px 0px 0px !important;
  }
}

@media (max-width: 610px) {
  #mz-gallery {
    max-height: 320px;
  }
  #mz-gallery figure {
    margin-right: 20px;
  }
  #mz-gallery figure:nth-child(1) {
    margin-left: 20px;
  }
}

@media (max-height: 425px) {
  #mz-gallery figure figcaption {
    font-size: 14pt;
    line-height: 20pt;
  }
}

@media (max-height: 340px) {
  #mz-gallery {
    background-size: 30px 30px;
    scroll-padding: 0 0 0 28px;
  }
  #mz-gallery figure {
    margin-right: 30px;
  }
  #mz-gallery figure:nth-child(1) {
    margin-left: 30px;
  }
  #mz-gallery figure figcaption {
    font-size: 12pt;
    line-height: 18pt;
    font-weight: 400;
    background-size: 30px 30px;
  }
}

@media (max-height: 280px) {
  #mz-gallery::-webkit-scrollbar {
    height: 20px;
  }
  #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:decrement,
  #mz-gallery::-webkit-scrollbar-button:single-button:horizontal:increment {
    width: 80px;
    height: 20px;
    background-size: 15px;
  }
}

@media (max-height: 230px) {
  #mz-gallery figure figcaption {
    font-size: 10pt;
    line-height: 12pt;
  }
  #mz-gallery figure:hover figcaption {
    outline-offset: -10px;
  }
  #mz-gallery figure:hover img {
    outline-offset: 10px;
  }
}

@media (max-height: 165px) {
  #mz-gallery {
    scroll-padding: 0 0 0 18px;
    margin: 0px;
  }
  #mz-gallery figure {
    margin-right: 20px;
  }
  #mz-gallery figure:nth-child(1) {
    margin-left: 20px;
  }
}


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
          <li><a class="active" href="index.php">Home</a></li>
          
          <li><a href="browsevenue.php">Explore</a></li>
          
          <li><a href="about.html">About</a></li>

         <li><a class="getstarted red-button scrollto" href="register.php">Join Us</a></li>

           <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: #fff url('assets/img/cover2.png') center center / contain no-repeat; margin-left: 50px; margin-top: 0; background-size: 80%;">



    <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center" style="background-image: url('assets/img/bg1.png'); background-size: cover; background-position: center; height: 630px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1 style="font-size: 50px">Score Big: <br> Secure Your Spot <br> on the Field Now!</h1>
            <h2 style="font-size: 17px">Bandar Baru Bangi provide many sport facilities. <br>
            We are here to help you reserve your favourite sport.</h2>

          </div>
        </div>
        
      </div>
    </div>

  </section> --><!-- End Hero -->


  </section><!-- End Hero -->

  <br>
  <br>
<br>
<br>
<br>


  <main id="main">

     <!-- ======= Featured Section ======= -->
<section id="featured" class="featured">
  <div class="container">

    <div class="row">

      <div class="section-title">
            <h2>⚽Reserve Your Spot With Sporty⚽</h2>
             <p>Select your ultimate sports venue: the court or field that captures your sporting heart</p>   
        </div>

      <div class="col-lg-4">
        <div class="icon-box">
          <!-- <i class="bi bi-card-gear"></i> -->
          <h3><a href="">Easy Reservation💯</a></h3>
          <p>Enjoy the simplicity of reserving your favorite sports venues online. With just a few clicks, secure your spot without any hassle.</p>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="icon-box">
          <!-- <i class="bi bi-bar-chart"></i> -->
          <h3><a href="">Flexible Scheduling👌</a></h3>
          <p>Gain flexibility in planning your sports activities. Choose time slots that suit your schedule and get the playing time you desire.</p>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="icon-box">
          <!-- <i class="bi bi-binoculars"></i> -->
          <h3><a href="">Instant Confirmation⚡</a></h3>
          <p>Receive instant confirmation for your bookings. No more waiting or uncertainty – know that your sports venue is reserved and ready for your use as soon as you complete your online booking.</p>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- End Featured Section -->

     <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

    <div class="row no-gutters">

      <div class="section-title">
            <h2>🎖 Top 3 Customer's Favourite Choice 🎖</h2>
             <p>Discover the most beloved sports venues by our customers.</p>
             <p>Explore the top-booked courts, or fields that have captured the hearts of sports enthusiasts like you.</p>     
        </div>

         <?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Calculate the most booked venues
    $query = "SELECT b.FLD_VENUEID, b.FLD_VENUENAME, b.FLD_VENUEADDRESS, b.FLD_VENUEIMAGE, COUNT(s.FLD_BOOKINGID) AS bookings_count
              FROM tbl_sport_venue_sporty b
              LEFT JOIN tbl_booking_sporty s ON s.FLD_VENUEID = b.FLD_VENUEID
              GROUP BY b.FLD_VENUEID
              ORDER BY bookings_count DESC
              LIMIT 3"; // Limit to top three venues

    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        echo '<div class="container">';
        echo '<div class="row">';

        $rankingIcons = ['🥇', '🥈', '🥉']; // Add your own icons or images here

        $place = 0;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $place++;
            $venue_id = $row['FLD_VENUEID'];
            $name = $row['FLD_VENUENAME'];
            $location = $row['FLD_VENUEADDRESS'];
            $image_path = $row['FLD_VENUEIMAGE'];
            $bookings_count = $row['bookings_count'];

            echo '<div class="col-md-4">';
            echo '  <div class="card" style="height: 500px;">';
            echo '    <img src="assets/img/venue/' . $image_path . '" class="card-img-top" alt="' . $name . '" style="width: 100%; height: 300px; margin-bottom: 10px;">';
            echo '    <div class="card-body text-center">';
            echo '      <h5 class="card-title">';
            echo '        <span class="ranking-icon">' . $rankingIcons[$place - 1] . '</span>';
            echo '        ' . $name;
            echo '      </h5>';
            echo '      <p class="card-text">' . $location . '</p>';
            
            echo '      <a href="booking.php?venue_id=' . $row['FLD_VENUEID'] . ' " class="btn btn-primary">Book Now</a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo "No venues found.";
    }

    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
          </div>


        </div>

      </div>
    </section><!-- End Pricing Section -->

<!-- ======= Newly Added Section ======= -->
<section id="features" class="features">
   <div class="container">
      <div class="section-title text-center">
         <h2>📣 Newly Added 📣</h2>
         <p>Explore our latest additions to the lineup of sports venues.</p>
         <p>Stay ahead of the game by discovering the newest and most exciting places to fuel your love for sports.</p>
      </div>
      <div id="mz-gallery-container">
  <div id="mz-gallery">

    <?php
    // Your PHP code to fetch and display images with captions here
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT FLD_VENUEID, FLD_VENUENAME, FLD_VENUEIMAGE
                  FROM tbl_sport_venue_sporty
                  ORDER BY FLD_VENUEID DESC LIMIT 18"; // Fetching the latest 18 venues

        $stmt = $conn->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $venue_id = $row['FLD_VENUEID'];
                $name = $row['FLD_VENUENAME'];
                $image_path = $row['FLD_VENUEIMAGE'];

                echo "<figure>";
                // Check if the image path is not empty before displaying
                if (!empty($image_path)) {
                    echo '<img src="assets/img/venue/' . htmlspecialchars($image_path) . '" alt="' . htmlspecialchars($name) . '" width="700" height="700">';
                } else {
                    echo "No image found for this venue.<br>";
                }

                echo "<figcaption>$name</figcaption>";
                echo "<div></div>";
                echo "<div></div>";
                echo "<div></div>";
                echo "<div></div>";
                echo "</figure>";
            }
        } else {
            echo "No venues found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the database connection
        $conn = null;
    }
    ?>
    
  </div>
</div>

   </div>
</section><!-- End Newly Added Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="browsevenue.php">Explore</a></li>
              
            </ul>
          </div>

          
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              No.6 Jalan Suakasih 3/1 <br>
              Bandar Tun Hussein Onn<br>
              Selangor <br>
              Malaysia <br><br>
              <strong>Phone:</strong> +603 0981 7654<br>
              <strong>Email:</strong> sporty@mail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Sporty</h3>
            <p>Sporty began as a simple solution to a decades-long problem: sports players found it hard to locate and reserve sports facilities, and venue operators needed more efficient ways to streamline booking processes.</p>
           
          </div>

        </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sporty</span></strong>. All Rights Reserved
      </div>
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<!-- Include the Slick Carousel CSS and JS files -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

 

</body>

</html>