<?php
    session_start();
    include "conn.php";
    
    /*to Avoid access through URL. By checking whether $_SESSION['admin_loged'] is set */
    if (!isset($_SESSION['admin_loged'])) { 
	   header("location:adminlogin.php");
    }
    $adminloged=$_SESSION['admin_loged'];

    /*PHP script to log out operation*/
    if (isset($_POST['logout'])) {
        session_unset(); 
        header("location:index.php");
    }
    /*End of PHP script to log out operation*/

?>
<html>
    <head>
        <title> Admin Account</title>
        <link rel="stylesheet" type="text/css" href="css/nav_style.css">
        <link rel="stylesheet" href="css/admin_acc_style.css">
        <link rel="stylesheet" type="text/css" href="css/footer_style.css">
        <link rel="stylesheet" type="text/css" href="css/account_actions.css">
        <link rel="stylesheet" type="text/css" href="css/admin_acc_style.css">
        <script src="js/footer.js"></script> <!--ERROR HERE!- Effects not working in footer.js. So should add those in to script tags -->
        <script src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
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
   
    </head>
    <body>
        
    <!--Web page navigation bar which facilitate logout and direct to homepage /Code line 127 and 138/-->
        <!--//Relevent PHP code- line 11 to 16//-->
        <div id="navbar">    
            <img id="logo" src="images/airlanka.png">
            <ul>  
               <li id="lgout">
                        <?php echo "<form method='post'><button name='logout' id='lgot'>"; ?> <b>&lt;&lt;&lt;</b> Logout &amp; Back to Home<?php echo "</button></form>"; 
                    ?>
                </li>
            </ul>
        </div>
     <!--End of Web page navigation bar which facilitate logout and direct to homepage /Code line 127 and 138/-->
        
    <!--Code to display Name of loged admin /Code line 140 to 150/-->
        <div style="background-color:rgb(255,255,51,0.5)">   
                <?php 
                    
                    $sql="SELECT * FROM admin_accounts WHERE user_name='$adminloged'";
                    $result = mysqli_query($con,$sql);
                    $name=mysqli_fetch_row($result);
                    echo "<p style='font-weight:bold;font-size:20px;'> Administrator Account :".$name[2]."</p>";
                ?>
        </div>
    <!--End of Code to display Name of loged admin /Code lie 140 to 150/-->
        
        <div>
            <br>
            
        <!--Button list which shows relevent admin functionalities /Code line 155 to 167/-->
            <div id="btndiv">
                <center>
                    <br>
                    <form method="post" action="admin_acc.php" >
                        <button name="users">User Details</button><!--//Relevent PHP Code -line 173 to 216//-->
                        <button name="shedule">View Shedule</button><!--//Relevent PHP Code -line 300 to 418//-->
                        <button name="reservation">View Reservations</button><!--//Relevent PHP Code -line 419 to 497//-->
                        <button name="inquery">View Inquires</button><!--//Relevent PHP Code -line 217 to 299//-->
                    </form>
                </center>
            </div>
        <!--End of Button list which shows relevent admin functionalities /Code line 155 to 167/-->    
         
        <!--Main div which shows particuler php output from above selection /Code line 169 to 708/-->    
            <div>
                <center>
                    <?php
                        if (isset($_POST['users'])) {
                            /*Code for display users*/
                            $user_accs = mysqli_query($con, "SELECT * FROM user_accounts");
                            echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">User Details</h3><br><br>
                                 <table  border="1">
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name of the User</th>
                                        <th>Gender of thee user</th>
                                        <th>Email of the user</th>
                                        <th>Telephone No of user</th>
                                    </tr>';
                            while ($row = mysqli_fetch_assoc($user_accs)) {
                                $temp=$row['user_name'];
                                echo "<tr>
                                    <td>".$row['user_name']."</td>";
                                    echo"<td>".$row['name']."</td>";
                                    echo"<td>".$row['gender']."</td>";
                                    echo"<td>".$row['email']."</td>";
                                    echo"<td>".$row['tel_no']."</td>
                                </tr>";
                            }
                            echo'</table>';
                            
                            ?>
                        <!--Form for Delete User-------------------------------------------->
                            <!--Relevent PHP code -line 506 to 555 -->
                            <div id="buttons_at_first">
                              <p>Delete User</p>
                              <form id="form_editing" method="post" action="admin_acc.php">
                                    <div>
                                        <div style="padding-right:50px;">
                                            <input type="text" name="userid" placeholder="Enter UserID to Delete">
                                        </div>
                                        <div id="btn">
                                            <input type="submit" name="delete_usr" value="Delete User" >
                                        </div>
                                    </div>
                                </form>
                            </div>

                    <!-------------------End Delete User Form------------------------->
                        <?php
                        }
                        else if (isset($_POST['inquery'])){
                            
                            /*Code for Display Customer Inqueries*/
                            
                            $shedule_list = mysqli_query($con, "SELECT * FROM form_submissions WHERE status != 'replied'");
                                echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">View Pending Inquery</h3><br><br>
                                     <table border="1">
                                        <tr>
                                            <th>Inquery ID</th>
                                            <th>Name of The Client</th>
                                            <th>Email</th>
                                            <th>Submited date</th>
                                            <th>Question</th>
                                        </tr>';
                                while ($row = mysqli_fetch_assoc($shedule_list)) {

                                    echo "<tr>
                                        <td>".$row['inquery_id']."</td>";
                                        echo"<td>".$row['name']."</td>";
                                        echo"<td>".$row['email']."</td>";
                                        echo"<td>".$row['date_submited']."</td>";
                                        echo"<td>".$row['question']."</td>
                                      </tr>";
                                }
                                mysqli_free_result($shedule_list);
                                echo'</table>'; 
                        ?>    
                    <!--Form for Reply Inquries-------------------------------------------->
                            <!--Relevent PHP code -line 560 to 586-->
                            <div id="buttons_at_first" >
                                  <p>Reply For Inquery</p>
                                  <form id="form_editing" method="post" action="admin_acc.php">
                                        <div>
                                            <div style="padding-right:50px;">
                                                <input type="text" name="inq_id" placeholder="Enter Id of the inquery">
                                            </div>
                                            <div style="padding-right:100px;">
                                                <textarea name="reply" name="content" placeholder="Write Your Reply...." style="width:300px;height:70px;margin:0px;"></textarea>
                                            </div>
                                            <div id="btn">
                                                <input type="submit" name="rply_inq" value="Send Reply" style="margin-top:30px;">
                                            </div>
                                        </div>
                                    </form>
                            </div>
                            <br><br><br>
                    <!-------------------End Reply User Form------------------------->
                    
                        <hr width='75%' size='2'>
                            <br><br><br>
                        <?php
                            /*-----------View all inquery History operation-----------*/
                                $shedule_list = mysqli_query($con, "SELECT * FROM form_submissions");
                                
                                echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">View All Inqueries</h3><br>';
                                echo mysqli_num_rows($shedule_list)." Rows are available in history";
                                echo '<br><br>    <table border="1">
                                        <tr>
                                            <th>Inquery ID</th>
                                            <th>Name of The Client</th>
                                            <th>Email</th>
                                            <th>Submited date</th>
                                            <th>Question</th>
                                            <th>Status</th>
                                            <th>Given Answer</th>
                                        </tr>';
                                while ($row = mysqli_fetch_assoc($shedule_list)) {

                                    echo "<tr>
                                        <td>".$row['inquery_id']."</td>";
                                        echo"<td>".$row['name']."</td>";
                                        echo"<td>".$row['email']."</td>";
                                        echo"<td>".$row['date_submited']."</td>";
                                        echo"<td>".$row['question']."</td>";
                                        echo"<td>".$row['status']."</td>";
                                        echo"<td>".$row['admin_reply']."</td>
                                      </tr>";
                                }
                                mysqli_free_result($shedule_list);
                                echo'</table><br><br><br>';
                            
                        /*------------End View all inquery History operation------*/
                        }
                        else if (isset($_POST['shedule'])){
                            
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
                                while ($row = mysqli_fetch_assoc($shedule_list)) {

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
                                echo'</table>';  
                                                    ?>    
                    <!--Form for Remove outdated Filight reservation records----------------------------------------->
                        <!--Relevent PHP code -line 588 to 643-->
                         <div id="buttons_at_first">
                              <p>Delete Record</p>
                              <form id="form_editing" method="post" action="admin_acc.php">
                                    <div>
                                        <div style="padding-right:50px;">
                                            <input type="text" name="triprid" placeholder="Enter TripID to Delete">
                                        </div>
                                        <div id="btn">
                                            <input type="submit" name="delete_trip" value="Delete Record">
                                        </div>
                                    </div>
                               </form>
                          </div>

                    <!-------------------End Remove outdated Filight reservation records Form------------------------->
                            <br>    
                            <hr width='75%' size='2'> 
                    <!--Form for Add New Flight records------------------------------------------->
                        <!--Relevent PHP code -line 545 to 699-->
                                  <p id="newr">Add New Record</p>
                                  <table id="addtrip">
                                    <form method="post" action="admin_acc.php">
                                        <tr>
                                            <th>Flight id</th>
                                            <td>
                                                <input type="radio" name="fligt" value="A1-01" style="width:25px;" checked>A1-01
                                                <input type="radio" name="fligt" value="A2-43" style="width:25px;">A2-43
                                                <input type="radio" name="fligt" value="B1-21" style="width:25px;">B1-21
                                                <input type="radio" name="fligt" value="C1-11" style="width:25px;">C1-11
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Strating Country</th>
                                            <td>
                                                <select name="startf">
                                                    <option value="SriLanka"  selected>Sri Lanka</option>
                                                    <option value="UK">United Kingdom</option>
                                                    <option value="USA">USA</option>
                                                    <option value="China">China</option>
                                                    <option value="India">India</option>
							                     </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Departure Date</th>
                                            <td><input type="date" name="dep_date">
                                                <!--<input type="text" name="dep_date" placeholder="YYYY-MM-DD">--></td>
                                        </tr>
                                        <tr>
                                            <th>Departure Date</th>
                                            <td><input type="time" name="dep_time">
                                                <!--<input type="text" name="dep_date" placeholder="YYYY-MM-DD">--></td>
                                        </tr>
                                        <tr>
                                            <th>End Country</th>
                                            <td>
                                                <select name="endf">
                                                    <option value="SriLanka">Sri Lanka</option>
                                                    <option value="UK">United Kingdom</option>
                                                    <option value="USA">USA</option>
                                                    <option value="China">China</option>
                                                    <option value="India" selected>India</option>
							                     </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Economy Price</th>
                                            <td><input type="text" name="fprice_e" placeholder="Rs."></td>
                                        </tr>
                                        <tr>
                                            <th>Business Price</th>
                                            <td><input type="text" name="fprice_b" placeholder="Rs."></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td><input type="submit" name="submit_trip" value="Add Record" id="btn2"></td>
                                        </tr>
                                        
                                    </form>
                                </table>
                                

                    <!-------------------End Add new Filight reservation records Form------------------------->
                        <?php
                        }
                        else if (isset($_POST['reservation'])){
                            
                            /*Display code For unexpired Reservation*/
                            
                            $today = date('Y-m-d');
                            $shedule_list = mysqli_query($con, "SELECT * FROM reservations WHERE ticket_date >= '$today' AND status != 'Canceled'");
                                echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">New Reservations</h3><br><br>
                                     <table border="1">
                                        <tr>
                                            <th>Reservation ID</th>
                                            <th>User Name</th>
                                            <th>Departure Date</th>
                                            <th>Departure Time</th>
                                            <th>Flight No</th>
                                            <th>Start From</th>
                                            <th>Destination</th>
                                            <th>Price of the ticket</th>
                                            <th>Reserved Seat Row</th>
                                            <th>Reserved Seat Letter</th>
                                            <th>Status</th>
                                        </tr>';
                                while ($row = mysqli_fetch_assoc($shedule_list)) {

                                    echo "<tr>
                                        <td>".$row['reservation_id']."</td>";
                                        echo"<td>".$row['user_id']."</td>";
                                        echo"<td>".$row['ticket_date']."</td>";
                                        echo"<td>".$row['ticket_time']."</td>";
                                        echo"<td>".$row['flight_no']."</td>";
                                        echo"<td>".$row['startfrom']."</td>";
                                        echo"<td>".$row['destination']."</td>";
                                        echo"<td>".$row['price']."</td>";
                                        echo"<td>".$row['seat_row']."</td>";
                                        echo"<td>".$row['seat_l']."</td>";
                                        echo"<td>".$row['status']."</td>
                                      </tr>";
                                }
                                echo'</table>';
                            
                                echo "<br><br><br><hr width='75%' size='2'><br><br><br>";
                            
                            /*--------------To display All Reservations (With Expired)----------*/
                            
                            
                                $shedule_list = mysqli_query($con, "SELECT * FROM reservations");
                                echo '<h3 style="color: red;font-weight: bold;font-family:Serif; ">All Reservations (With old Records)</h3><br><br>
                                    <table border="1">';
                                    echo mysqli_num_rows($shedule_list)." Rows are available in history";
                                    echo'<br><br>    <tr>
                                            <th>Reservation ID</th>
                                            <th>User Name</th>
                                            <th>Departure Date</th>
                                            <th>Departure Time</th>
                                            <th>Flight No</th>
                                            <th>Start From</th>
                                            <th>Destination</th>
                                            <th>Price of the ticket</th>
                                            <th>Reserved Seat Row</th>
                                            <th>Reserved Seat Letter</th>
                                            <th>Status</th>
                                        </tr>';
                                while ($row = mysqli_fetch_assoc($shedule_list)) {

                                    echo "<tr>
                                        <td>".$row['reservation_id']."</td>";
                                        echo"<td>".$row['user_id']."</td>";
                                        echo"<td>".$row['ticket_date']."</td>";
                                        echo"<td>".$row['ticket_time']."</td>";
                                        echo"<td>".$row['flight_no']."</td>";
                                        echo"<td>".$row['startfrom']."</td>";
                                        echo"<td>".$row['destination']."</td>";
                                        echo"<td>".$row['price']."</td>";
                                        echo"<td>".$row['seat_row']."</td>";
                                        echo"<td>".$row['seat_l']."</td>";
                                        echo"<td>".$row['status']."</td>
                                      </tr>";
                                }
                                echo'</table><br><br><br>';
                        }
                        else{
                            ?>
                            <!-- Default image -->
                            <img src="images/logo.png" style="width:60%;height:auto;"><?php
                        }
                    

        
                        /*User Removal Operation
                        ----------------------------------------------------*/
                            /* 
                            VALIDATION NOT WORKING THROUGH mysqli_affected_rows($query)
                            ***VALIDATION REPLASED BY SELECT QUERY AFTER THE COMMENT
                            if(isset($_POST['delete_usr'])) {                                        
                                    $user = $_POST['userid'];
                                      if(!empty($user)){
                                        $query= mysqli_query($con, "DELETE FROM user_accounts WHERE user_name='$user'");
                                        if(mysqli_affected_rows()==0){
                                            echo '<script type="text/javascript">';
                                            echo 'alert("User Can not remove. Please check again User_id And Enter")';
                                            echo '</script>';
                                        } else {
                                            echo '<script type="text/javascript">';
                                            echo 'alert("User Removed Successfully!")';
                                            echo '</script>';
                                        }	  
                                    }
                                    else{
                                        echo '<script type="text/javascript">';
                                        echo 'alert("Please enter user_id to Delete user")';
                                        echo '</script>';
                                    }
                                }*/
                            if(isset($_POST['delete_usr'])) {                                        
                                $user = $_POST['userid'];
                                  if(!empty($user)){
                                    $check_user_query=mysqli_query($con,"SELECT user_name FROM user_accounts WHERE user_name='$user'");
                                    $rslt=mysqli_fetch_row($check_user_query);
                                    if(!empty($rslt[0])){
                                        if(mysqli_query($con, "DELETE FROM user_accounts WHERE user_name='$user'")){
                                            echo '<script type="text/javascript">';
                                            echo 'alert("User Removed Successfully!")';
                                            echo '</script>'; 
                                        }
                                        else{
                                            echo "Something Went wrong".mysqli_error($con);
                                        }
                                    } 
                                    else { 
                                        echo '<script type="text/javascript">';
                                        echo 'alert("Invalid Entry.Please check again User_id & Enter")';
                                        echo '</script>';                                    
                                    }	  
                                }
                                else{
                                    echo '<script type="text/javascript">';
                                    echo 'alert("Please enter user_id to Delete user")';
                                    echo '</script>';
                                }
                        }
                    /*---------------END User Removal Operation-------------------------------*/
                    
                    /*Reply inquery Operation
                        ----------------------------------------------------*/
                        if(isset($_POST['rply_inq'])) {                                        
                                $inq = $_POST['inq_id'];
                                $msg = $_POST['reply'];
                                  if(!empty($user)||!empty($msg) ){
                                    $sql= mysqli_query($con, "SELECT email FROM form_submissions WHERE inquery_id =$inq");
                                    if(mysqli_num_rows($sql)!=0){
                                        $result=mysqli_fetch_row($sql);
                                        echo '<script type="text/javascript">';
                                        echo 'var mail="'.$result[0].'"; alert("Your reply is sended to :"+ mail )';
                                        echo '</script>';
                                        mysqli_query($con,"UPDATE form_submissions SET status='replied',admin_reply='$msg' WHERE inquery_id=$inq");
                                    } else {  
                                        echo '<script type="text/javascript">';
                                        echo 'alert("Invalid Inquery Id.  Please check and Resend")';
                                        echo '</script>';
                                    }	  
                                }
                                else{
                                    echo '<script type="text/javascript">';
                                    echo 'alert("Please Fill inquery id and Solution to Complete Inquery")';
                                    echo '</script>';
                                }
                        }
                    
                    /*--------END Reply inquery Operation------------------------------------*/
                    
                    /*Reservation Record Removeval Operation
                    ----------------------------------------------------*/

                        /*VALIDATION NOT WORKING THROUGH mysqli_affected_rows($query)
                            ***VALIDATION REPLASED BY SELECT QUERY AFTER THE COMMENT 
                        
                        if(isset($_POST['delete_trip'])) {                                        
                            $trip = $_POST['triprid'];
                              if(!empty($trip)){
                                $sql= mysqli_query($con, "DELETE FROM available_flights WHERE trip_id=$trip");
                                if(mysqli_affected_rows($sql)==1){
                                    echo '<script type="text/javascript">';
                                    echo 'alert("Record Removed Successfully!")';
                                    echo '</script>';

                                }
                              else {  
                                    echo '<script type="text/javascript">';
                                    echo 'alert("Record Can not remove. Please check again Trip_id And Enter")';
                                    echo '</script>';
                                }	  
                            }
                            else{
                                echo '<script type="text/javascript">';
                                echo 'alert("Please enter trip_id to Delete user")';
                                echo '</script>';
                            }
                    }*/
                    if(isset($_POST['delete_trip'])) {                                        
                            $trip = $_POST['triprid'];
                              if(!empty($trip)){
                                  $check_trip_query=mysqli_query($con,"SELECT trip_id FROM available_flights WHERE trip_id=$trip");
                                  $rslt=mysqli_fetch_row($check_trip_query);
                                  if(!empty($rslt[0])){
                                       if(mysqli_query($con, "DELETE FROM available_flights WHERE trip_id=$trip")){
                                            echo '<script type="text/javascript">';
                                            echo 'alert("Record Removed Successfully!")';
                                            echo '</script>';
                                        }
                                        else{
                                            echo "Something Went wrong".mysqli_error($con);
                                        }
                                  }
                                  else {  
                                        echo '<script type="text/javascript">';
                                        echo 'alert("No such record. Please check again Trip_id And Enter")';
                                        echo '</script>';
                                }	  
                            }
                            else{
                                echo '<script type="text/javascript">';
                                echo 'alert("Please enter trip_id to Delete trip")';
                                echo '</script>';
                            }
                    }
                /*--------End Reservation Record Removeval Operation----------------------------*/
                    
                    /*Add new Flight Record Operation*/
                    
                    if(isset($_POST['submit_trip'])){
                        $fligt=$_POST['fligt'];
                        $ddate=$_POST['dep_date'];
                        $dtime=$_POST['dep_time'];
                        /*Since <input type='date' .. can't use, used normal text input*/
                        /*list($m, $d, $y) = preg_split('[/.-]', $ddate);//explode not working
                        $date = DateTime::createFromFormat('m/d/Y', "'$m'/'$d'/'$y");// Want to convert date format to YYYY-MM-DD
                        $fd=$date->format('Y-m-d');*/
                        
                        $strtf=$_POST['startf'];
                        $desti=$_POST['endf'];
                        $price=$_POST['fprice_e'];
                        $price_b=$_POST['fprice_b'];
                        
                        
                        
                        if(empty($fligt)||empty($ddate)||empty($strtf)||empty($desti)||empty($price)){
                            echo '<script type="text/javascript">';
                            echo 'alert("Please fill all field")';
                            echo '</script>';
                        }
                        else{
                            if(strcmp($strtf,$desti)==0){/*To check weather admin select same coutry for both destination and start points*/
                                echo '<script type="text/javascript">';
                                echo 'alert("Invalid Starting and Ending")';
                                echo '</script>';
                            }
                            elseif(($price<1000000) && ($price_b<1000000) && (preg_match("/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/", $ddate))){/*date base price format is DOUBLE(8,2). Max price of ticket shoul be 999999.99*/
                                $query=mysqli_query($con,"INSERT INTO available_flights(flight_no,startfrom,departure,departure_time,destination,e_class_price,b_class_price) VALUES ('$fligt','$strtf','$ddate','$dtime','$desti','$price','$price_b')");
                                if($query){
                                    echo '<script type="text/javascript">';
                                    echo 'alert("Record Added")';
                                    echo '</script>';
                                }
                                else{
                                    $err=mysqli_error($con);
                                    echo '<script type="text/javascript">';
                                    echo 'var err="'.$err.'"; alert("Query failed. Error occured. "+err)';
                                    echo '</script>';
                                }
                            }
                            else{
                                echo '<script type="text/javascript">';
                                echo 'alert("Something Went wrong. Check filled values Again.")';
                                echo '</script>';
                                
                            }
                        }
                        
                        
                          
                    }
                    /*---------END Add new Flight Record Operation-------------*/
                    
                        /*Clossing mysql connection included from conn.php*/    
                        mysqli_close($con);
                    ?>
                    

                </center>
            </div>
        <!--End of Main div which shows perticuler php output from above selection /Code line 169 to 708/-->   
            
        </div>
    <!--Web side footer which contain social network links etc /Code line 711 to 745/-->
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
    <!--End of Web side footer which contain social network links etc /Code line 711 to 745/-->
        
    </body>
</html>

<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->