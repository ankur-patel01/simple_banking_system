
<?php
    $severname='localhost:3307';
    $username='root';
    $password='';
    $database='akafbank_welovedata';
    $conn=mysqli_connect($severname,$username,$password,$database);
    if(!$conn)
    {
       die ("We are facing some technical issues, Sorry for the inconvenience.");
    }
?>
