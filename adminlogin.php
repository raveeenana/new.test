<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log in form to Airline System</title>
        <link rel="stylesheet" type="text/css" href="css/admin_log_style.css">
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script src="js/backbtn.js"></script>
        <script src="js/admin_login.js"></script>

    </head>
    <body>
        
    <!--Expanding form to facilitate administrator to enter username and password to move admin_acc.php /Code line 14 to 34/ -->
        <!--//Relevent PHP script -Code line 45 to 69//-->
        <div id="maindiv">
            <span id="buttons_at_first">  
              <p>Administrator Log In</p>      
              <form id="form_editing" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div>
                        <div>
                            <input type="text" id="pin" placeholder="Enter Administrator Acc id" name="uname">
                        </div>
                        <div>
                            <input type="password" id="pin" placeholder="Enter Administrator Password" name="pword">
                        </div>
                        <div id="btn">
                            <input type="submit" name="submit" value="Log In">
                        </div>
                    </div>
                </form>
            </span>
        </div>
    <!--End of Expanding form to facilitate administrator to enter username and password to move admin_acc.php /Code line 14 to 33/ -->
     
    <!--Back button to navigate index.php page /Code line 36 to 40/ -->    
        <div id="back">
            <a href="index.php"><img src="images/backhome.png" id="backimg"></a>
        </div>
     <!--End of Back button to navigate index.php page /Code line 36 to 40/ -->    
        
    </body> 
</html>

<?php
    /*PHP code for navigate administrator to admin_acc.php when username and password correct*/
    include "conn.php";
    if(isset($_POST['submit'])){
        $uname=$_POST['uname'];
        $pword=$_POST['pword'];
        if($uname=="" || $pword==""){
                    echo '<script type="text/javascript">';
                    echo 'alert("You Must fill both User Name and Password Fields")';
                    echo '</script>';
        }
        else{
            $result = mysqli_query($con,"SELECT user_name FROM admin_accounts WHERE user_name='$uname'AND password='$pword'");
            if(mysqli_num_rows($result)==0){
                    echo '<script type="text/javascript">';
                    echo 'alert("Please Enter correct login details")';
                    echo '</script>';
            }
            else{
                $_SESSION['admin_loged']= $uname;
                header("Location: admin_acc.php");
            }
            
        }
    }
    /*End of PHP code for navigate administrator to admin_acc.php when username and password correct*/
?>

<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->