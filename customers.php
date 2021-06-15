<?php
require "conn_mysql.php";
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- additional css -->
    <style>
        @media only screen and (min-width: 768px) {

            .mbb {
                margin-bottom: 10rem;

            }
        }
    </style>
    <title>Customers</title>
</head>


<body style="background:url('money-2696219_1280.webp') no-repeat center center/cover">

    <!-- including navbar -->
    <?php include "nav.php"; ?>

    <!-- main container  -->
    <div class="container-fluid well mbb" id="home" style="display:block; padding-top:10rem; ">

        <?php
            $sql = "SELECT * FROM `customer0001`";
            $result = mysqli_query($conn, $sql);
            $n = mysqli_num_rows($result);
        ?>


        <div class="d-flex responsive justify-content-center bg-info">
            <h2>ALL CUSTOMERS ARE LISTED BELOW</h2>
        </div>
        <br /><br />

        <!-- table used for displaying customers  -->
        <div class="table-responsive">
            <table class="table text-white table-responsive" style="background-color:rgba(0, 0, 0,0.7);">
                <thead>
                    <tr>
                        <th scope="col">Account Number</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($n > 0) {

                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                        <tr>
                        <th scope="row" >' . $row["account_no"] . '</th>
                        <td>' . $row["first_name"] . '  ' . $row["middle_name"] . ' ' . $row["last_name"] . '</td>
                        <td>' . $row["date_of_birth"] . '</td>
                        <td><a href="cust_details.php?id=' . $row["customer_no"] . '" name="search" class="btn btn-info btn-lg "  role="button" aria-disabled="true">View</a></td>
                        </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>



  
        <!-- BOOTSTRAP JAVASCRIPT  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js"></script>

        <?php
        require "foot.php";
        ?>
</body>

</html>