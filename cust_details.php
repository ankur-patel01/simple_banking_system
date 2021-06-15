<?php
require "conn_mysql.php";
$id = $_GET["id"];
$query = "SELECT * FROM `customer0001` WHERE customer_no='$id'";
$result = mysqli_query($conn, $query);
$n = mysqli_num_rows($result);
$tbnm1 = md5(uniqid(rand(), true));
include "nav.php";
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;900&display=swap" rel="stylesheet">

    <!-- additional css  -->
    <style>
        @media only screen and (min-width: 768px) {

            .mbb {
                margin-bottom: 10rem;

            }

            .hht {
                position: absolute;
                top: 6rem;
                z-index: 15;
                font-size: 3rem;
                font-weight: bolder;
                text-align: center;
                font-family: 'Titillium Web', sans-serif;
            }
        }

        .hht {
            position: absolute;
            top: 7rem;
            z-index: 15;
            font-size: 2rem;
            font-weight: bolder;
            text-align: center;
            font-family: 'Titillium Web', sans-serif;
        }
    </style>

    <title>Customer Details</title>
</head>



<body style="background:url(money-2696219_1280.webp) no-repeat center center/cover">

        <!-- main container -->
    <div class="container-fluid well mbb" id="home" style="display:block; padding-top:10rem; ">
            <?php
        if ($n == 1) {
            $customer = mysqli_fetch_array($result);


            // heading
            echo '
            <div class="heading w-100 hht text-danger responsive">
                  <div>Welcome Mr. ' . $customer["first_name"] . ' ' . $customer["last_name"] . '</div>
            </div>';


        //   table used for displaying the details of the customer  
        echo '
        <div class="table-responsive" style="background-color:rgba(255, 255, 255,0.5);" id="customer_details">
            <table class="table  table-bordered table-bordered border-info">
                <tr>
                    <td align="right"><b>Customer Number</b></td>
                    <td><b><span id="customer_no">' . $customer["customer_no"] . '</span></b></td>
                    <td align="right"><b>Account Number</b></td>
                    <td><b><span id="account_no">' . $customer["account_no"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>First Name</b></td>
                    <td><b><span id="first_name">' . $customer["first_name"] . '</span></b></td>
                    <td align="right"><b>Middle Name</b></td>
                    <td><b><span id="middle_name">' . $customer["middle_name"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>last_name</b></td>
                    <td><b><span id="last_name">' . $customer["last_name"] . '</span></b></td>
                    <td align="right"><b>Date of Birth</b></td>
                    <td><b><span id="date_of_birth">' . $customer["date_of_birth"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>Mobile Number</b></td>
                    <td><b><span id="mobile_no">' . $customer["mobile_no"] . '</span></b></td>
                    <td align="right"><b>Email-Address</b></td>
                    <td><b><span id="email_add">' . $customer["email_add"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>Current Balance</b></td>
                    <td><b><span id="current_balance">' . $customer["current_balance"] . '</span></b></td>
                    <td align="right"><b>Adress-1</b></td>
                    <td><b><span id="add1">' . $customer["add1"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>Address-2</b></td>
                    <td><b><span id="add2">' . $customer["add2"] . '</span></b></td>
                    <td align="right"><b>City</b></td>
                    <td><b><span id="city">' . $customer["city"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>State</b></td>
                    <td><b><span id="state">' . $customer["state"] . '</span></b></td>
                    <td align="right"><b>Occupation</b></td>
                    <td><b><span id="occupation">' . $customer["occupation"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>Opening Date and Time</b></td>
                    <td><b><span id="opening_date">' . $customer["opening_date"] . '</span></b></td>
                    <td align="right"><b>Status</b></td>
                    <td><b><span id="status">' . $customer["status"] . '</span></b></td>
                </tr>
                <tr>
                    <td align="right"><b>Type</b></td>
                    <td><b><span id="type">' . $customer["type"] . '</span></b></td>
                    <td align="right"><b>Branch Number</b></td>
                    <td><b><span id="branch_no">' . $customer["branch_no"] . '</span></b></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><a href="#past"><button type="button" onclick="previous()" class="btn btn-info">See Previous Transactions</button></a></td>
                    <td colspan="2" align="center"><a href="#benef"><button type="button"  onclick="trans()" class="btn btn-info">Transfer Money</button></a></td>
                </tr>

            </table>
        </div>';

            // transaction form
        echo '
        <div id="transact" style="display:none;">
           
        <div class="d-flex justify-content-center bg-info">
                <h2 id="benef">Select the Benefeciary</h2>
        </div>
        <br /><br />
            <div class="row d-flex justify-content-center" style="background-color:rgba(255, 255, 255,0.5);">
                <form  action="confirm.php?id=' . $id . '" method="post">
                    <div class="col-md-4 ">
                        <div class="mb-3">
                            <label class="form-label">Beneficiary Name</label>
                            <select  name="cust_no" id="cust_list" class="form-select bg-dark text-white" required>
                                <option value="">Select Beneficiary</option>';
            $query1 = "SELECT * FROM `customer0001` WHERE customer_no!='$id'";
            $result1 = mysqli_query($conn, $query1);
            $n1 = mysqli_num_rows($result1);
            if ($n1 > 0) {

                while ($row = mysqli_fetch_assoc($result1)) {
                    echo '<option value="' . $row["customer_no"] . ' "><b>' . $row["account_no"] . '  |  </b> ' . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . '</option>';
                }
            }
            echo ' 
                    </select>
                    </div>
                        <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input  type="number" name="amount" min="0.01" max="' . $customer["current_balance"] . '" step=".01" class="bg-dark text-white form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="mb-3">
                        <label for="message"  class="form-label">Message</label>
                        <input  type="text" name="message" class="bg-dark text-white form-control" id="message1">
                    </div>
                    <div class="mb-3">
                        <label for="mobile"  class="form-label">Mobile Number</label>
                        <input  type="number" name="mobile" class="bg-dark text-white form-control" id="mobile1">
                    </div>
                        <button type="submit" name="tranid" value="" id="maihoonnaa" class="btn btn-primary">Confirm Payment</button>
                </form>
            </div>
        </div>           
    </div>';
            
            // previous transaction
           echo '
            <div id="previous"  style="display:none;">
            <div class="table-responsive" style=" background-color:rgba(0, 0, 0,0.8);">';
            $query3 = "SELECT * FROM `transfer` WHERE payfrom_no='$customer[account_no]' UNION SELECT * FROM `receive` WHERE send_no='$customer[account_no]' ORDER BY payto_dt DESC";
            $result3 = mysqli_query($conn, $query3);
            if ($result3) {
                echo '
                    <table class = "table text-info" id="past">
                        <thead class="text-warning">
                            <tr>
                                <th scope="col">Transaction Id</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Action</th>
                                <th scope="col">Balance</th>
                            </tr>
                        </thead>

                        <tbody>';
                while ($prev = mysqli_fetch_array($result3)) {
                    echo ' 
                            <tr>
                                <th scope="row">' . $prev["tran_no"] . '</th>';
                                if ($prev["db/cr"] == "Debit") {
                                echo '
                                <td>to- ' . $prev["payto_name"] . ' | ' . $prev["message"] . '</td>
                                <td>' . $prev["payto_dt"] . '</td>    
                                <td style="color:red">Rs. ' . $prev["amount"] . ' | ' . $prev["db/cr"] . '</td>';
                                } else if ($prev["db/cr"] == "Credit") {
                                echo '
                                <td>By- ' . $prev["payto_name"] . ' | ' . $prev["message"] . '</td>
                                <td>' . $prev["payto_dt"] . '</td>    
                                <td style="color:lightgreen">Rs. ' . $prev["amount"] . ' | ' . $prev["db/cr"] . '</td>';
                            }
                            echo '
                                <td> Rs. ' . $prev["current_balance"] . '</td>
                            </tr>';
                         }
                         echo '
                        </tbody>
                    </table>';
            }
            echo '
                </div>
            </div>';


            // function to display previous transaction
            echo '     
            <script>
            function previous(){
                var x=document.getElementById("transact");
                if(x.style.display=="block")
                x.style.display="none";
                
                var y=document.getElementById("previous");
                y.style.display="block";
            }
            </script>';           


            // function to display previous transaction
            echo'
            <script>
            function trans(){
                var y=document.getElementById("previous");
                if(y.style.display=="block")
                y.style.display="none";
                var x=document.getElementById("transact");
                if(x.style.display=="block")
                x.style.display="none";
                else
                x.style.display="block";
            }
            </script>';
            
            // generating random transaction id
            echo '
            <script>var c=Math.random().toString(36).substr(2, 9);
                document.getElementById("maihoonnaa").value = c;
            </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js" ></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->';
            require "foot.php";
            echo '</body>
    </html>';
        }
?>