<?php
session_start();
// checking if a valid user or not 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST)) {
    require "conn_mysql.php";
    mysqli_autocommit($conn, FALSE);
    $id = $_GET["id"];
    $idd = $_POST["cust_no"];
    $amount = $_POST["amount"];
    $message = $_POST["message"];
    $tranid = $_POST["tranid"];
    $mobile=$_POST["mobile"];
    
    // sending request to get all details from table of given ids 
    $query = "SELECT * FROM `customer0001` WHERE customer_no='$id'";
    $result = mysqli_query($conn, $query);
    $query0 = "SELECT * FROM `customer0001` WHERE customer_no='$idd'";
    $result0 = mysqli_query($conn, $query0);
    if ($result && $result0) {
        $row = mysqli_fetch_array($result);
        $row1 = mysqli_fetch_array($result0);

        // validating the amount of transaction and updating the new balance
        if ($amount <= $row["current_balance"]) {
            $deb = $row["current_balance"] - $amount;
            $deb1 = $row1["current_balance"] + $amount;
            $query1 = "UPDATE `customer0001` SET `current_balance` = '$deb' WHERE `customer0001`.`customer_no` = '$id'";
            $query2 = "UPDATE `customer0001` SET `current_balance` = '$deb1' WHERE `customer0001`.`customer_no` = '$idd'";
            $result1 = mysqli_query($conn, $query1);
            $result2 = mysqli_query($conn, $query2);

            // inserting the transaction details on table 
            if ($result1 &&$result2) {
                $query3 = "INSERT INTO `transfer` (`s_no`, `tran_no`, `payto_dt`, `payto_bank`, `payto_branch`, `payto_acc_no`, `payto_name`, `payfrom_no`, `amount`, `mobile_no`, `payto_ifsc`, `db/cr`, `message`, `current_balance`) VALUES (NULL, '$tranid', current_timestamp(), 'TF Bank', 'TFB001', '$row1[account_no]', '$row1[first_name] $row1[middle_name] $row1[last_name]', '$row[account_no]', '$amount', '$mobile', 'TF123456', 'Debit', '$message', '$deb')";
                $result3 = mysqli_query($conn, $query3);
                $query4 = "INSERT INTO `receive` (`s_no`, `trans_no`, `send_dt`, `send_bank`, `send_branch`, `send_acc_no`, `send_name`, `send_no`, `amount`, `send_mobile_no`, `send_ifsc`, `db/cr`, `message`, `current_balance`) VALUES (NULL, '$tranid', current_timestamp(), 'TF Bank', 'TFB001', '$row[account_no]', '$row[first_name] $row[middle_name] $row[last_name]', '$row1[account_no]', '$amount', '$mobile', 'TF123456', 'Credit', '$message', '$deb1')";
                $result4 = mysqli_query($conn, $query4);

                // final commit of the transaction
                if ($result3 && $result) {
                    mysqli_commit($conn);
                    session_unset();
                    session_destroy();

                    // displaying with a gif that transaction successful
                    echo '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                    </head>
                    <body>
                        <div class="text" style=" display: flex;font-family: system-ui;
                        font-weight: 600;
                        flex-direction: column;color: slategray;
                        align-items: center;">
                            <img src="success.webp" width="20%" height="20%" >
                            <div style="font-size: 4rem;">Transaction Successful</div>
                            <p style="font-size: 2rem;">You will be redirected to Your Details Page in 10 seconds, or <a href="cust_details.php?id='.$id.'">click_here</a></p>
                        </div>
                    </body>
                    </html>';
                    header('Refresh:10; url= cust_details.php?id='.$id.'');

                } else {
                    echo 'Error1!!!';
                    mysqli_error($conn);
                    mysqli_rollback($conn);
                    rollback();
                }
            } else {
                echo 'Error2!!!';
                mysqli_rollback($conn);
                rollback();
            }
        } else {
            echo 'error3!!!';
            mysqli_rollback($conn);
            rollback();
        }
    } else {
        echo 'Error4!!!';
        mysqli_rollback($conn);
        rollback();
    }
} else {
    header('location:home.php');
}
function rollback()
{   
    session_unset();
    session_destroy();
    echo 'We are facing some technical issues. Sorry for the inconvinience.
    You will be redirected to Home Page in 10 seconds, or <a href="index.php">click_here</a>';
    header('Refresh:10; url= index.php');
}
?>

