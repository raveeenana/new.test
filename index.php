<!DOCTYPE html>
<html>
    <head>
        <title>Airplane Reservation System</title>
        <link rel="stylesheet" type="text/css" href="css/nav_style.css">
        <link rel="stylesheet" type="text/css" href="css/index_style.css">
        <link rel="stylesheet" type="text/css" href="css/footer_style.css">
        <script src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/footer.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        
    <!--Home Page Image Slider Code  /Code line 16 to 46/-->
         <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/banner1.JPG" alt="Slider Image 1" style="width:100%; height:450px;">
                </div>
                <div class="item">
                    <img src="images/banner2.jpg" alt="Slider Image 2" style="width:100%; height:450px;">
                </div>

                <div class="item">
                    <img src="images/banner4.jpg" alt="Slider Image 3" style="width:100%; height:450px;">
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    <!--End of Home Page Image Slider Code  /Code line 16 to 46/-->
        
        <br>
        
    <!--Home page Content Display Details, photos /Code line 50 to /-->
        <div id="logodiv">
            <center><img src="images/logo2.JPG"></center>
        </div>
        
        <div id="detaildiv">
            <p id="detail">&nbsp;&nbsp;&nbsp; We are the <span id="highligted">Sri Lankan's largest air travel service providers</span>. Also we provides amazing deals to our cutomers. So you don't have to worry about our charges. We can gurantee that our <span id="highligted">charges are very cheap</span> than other companies. </p>
            <h3> Are you afraid about air travels?</h3>
            <p>&nbsp;&nbsp;&nbsp; Don't affraid anymore. Because we're the company which is having <span id="highligted">most secured air travel system</span> and latest safety tools. Also we having <span id="highligted">most qualified technical staff</span> in the world. Not only that, our all flights are <span id="highligted">colompletely insured</span>.  So you don't want to worry about your safety anymore. You just need to enjoy your journey.</p>
        </div>
        <br>
        <div id="divdown">
            <br>
			<div id="div3">
				<h3 style="font-family: "Trebuchet MS";">Why you need to Choose Air Lanka?.....</h3>
				<ul id="list1">
					<li>Lowest Rates</li>
					<li>Provide comfirtable service</li>
					<li>Customer friendly staff</li>
					<li>24/7 availability</li>
                    <li>Attractive deals &amp; discounts</li>
                    <li>Most awarded Air service provider </li>
                    <li>Availability of online reservation</li>
				</ul>
				<img src="images/good_img.png" style="width:300px;padding-left:60px;">
			</div>
            <div id="div2">
                <img src="images/award2.png" style="width:800px;height:500px;padding-right:100px;"> 
            </div>           
        </div>
    <!--End of Home page Content Display Details, photos /Code line 50 to 80/-->
        
            <div>
    <!--Table with php to display flight details to user to book seats. This table is frequently updated Site Admin / Code line 83 to 139/-->
                <div id="tbl">
                    <?php 
                        include "conn.php";
                        $today = date('Y-m-d');//geting today to filter out old records 
                        $result = mysqli_query($con,"SELECT * FROM available_flights WHERE departure > '$today'");
                        if(!$result){
                            die("Could not get data:".mysqli_error($con));
                        }
                        else{
                            $record=mysqli_num_rows($result);
                            $field=mysqli_num_fields($result);
                            if($record != 0 && $field != 0){

                                echo "<center>
                                    <table border=1 style='border-radius:20px;text-align:center;'>           
                                        <tr>
                                            <th>FLIGHT NO</th>
                                            <th>DEPARTURE DATE</th>
                                            <th>DEPARTURE TIME</th>
                                            <th>START FROM</th>
                                            <th>DESTINATION</th>
                                            <th>ECONOMY CLASS PRICE</th>
                                            <th>BUSINESS CLASS PRICE</th>
                                            
                                        </tr>"; 
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['flight_no'] . "</td>";
                                    echo "<td>" . $row['departure'] . "</td>";
                                    echo "<td>" . $row['departure_time'] . "</td>";
                                    echo "<td>" . $row['startfrom'] . "</td>";
                                    echo "<td>" . $row['destination'] . "</td>";
                                    echo "<td>" . $row['e_class_price'] . "</td>";
                                    echo "<td>" . $row['b_class_price'] . "</td>";
                                    echo "</tr>";
                                }

                            echo "</table></center>";

                            }
                            else{
                                echo "<center>
                                    <table border=1>           
                                        <tr>
                                            <th>No any flights are currently available for booking</th>
                                        </tr>"; 

                            }
                        }

                        mysqli_free_result($result);
                        mysqli_close($con);
                   ?>

                </div>
    <!--End of Table with php to display flight details to user to book seats. / Code line 83 to 139/-->
                
    <!--location fixed Linked image to user account login /Code line 141 to 147/-->
            <div style="width:100%;position:relative;margin-top:10px; bottom:30px;position:fixed;">
                <div style="float right;margin-left:70%;">
                    <a href=login.php><img src="images/book2.png" style="width:270px;height;65px;"></a>
                </div>
            </div>
    <!--End of location fixed Linked image to user account login /Code line 141 to 147/-->
                
            <br>
            <br>
            <br>
                
    <!--Moving Image Advertisement /Code line 153 to 161/-->
            <div style="width:100%; position:fixed;bottom:45px;">
                <a href="login.php">
                    <marquee scrolldelay="100" loop="1">
                        <img src="images/flybyimg.png" alt="adverticement oct 31st offer">
                    </marquee>
                </a>
            </div>
          </div>
    <!--End of Moving Image Advertisement /Code line 153 to 161/-->
        
    <!--Web Site Navigation Bar Codes /Code line 164 to 175/-->
        <div id="navbar">    
            <img id="logo" src="images/airlanka.png">
            <ul>  
                <li><a href="#" id="linkref">Home</a></li>
                <li><a href="login.php" id="linkref">LogIn</a></li>
                <li><a href="gallery.php" id="linkref">Gallery</a></li>
                <li><a href="contact.php" id="linkref">Contact</a></li>
                <li><a href="about.html" id="linkref">AboutUs</a></li>
                <li></li>
            </ul>
        </div>        
    <!--End of Web Site Navigation Bar Codes /Code line 164 to 176/-->
        
    </body>
    
