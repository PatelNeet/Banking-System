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

    <style>
        #loader{
            background: white url('./img/loading.io.gif') no-repeat center;
            width: 100%;
            height: 100vh;
            position: fixed;
            z-index: 9999;
        }
    </style>
    
</head>
<body onload="load()"> 

    <!-- for laoder we add laod function in body ,internal css , html div , script which is below body -->
    <div id="loader">
    </div>

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
                    view Header 
        #######################################
    -->
    
    <div class="main_view">
        <div class="table">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>Expand</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "banksystem");

                    // Check connection

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT name , acc_number FROM customer";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // output data of each row

                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<form method ='post' action = 'OneCustomer.php'>";
                            echo "<td>" . $row["name"]. "</td><td>" . $row["acc_number"] . "</td>";
                            echo "<td ><a href='OneCustomer.php'><button type='submit'' name='user'  id='users1' value= '{$row['name']}' ><span>Details</span></button></a></td></form>";
                            echo "</tr>";
                        }
                    echo "</table>";
                    } 
                    else{
                        echo "0 results"; 
                    }
                    $conn->close();
                ?>


            </table>
        </div>

        <div class="img">
            <img src="./img/2.png" alt="">
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

    <script>
       var loader=document.getElementById('loader');

       function load(){
           loader.style.display="none";
       }
    </script> 
</body>  
</html>
