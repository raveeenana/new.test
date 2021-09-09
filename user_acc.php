<?php
    session_start();
    include "conn.php";

    /*Avoid access user account without login*/
    if (!isset($_SESSION['login_user'])) {
	   header("location:login.php");
    }
    $userloged=$_SESSION['login_user'];

    /*Log out operation code. When user click logout sessions will destroy and navigate to home page*/
    if (isset($_POST['logout'])) {
        session_unset(); 
        header("location:index.php");
    }

    /*Payment operation. Navigate to payment.php*/
    else if(isset($_POST['pay_now'])){
        $_SESSION['amount']=$_POST['ti_price'];
        $_SESSION['re_id']=$_POST['ti_id'];
        header("location:payment.php");
    }
    /*PHP navigation code for user_profile.php page*/
    else if(isset($_POST['my_pro'])){
        header("location:user_profile.php");
    }
?>

<html>
    <head>
        <title> User Account</title>
        <link rel="stylesheet" type="text/css" href="css/nav_style.css">
        <link rel="stylesheet" type="text/css" href="css/user_acc_style.css">
        <link rel="stylesheet" type="text/css" href="css/footer_style.css">
        <script src="js/footer.js"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#buttons_at_first").click(function(){
                    $(this).animate({down:"250px",height:"250px",width:"400px"});
                    $(this).children("p").animate({fontSize:"25px"});
                
                    $("#form_editing").delay(500).fadeIn();
                
                })
                $("#Twitter").mouseover(function(){
                    $("#Twitter").animate({
                        width: '+=10px',
                        height: '+=10px',
                    })
                })

                $("#Twitter").mouseout(function(){
                    $("#Twitter").animate({
                        width: '-=10px',
                        height: '-=10px',
                    })
                })
                $("#LinkedIn").mouseover(function(){
                    $("#LinkedIn").animate({
                        width: '+=10px',
                        height: '+=10px',
                    })
                })

                $("#LinkedIn").mouseout(function(){
                    $("#LinkedIn").animate({
                        width: '-=10px',
                        height: '-=10px',
                    })
                })

                $("#Facebook").mouseover(function(){
                    $("#Facebook").animate({
                        width: '+=10px',
                        height: '+=10px',
                    })
                })

                $("#Facebook").mouseout(function(){
                    $("#Facebook").animate({
                        width: '-=10px',
                        height: '-=10px',
                    })
                })
                $("#Google").mouseover(function(){
                    $("#Google").animate({
                        width: '+=10px',
                        height: '+=10px',
                    })
                })

                $("#Google").mouseout(function(){
                    $("#Google").animate({
                        width: '-=10px',
                        height: '-=10px',
                    })
                })

                $("#Youtube").mouseover(function(){
                    $("#Youtube").animate({
                        width: '+=10px',
                        height: '+=10px',
                    });
                });

                $("#Youtube").mouseout(function(){
                    $("#Youtube").animate({
                        width: '-=10px',
                        height: '-=10px',
                    })
                })

                $("#brand").mouseover(function(){
                    $("#brand").animate({
                        width: '+=10px',
                        height: '+=10px',
                    })
                })

                $("#brand").mouseout(function(){
                    $("#brand").animate({
                        width: '-=10px',
                        height: '-=10px',
                    })
                })
            })
        </script>
        <style>
          body{
                background-image: url(images/usrbacground.jpg);
            }
        </style>
    </head>
    <body>
    <!--Web page navigation bar which facilitate logout and direct to homepage /Code line 138 and 148/-->
        <!--//Relevent PHP code- line 11 to 15//-->
        <div id="navbar">    
            <img id="logo" src="images/airlanka.png">
            <ul> 
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <li id="lgout"><input type="submit" name="my_pro" value="My Profile"></li>
                    <li id="lgout"><input type="submit" name="logout" value="Log out & Back to main"></li>
                </form>
            </ul>
        </div>
    <!--End of Web page navigation bar which facilitate logout and direct to homepage /Code line 138 and 149/-->
        
    <!--Code to display Name of loged user /Code line 151 to 163/-->
        <div style="background-color:rgb(255,255,51,0.5);">
            
                <?php 
                    
                    $sql="SELECT * FROM user_accounts WHERE user_name='$userloged'";
                    $result = mysqli_query($con,$sql);
                    $name=mysqli_fetch_row($result);
                    echo "<p style='font-weight:bold;font-size:20px;'> User Account :".$name[1]."</p>";
                ?>

        </div>
    <!--End of Code to display Name of loged user /Code line 151 to 163/-->
            <br>
        
        <!--Button list which shows relevent admin functionalities /Code line 166 to 177/-->
            <div id="btndiv">
                <center>
                    <br>
                    <form method="post" action="user_acc.php" >
                        <button name="book_s">Book A Seat</button><!--//Relevent PHP Code -line 220 to 320//-->
                        <button name="ticket_cart">Ticket Cart</button><!--//Relevent PHP Code -line 321 to 367//-->
                        <button name="next_fl">My Upcomming Flights</button><!--//Relevent PHP Code -line 368 to 407//-->
                        <button name="view_b">View My ALL Bookings</button><!--//Relevent PHP Code -line 184 to 219//-->
                    </form>
                </center>
            </div>
        <!--End of Button list which shows relevent admin functionalities /Code line 166 to 178/-->
        
        <!--Main div which shows particuler php output from above selection /Code line 180 to 708/--> 
            <div>
                <center>
                    <?php
                        if (isset($_POST['view_b'])) {
                            /*Code for display history of user record list*/
                           $my_shedule_list = mysqli_query($con, "SELECT * FROM reservations WHERE user_id='$userloged'");
                           echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">All Reservations (Complete History)</h3><br><br>
                                    <table border="1">';
                                    echo mysqli_num_rows($my_shedule_list)." <b>Rows are available in your record list</b>";
                                    echo'<br><br>    <tr>
                                            <th>Reservation ID</th>
                                            <th>Departure Date</th>
                                            <th>Flight No</th>
                                            <th>Start From</th>
                                            <th>Destination</th>
                                            <th>Selected Class</th>
                                            <th>Price of the ticket</th>
                                            <th>Reserved Seat Row</th>
                                            <th>Reserved Seat Letter</th>
                                            <th>Status</th>
                                        </tr>';
                                
                                while ($row = mysqli_fetch_assoc($my_shedule_list)) {
                                    
                                    echo "<tr>
                                        <td>".$row['reservation_id']."</td>";
                                        echo"<td>".$row['ticket_date']."</td>";
                                        echo"<td>".$row['flight_no']."</td>";
                                        echo"<td>".$row['startfrom']."</td>";
                                        echo"<td>".$row['destination']."</td>";
                                        echo"<td>".$row['fclass']."</td>";
                                        echo"<td>".$row['price']."</td>";
                                        echo"<td>".$row['seat_row']."</td>";
                                        echo"<td>".$row['seat_l']."</td>";
                                        echo"<td>".$row['status']."</td>
                                      </tr>";
                                }
                                echo'</table><br><br><br>';
                        }
                        else if (isset($_POST['book_s'])){
                            
                            /*Display code for Flight Shedule*/
                            
                                $shedule_list = mysqli_query($con, "SELECT * FROM available_flights");
                                echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">Flight Shedule</h3><br><br>
                                     <table  border="1">
                                        <tr>
                                            <th>Trip ID</th>
                                            <th>Flight ID</th>
                                            <th>Departure Date</th>
                                            <th>Departure Time</th>
                                            <th>Start From</th>
                                            <th>Destination</th>
                                            <th>Economy Class Price</th>
                                            <th>Bussiness Class Price</th>
                                        </tr>';
                           
                                $today = date('Y-m-d'); //store current date for Filter out old records
                                while ($row = mysqli_fetch_assoc($shedule_list)) {
                                    if($row['departure']>$today){
                                        echo "<tr>
                                            <td>".$row['trip_id']."</td>";
                                            echo"<td>".$row['flight_no']."</td>";
                                            echo"<td>".$row['departure']."</td>";
                                            echo"<td>".$row['departure_time']."</td>";
                                            echo"<td>".$row['startfrom']."</td>";
                                            echo"<td>".$row['destination']."</td>";
                                            echo"<td>".$row['e_class_price']."</td>";
                                            echo"<td>".$row['b_class_price']."</td>
                                        </tr>";
                                    }
                                }
                                echo'</table><br><br>';  ?>
                                <hr width='75%' size='2'>
                                <h3>~~ Seat Booking ~~</h3><br>
                    
                            <!--Form for book Seat----------->
                                <!--//Relevent PHP Code -line 457 to 518//-->
                                <div style="width:50%;float:left;">
                                    <table id="addtrip">
                                        <form method="post" action="user_acc.php">
                                             <tr>
                                                <th>Trip Id</th>
                                                <td><input type="text" name="cur_trip_id" placeholder="Enter a valid Trip ID"></td>
                                            </tr>
                                            <tr>
                                                <th>Select Your Class</th>
                                                <td>
                                                    <select name="class_f">
                                                        <option value="economy"  selected>Economy</option>
                                                        <option value="business">Business</option>
                                                     </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Seat Row</th>
                                                <td>
                                                    <select name="seat_r">
                                                        <option value="1" selected>1st Row </option>
                                                        <option value="2">2nd Row</option>
                                                        <option value="3">3rd row</option>
                                                        <option value="4">4th Row</option>
                                                        <option value="5">5th Row</option>
                                                        <option value="6">6th Row </option>
                                                        <option value="7">7th Row</option>
                                                        <option value="8">8th row</option>
                                                        <option value="9">9th Row</option>
                                                        <option value="10">10th Row </option>
                                                        <option value="11">11th Row</option>
                                                        <option value="12">12th row</option>
                                                     </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Seat Selection</th>
                                                <td>
                                                    <input type="radio" name="l_of_seat" value="A" style="width:25px;" checked>A
                                                    <input type="radio" name="l_of_seat" value="B" style="width:25px;">B
                                                    <input type="radio" name="l_of_seat" value="C" style="width:25px;">C
                                                    <input type="radio" name="l_of_seat" value="D" style="width:25px;">D
                                                </td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td><input type="submit" name="submit_trip" value="Add to Cart" id="btn2"></td>
                                            </tr>

                                        </form>
                                    </table>
                                </div>
                    
                            <!--End of the Form for book Seat-->
                    
                                <div style="width:40%;float:right;margin-left:5%;">
                                    <!--Image which shows seat numbers-->
                                    <img src="images/book.jpg" style="width:500px">
                                </div>
                    <?php
                           
                       }
                       else if(isset($_POST['ticket_cart'])){
                           
                           $ticket_list = mysqli_query($con, "SELECT * FROM reservations WHERE user_id='$userloged' AND status='Pending'");
                           echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">Unpaid Tickets</h3><br><br>
                                    <table border="1" id="ti_crt">';
                                    echo mysqli_num_rows($ticket_list)." <b>Tickets are avilable to pay</b>";
                                    echo'<br><br>    <tr>
                                            <th>Ticket ID</th>
                                            <th>Departure Date</th>
                                            <th>Flight No</th>
                                            <th>Start From</th>
                                            <th>Destination</th>
                                            <th>Selected Class</th>
                                            <th>Price of the ticket</th>
                                            <th>Reserved Seat Row</th>
                                            <th>Reserved Seat Letter</th>
                                            <th colspan="2">Action</th>
                                        </tr>';
                                
                                while ($row = mysqli_fetch_assoc($ticket_list)) {
                                    
                                    echo "<tr>
                                        <td>".$row['reservation_id']."</td>";
                                        echo"<td>".$row['ticket_date']."</td>";
                                        echo"<td>".$row['flight_no']."</td>";
                                        echo"<td>".$row['startfrom']."</td>";
                                        echo"<td>".$row['destination']."</td>";
                                        echo"<td>".$row['fclass']."</td>";
                                        echo"<td>".$row['price']."</td>";
                                        echo"<td>".$row['seat_row']."</td>";
                                        echo"<td>".$row['seat_l']."</td>";
                                        echo"<td>
                                                <form method='post'>
                                                    <input type='submit' value='Pay Now' name='pay_now'>
                                                    <input type='hidden' value='".$row['reservation_id']."' name='ti_id'>
                                                    <input type='hidden' value='".$row['price']."' name='ti_price'>
                                                    </td>
                                                    <td>
                                                    <input type='submit' value='Cancel Ticket' name='ti_cancel'>
                                                </form>
                                            </td>
                                      </tr>";
                                }
                                echo'</table><br><br><br>';
                           
                           
                       }
                        else if(isset($_POST['next_fl'])){
                        
                           $today = date('Y-m-d');
                           
                           $ticket_list = mysqli_query($con, "SELECT * FROM reservations WHERE user_id='$userloged' AND status='Paid' AND ticket_date > '$today'");
                           echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">My Upcoming Tours</h3><br><br>
                                    <table border="1" id="ti_crt">';
                                    echo mysqli_num_rows($ticket_list)." <b>tours are available</b>";
                                    echo'<br><br>    <tr>
                                            <th>Ticket ID</th>
                                            <th>Departure Date</th>
                                            <th>Flight No</th>
                                            <th>Start From</th>
                                            <th>Destination</th>
                                            <th>Selected Class</th>
                                            <th>Price of the ticket</th>
                                            <th>Reserved Seat Row</th>
                                            <th>Reserved Seat Letter</th>
                                            <th colspan="2">Action</th>
                                        </tr>';
                                
                                while ($row = mysqli_fetch_assoc($ticket_list)) {
                                    
                                    echo "<tr>
                                        <td>".$row['reservation_id']."</td>";
                                        echo"<td>".$row['ticket_date']."</td>";
                                        echo"<td>".$row['flight_no']."</td>";
                                        echo"<td>".$row['startfrom']."</td>";
                                        echo"<td>".$row['destination']."</td>";
                                        echo"<td>".$row['fclass']."</td>";
                                        echo"<td>".$row['price']."</td>";
                                        echo"<td>".$row['seat_row']."</td>";
                                        echo"<td>".$row['seat_l']."</td>";
                                        echo"<td>".$row['status']."</td>
                                      </tr>";
                                }
                                echo'</table><br><br><br>';
                           
                           
                        }
                        else{
                            echo'<img src="images/logo.png" style="width:60%;height:auto;">';
                        }
                    
                        
                    ?>
                </center>
        </div>
    <!--Web side footer which contain social network links etc /Code line 416 to 450/-->
        <div class="footer">
            <div style="width:300px;float:right;">
                <span style="cursor: not-allowed;">
                    <img id="brand" src="images/airlanka.png" style="width:250px;height:40px;">
                </span>
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
                    <span style="cursor: not-allowed;"><p style="margin-top:1px;color:#696969">Admin Login</p></span>
                </div>
            </div>
        </div >
    <!--End of Web side footer which contain social network links etc /Code line 416 to 450/-->
        
    </body>