<!--Web side footer which contain social network links and administrator link codes /Code line 180 to 214/-->
    <div class="footer">
        <div style="width:300px;float:right;">
            <a href="index.php">
                <img id="brand" src="images/airlanka.png" style="width:250px;height:40px;">
            </a>
        </div>

        <div style="width:60%;float:left;">
            <div style="width:180px;height:40px;float:left;">
                <p style="font-weight:bold;color:white;font-family:'Georgia';font-size:20px;padding-bottom: 25px;padding-left:15px;">Follow us on:</p>
            </div>
            <div id="buttonsdiv">
                <a href="https://twitter.com/?lang=en" target="_blank">
                    <img id="Twitter" alt="Twitter" src="images/twitter.png" />
                </a>
                <a href="https://www.linkedin.com/" target="_blank">
                    <img id="LinkedIn" alt="LinkedIn" src="images/linkedin.png"/>
                </a>
                <a href="https://www.facebook.com/" target="_blank">
                    <img id="Facebook" alt="Facebook" src="images/facebook.png"/>
                </a>
                <a href="https://plus.google.com/" target="_blank">
                    <img id="Google" alt="Google+" src="images/googleplus.png"/>
                </a>
                <a href="https://www.youtube.com/" target="_blank">
                    <img id="Youtube" alt="Youtube" src="images/youtube.png"/>
                </a>
            </div>
            <div id="admindiv">
                <a href="adminlogin.php"><p style="margin-top:1px;color:#696969">Admin Login</p></a>
            </div>
        </div>
    </div >
<!--End of Web side footer which contain social network links and administrator link codes /Code line 180 to 214/-->
    
</html>

<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->
