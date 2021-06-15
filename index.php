<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;900&display=swap" rel="stylesheet">
  <title>The Family bank</title>
  
  <!-- some additional css using style tag -->
  <style>

    @media only screen and (min-width: 768px) {

      .hh {
        height: 60vh;
      }
    .hht{
      position:absolute;
      top:7rem;
      z-index:15;
      width:100%;
      font-size: 4rem;
      font-weight: bolder;
      text-align: center;
      font-family: 'Titillium Web', sans-serif;
    }
    }
    @media only screen and (max-width: 768px){
    .hht1{
      position:absolute;
      top:7rem;
      z-index:15;
      width:100%;
      font-size: 2rem;
      font-weight: bolder;
      text-align: center;
      font-family: 'Titillium Web', sans-serif;
    }
    }

    .te-center {
      display: flex;
      text-align: center;
      justify-content: center !important;
    }

    .pp {
      position: relative;
      top: 5rem;
      z-index: 10;
    }
  </style>
</head>




<!-- Background of whole page is dark -->
<body class="bg-dark">

<!-- including a navigation bar -->
 <?php include "nav.php"?>


 <div class="titlee w-100 hht hht1 text-danger">
    <div>THE FAMILY BANK</div>
 </div>

 <!-- carousel used for sliding images  -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="wallpaperflare.com_wallpaper (1).jpg" class="d-block w-100 hh " alt="...">
        <div class="carousel-caption d-none d-md-block text-warning ">
          <h5>What's New</h5>
          <p> Facility to Update E-mail ID has been introduced in Retail Internet Banking as a One Time Option. Please login in Retail IBS to Update E-mail ID.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="wallpaperflare.com_wallpaper (3).jpg" class="d-block w-100 hh " alt="...">
        <div class="carousel-caption d-none d-md-block text-warning">
          <h5>Disclaimer</h5>
          <p>The Family Bank never ask for Bank account details for any purpose through phone call/email/SMS.Never share your CVV/ PIN No. of Debit/Credit card to anyone.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="wallpaperflare.com_wallpaper (4).jpg" class="d-block w-100 hh " alt="...">
        <div class="carousel-caption d-none d-md-block text-warning">
          <h5>Security</h5>
          <p> Please login in Retail IBS to Update E-mail ID.
            To Prevent Fraudulent Payment of Cheques in your Accounts.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



<!-- viewing all the customers  -->
  <div class="card">
    <div class="card-img-overlay">
      <h5 class="card-title">Simple Employee Banking</h5>
      <p class="card-text">
      <p class="card-text"></p>
    </div>

    <div class="card text-center  bg-dark text-white">
      <div class="card-header">
        The Family Bank
      </div>
      <div class="card-body">
        <h5 class="card-title">Simple Employee Banking</h5>
        <p class="card-text">
          TFBank never asks for confidential information such as PIN and OTP from customers. Any such call can be made only by a fraudster. Please do not share personal info. </p>
        </p>
      </div>
      <a class="btn btn-outline-info te-center" href="customers.php" role="button">View all Customers</a>

      <div class="card-footer text-muted">
        Last updated 3 mins ago
      </div>
    </div>
  </div>






  <!-- displaying rules and terms with the marquee tag  -->
  <div class="row">
    <div class="col-sm-6 ">
      <div class="card bg-warning text-white">
        <div class="card-body">
          <marquee width="100%" direction="up" scrollamount="2">
            In 2020, the coronavirus pandemic drove regulators
            and policymakers around the world to rapidly enact
            new or modify existing laws, policies, and regulations
            to enable commerce to continue securely amid social
            distancing measures. Although the pandemic greatly
            impacted the regulatory landscape and many of the
            new regulations for this year stem from that event,
            legislation unrelated to the pandemic was also enacted.
          </marquee>
        </div>
      </div>
    </div>
    <div class="col-sm-6 ">
      <div class="card bg-danger text-white">
        <div class="card-body">
          <marquee width="100%" direction="up" scrollamount="2">
            Updating customer data for the notification of
             monetary operations or generation of email or cell phone alerts
            When credit and debit transactions are made outside of Colombia
            The type of cloud services available, the type of information 
            collected for processing, and the security controls for 
            data protection in “virtualized environments” or cloud applications
            Data portability : standards for the exchange of data and information.</marquee>
        </div>
      </div>
    </div>
  </div>






  <!-- security and safety knowledge -->
  <div class="section-inner bg-info  text-white">
    <h2 class="section-title wow fadeInUp te-center" style="visibility: visible;"><strong>We take your security seriously !</h2>
    <div class="content wow fadeInUp " style="visibility: visible;">
      <div class=" te-center">
        <p>Peace of mind for you as we have the most advanced technology protection</p>
      </div>
      <div class="te-center">
        <span class="icon "><img alt="" src="two_factor_icon.png"></span>
        <p>2 Factor i-safe authentication</p>
        <hr>
      </div>
      <div class="te-center">
        <span class="icon "><img alt="" src="e_to_e_en.png"></span>
        <p>End-to-end 256 bit Encryption</p>
        <hr>
      </div>
      <div class="te-center">
        <span class="icon"><img alt="" src="secure_contact.png"></span>
        <p>We make you feel special</p>
        <hr>
      </div>
    </div>
    <div data-wow-delay="0.5s" class="m-text-center wow fadeInUp" style="visibility: visible; animation-delay: 0.5s;"></div>
  </div>


  
<!-- footer of the page  -->
<?php include "foot.php";?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>