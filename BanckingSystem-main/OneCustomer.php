<?php
    session_start();
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password,"banksystem");
    
    if(!$con){
        die("Connection failed");

    }
    $_SESSION['user']=$_POST['user'];
    $_SESSION['sender']=$_SESSION['user'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon  for title logo-->
    <link rel="shortcut icon" href="https://img.icons8.com/nolan/96/bank-building.png" type="image/x-icon" />

    <!-- Stylesheet link path -->
    <link rel="stylesheet" href="style.css" />

    <!-- social media icon of fontawesome -->
    <script src="https://kit.fontawesome.com/680832fd8d.js" crossorigin="anonymous"></script>

    <title>Banking System</title>

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
                    OneCustomer Header 
        #######################################
    -->
    <div class="main_detail_view">
        <!-- <br><br> -->
        <div class="table_one_customer">
            
            <div class="user_details">
        
                <!-- Senders Deatils -->
                <h3>Customers Details</h3>
                <?php
                if (isset($_SESSION['user']))
                {
                    $user=$_SESSION['user'];

                    $result=mysqli_query($con,"SELECT * FROM customer WHERE Name='$user'");

                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<p><b>User ID &nbsp&nbsp&nbsp:</b>".$row['UserID']. "</p>";
                        echo "<p name='sender'><b>Name &nbsp&nbsp&nbsp&nbsp</b>  :  ".$row['Name']."</p>";
                        echo "<p><b>Email ID</b>&nbsp&nbsp: ".$row['Email']."</p>";
                        echo "<p><b>A/C No.</b>&nbsp&nbsp&nbsp: ".$row['Acc_Number']."</p>";
                        echo "<p><b>IFSC</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$row['IFSC']."</p>";
                        echo "<p><b>Balance</b>&nbsp&nbsp:<b>&nbsp&#8377;</b> ".$row['Balance']."</p>";
                    }    
                      
                }
                ?>
            </div>

        </div>


        <div class="right_content">

            <div class="img_trans">
                <img src="./img/3.png" alt="">
            </div>

            <div class="trans">
                <form action="transfer.php" method="POST">
                    <!-- Make Transcation -->
                    <h3>Make a Transaction</h3>

                    <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
                    <select name="reciever" id="dropdown" class="textbox" required>
                        <option>Select Recipient</option>
                        <?php
                            $db = mysqli_connect("localhost", "root", "", "banksystem");
                            $res = mysqli_query($db, "SELECT * FROM customer WHERE name!='$user'");
                            while($row = mysqli_fetch_array($res)) {
                                echo("<option> "."  ".$row['Name']."</option>");
                            }
                        ?>
                    </select>
                    <br><br>

                    <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender"
                        class="textbox" disabled type="text" value='<?php echo "$user";?>'></input></span>
                    <br><br>

                    <b>Amount :&#8377;</b>
                    <input name="amount" type="number" min="100" class="textbox" required>
                    <br><br>

                    <a href="index.html"><button id="transfer" name="transfer" ;>Transfer</button></a>
                </form>
            </div>
 
        </div>


    </div>


    <!-- 
      =====================================================
        Footer  
      =====================================================
    -->

    <footer id="footer" class="section__footer">
            <div class="copyright">
                <p>© 2021 All Rights Reserved NeetPatel</p>
            </div>

            <div class="follow">
                <div class="follow__icon">
                    <a href="https://www.linkedin.com/in/neet-patel-80239b208/" target="_newtab"><i class="fab fa-linkedin-square"></i></a>
                    
                    <a href="https://www.instagram.com/patel_neet_074/" target="_newtab"><i class="fab fa-instagram-square"></i></a>
                    
                    <a href="https://github.com/PatelNeet" target="_newtab"><i class="fab fa-github-square"></i></a>
                    
                    <a href="https://youtu.be/WDLHIxTaZHI"><i class="fab fa-youtube-square" target="_newtab"></i></a>

                    <a href="https://www.facebook.com/neet.patel.140193" target="_newtab"><i class="fab fa-facebook-square"></i></a>     
                </div>
            </div>

    </footer>
                        

    

</body>

</html>