<?php
    session_start();
    $server="localhost";
    $username="root";
    $password="";
    $con=mysqli_connect($server,$username,$password,"banksystem");
    if(!$con)
    {
        die("Connection failed");
    } 


    $flag=false;

    if (isset($_POST['transfer']))
    {
        $sender=$_SESSION['sender'];
        $receiver=$_POST["reciever"];
        $amount=$_POST["amount"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Banking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <!-- Favicon  for title logo-->
    <link rel="shortcut icon" href="https://img.icons8.com/nolan/96/bank-building.png" type="image/x-icon" />

    <!-- Stylesheet link path -->
    <link rel="stylesheet" href="style.css" />

    <!-- social media icon of fontawesome -->
    <script src="https://kit.fontawesome.com/680832fd8d.js" crossorigin="anonymous"></script>
    
    <!-- CDN Link of sweetalert  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body{
            background-color: rgb(17 17 17);
        }
        .header_trans {
            background:  url(./img/mony_heist_transfer_security.jpg);
            height: 88.6vh;
            background-size: cover;
            background-position: center;
            position: relative;
            /* color: yellow; */
        }
        @media only screen and (max-width: 444px){

            .header_trans {
                
                background:  url(./img/mony_heist_transfer_security.jpg);
                height: 60vh;
                background-size: 100% 80%;
                background-repeat: no-repeat;
                background-position: center;
                position: relative;
                color: yellow;
            }
        }
    </style>
</head>

<body>
    <!-- 
        #######################################
                    navbar 
        #######################################
    -->
    <div class="fix__nav" id="home">
        <div class="navigation">
            <div class="nav_container">

                <div class="nav__logo">
                    <a href="/">TSF BANK</a>
                </div>

                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.html#home" class="nav__link ">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="view.php" class="nav__link ">Customer</a>
                        </li>

                        <li class="nav__item">
                            <a href="Transc.php" class="nav__link ">Transactions</a>
                        </li>

                        <li class="nav__item">
                            <a href="README.md" class="nav__link ">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        #######################################
                    Header 
        #######################################
    -->
    
    
    <div class="header_trans">
        <!-- img background set via internal CSS -->
    </div>


    <!-- 
      =====================================================
        Footer  
      =====================================================
    -->
    <div class="fix__nav_footer">
        <footer id="footer" class="section__footer">
            <div class="copyright">
                <p>© 2021 All Rights Reserved NeetPatel</p>
            </div>
    
            <div class="follow">
                <div class="follow__icon">
                    <!-- <a href="https://www.linkedin.com/in/neet-patel-80239b208/" target="_newtab"><i class="fab fa-linkedin-square"></i></a> -->
                    
                    <a href="https://www.instagram.com/patel_neet_074/" target="_newtab"><i class="fab fa-instagram-square"></i></a>
                    
                    <a href="https://github.com/PatelNeet" target="_newtab"><i class="fab fa-github-square"></i></a>
                    
                    <a href="https://youtu.be/WDLHIxTaZHI"><i class="fab fa-youtube-square" target="_newtab"></i></a>

                    <a href="https://www.facebook.com/neet.patel.140193" target="_newtab"><i class="fab fa-facebook-square"></i></a>     
                </div>
            </div>
    
        </footer>
    </div>
</body>
</html>

<?php

    $sql = "SELECT Balance FROM customer WHERE name='$sender'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            if($amount > $row["Balance"] or $row["Balance"]-$amount < 100){
                echo "<script> swal( 'Transaction Denied','Insufficient Balance!','error' ).then(function() { window.location = 'view.php'; });;</script>"; 
            }
            else{
                $sql = "UPDATE `customer` SET Balance=(Balance-$amount) WHERE Name='$sender'";
        
                if ($con->query($sql) === TRUE) {
                    $flag=true;
                } 
                else {
                    echo "Error in updating record: " . $conn->error;
                }

            }
    
        }
    } 
    else {
        echo "0 results";
    } 

    if($flag==true){
        $sql = "UPDATE `customer` SET Balance=(Balance+$amount) WHERE name='$receiver'";

        if ($con->query($sql) === TRUE) {
            $flag=true;  
        } 
        else {
            echo "Error in updating record: " . $con->error;
        }

    }

    //Transcation Detailed Stored in the DB
    if($flag==true){

        //sender ac number fatching
        $sql = "SELECT * from customer where name='$sender'";
        $result = $con-> query($sql);
        while($row = $result->fetch_assoc())
        {
            $s_acc=$row['Acc_Number'];
        }

        //Receiver ac number fatching
        $sql = "SELECT * from customer where name='$receiver'";
        $result = $con-> query($sql);
        while($row = $result->fetch_assoc())
        {
            $r_acc=$row['Acc_Number'];
        }   
        
        //Inserting data of sender name,ac number AND receiver name,ac number AND Amount to be transfer
        $sql = "INSERT INTO `transactions`(s_name,s_acc_no,r_name,r_acc_no,amount) VALUES ('$sender','$s_acc','$receiver','$r_acc','$amount')";
        if ($con->query($sql) === TRUE) {
        } 
        else 
        {
            echo "Error updating record: " . $con->error;
        }
    }

    if($flag==true){
        echo "<script>swal('Money sent', 'Your transaction was successful','success').then(function() { window.location = 'view.php'; });;</script>";
    }
    elseif($flag==false)
    {
        echo "<script>
            $('#text2').show()
        </script>";
    }
?>
