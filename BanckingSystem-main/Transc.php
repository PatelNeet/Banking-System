<!DOCTYPE html>
<html>

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
        .fix__nav{
            box-shadow: red 0 0 5px 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .pic {
            background: url('./img/mony_heist_transfer_security.jpg') repeat-y;
            background-size: 100% 80vh;
        }
        .main__grp {
            margin: 10px 10px 10px 10px;
            padding: 10px 10px 10px 10px;
            overflow-x: auto;
        }
        table td{
            color:white;
        }
        

        .btn,
        .btn:visited{
            background-color:rgb(243, 10, 10); 
            border-radius: 15px;
            border-bottom-color: black;
            color: white;
            padding: 4px 35px;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            transition: color 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
            }
        .btn:hover{
            background-color:transparent; 
            border: 2px solid rgb(243, 10, 10);
            color: rgb(243, 10, 10);
        }

        @media only screen and (max-width: 444px){
            .btn,
            .btn:visited {
                background-color:rgb(243, 10, 10); 
                border-radius: 15px;
                border-bottom-color: black;
                color: white;
                padding: 4px 20px;
                text-align: center;
                font-size: 10px;
                font-weight: 600;
                transition: color 0.3s ease-in-out;
                transition: background-color 0.3s ease-in-out;
            }
            
            .btn:hover{
                background-color:transparent; 
                border: 2px solid rgb(243, 10, 10);
                color: rgb(243, 10, 10);
            }   
        }

    </style>

    

    <script>
        function printnow() {
            window.print();
        }
    </script>

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
              new responsive view Header 
        #######################################
    -->

    <div class="pic">
        <br><br><br>

        <div class="main__pb " align="center">
            <div>

                <div class="main__grp">
                    <div class="table_grp">
                        <!-- <table border="1" class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                </tr>
                            </thead>

                            
                        </table> -->
                        <table>
                            <tr>
                                <th>Sender <br>Name</th>
                                <th>Sender <br>A/c No.</th>
                                <th>Recipient <br>Name</th>
                                <th>Recipient <br>A/c No.</th>
                                <th>Amount</th>
                                <th>Date <br>& <br>Time</th>
                            </tr>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "","banksystem");

                                // Check connection

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM transactions";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    // output data of each row

                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        // echo "<form method ='post' action = 'OneCustomer.php'>";
                                        echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
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
                </div>
            </div>
        </div>
        <!-- </div> -->

        

        
        <div class="print" align="center">
            <button class="btn" onclick="printnow()">Print Now</button>
        </div> <br>
        
    </div>
    


    <!-- 
      =====================================================
        Footer  
      =====================================================
    -->
    <!-- <div class="fix__nav_footer"> -->
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
    <!-- </div> -->

    <script>
       var loader=document.getElementById('loader');

       function load(){
           loader.style.display="none";
       }
    </script> 

</body>
</html>