</html>


<?php
    /*Ticket submission php script*/
    if(isset($_POST['submit_trip'])){
        $today = date('Y-m-d');
        $shedule=mysqli_query($con,"SELECT trip_id,departure FROM available_flights WHERE departure > '$today'");
         //store current date for Filter out old records
        global $trip_ids;
        $trip_ids=array();
        while ($filters = mysqli_fetch_assoc($shedule)) {
                /*Trip ids are stored in global array. 
                When user is booking a seat easy to check weather ticket number is valid or not.*/
                array_push($trip_ids ,$filters['trip_id']);
                /*------------------------------*/
        }
        print_r($trip_ids);
        $trip_id=$_POST['cur_trip_id'];
        $class=$_POST['class_f'];
        $seat_row=$_POST['seat_r'];
        $seat_num=$_POST['l_of_seat'];

        if(in_array($trip_id,$trip_ids)){//To check weather trip_no is valid
            
            if( ($class=="business" && ($seat_row < 5 && $seat_row > 0)) || ($class=="economy" && ($seat_row <=12 && $seat_row >= 5)) ){
                 $relevent_trip = mysqli_query($con, "SELECT * FROM available_flights WHERE trip_id='$trip_id'");    
                 $trip_info = mysqli_fetch_assoc($relevent_trip);
                 $tripdate=$trip_info['departure'];
                 $triptime=$trip_info['departure_time'];
                 $fligh_no=$trip_info['flight_no'];
                 $start=$trip_info['startfrom'];
                 $end=$trip_info['destination'];
                 if($class=="economy"){
                     $price=$trip_info['e_class_price'];
                 }
                 else if(($class=="business")){
                     $price=$trip_info['b_class_price'];
                 }
                 $add_to_book=mysqli_query($con, "INSERT INTO reservations VALUES(NULL,'$userloged','$tripdate','$triptime','$fligh_no','$start','$end','$class',$price,'$seat_row','$seat_num','Pending')");

                 if($add_to_book){
                     echo '<script type="text/javascript">';
                     echo 'alert("Reservation Request Added to cart")';
                     echo '</script>';
                 }
                else{
                    echo '<script type="text/javascript">';
                    echo 'var row="'.$seat_row.'";var num="'.$seat_num.'"; alert("Seat "+row+" "+num+" is already booked. Try another one")';
                    echo '</script>';
                    
                }
            }
            else{
                echo '<script type="text/javascript">';
                echo 'alert("Your seat is not in your class. Please choose aseat in particular class")';
                echo '</script>';
            }

        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Not Existing Trip_ID.Please check again Enter a valid trip id")';
            echo '</script>';
        }
    }
    
/*Resevation canceling script*/
    if(isset($_POST['ti_cancel'])){
        
        $id=$_POST['ti_id'];
        $update_sql=mysqli_query($con,"UPDATE reservations SET status='Canceled' WHERE reservation_id='$id'");
        if($update_sql){
            echo '<script type="text/javascript">';
            echo 'var id="'.$id.'"; alert("Ticket No "+id+" is canceled.")';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Error occurs. Cannot cancel request")';
            echo '</script>';
        }
        
    }



    /*Clossing mysql connection included from conn.php*/    
    mysqli_close($con);
?>
<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->
