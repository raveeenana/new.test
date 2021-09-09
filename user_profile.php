<?php
    session_start();
    include "conn.php";
    if (!isset($_SESSION['login_user'])) { //To block access Administrator page through URL
	   header("location:login.php");
    }
    $userloged=$_SESSION['login_user'];

    if (isset($_POST['logout'])) {
        session_unset(); 
        header("location:index.php");
    }
    else if(isset($_POST['back_acc'])){
        header("location:user_acc.php");
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
            tr{
                border: 2px solid black;
            }
            th{
                padding-left: 20px;
            }
            td{
                padding-left: 20px;
                text-align: left;
                padding-bottom: 5px;
            }
            #sub_btn button{
                width: 80%;
                margin-left: 10%;
                height: 45px;
                font-weight: bold;
                border: 1px solid black;
                margin-bottom: 5px;
            }
            #sub_btn button:hover{
                background-color: red;
                border-radius: 10px;
                color: white;
            }
            #btns{
                font-family: serif;
                font-size: 15px;
                background-color: crimson;
                color: white;
                font-weight: bolder;
                width: 200px;
                height: 40px;
            }
        </style>
    </head>
    <body>
    <!--Web Site navigation Bar which have links to move back to acc or logout /Code line 164 to 174/-->
        <div id="navbar">    
            <img id="logo" src="images/airlanka.png">
            <ul> 
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <li id="lgout"><input type="submit" name="back_acc" value="Back To Account"></li>
                    <li id="lgout"><input type="submit" name="logout" value="Log out & Back to main"></li>
                </form>
            </ul>
        </div>
     <!--End Web Site navigation Bar which have links to move back to acc or logout /Code line 164 to 174/-->   
        
        <br>
        
     <!--Area to display Loged user's information /Code line 178 to 213/-->
        <div id="btndiv">
            <center>    
                <br>
                <h3 style="color: red;font-weight: bold;font-family:Serif; "> ~~~ Profile Info ~~~ </h3><br>
                <?php 
                    
                    $sql="SELECT * FROM user_accounts WHERE user_name='$userloged'";
                    $result = mysqli_query($con,$sql);
                    $name=mysqli_fetch_row($result);
                    echo "<table style='font-weight:bold;font-size:20px;width:50%;border:2px solid black;'>
                        <tr>
                            <th>User Name:</th>
                            <td>".$name[0]."</li>
                        </tr>
                        <tr>
                            <th>User Full Name:</th>
                            <td>".$name[1]."</li>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>".$name[2]."</li>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>".$name[3]."</li>
                        </tr>
                        <tr>
                            <th>Tel No:</th>
                            <td>".$name[4]."</li>
                        </tr>
                    </table><br><br>";
                ?>
            </center>
        </div>
    <!--End of Area to display Loged user's information /Code line 178 to 213/-->
        
        <div style="width:100%;">
            
        <!--Div which hold buttons to update user details /Code line 217 to 226/-->
            
            <div style="width:30%;float:left;" id="sub_btn">
                <br>
                <form method="post" action="user_profile.php">
                    <h4><b><center> ~~~ Profile Update ~~~</center></b></h4>
                    <button name="ch_pwd">Change Password</button>
                    <button name="ch_name">Change Your Name</button>
                    <button name="ch_gen">Change Gender Information</button>
                    <button name="ch_tp">Change Telephone Number</button>
                </form>
                <br><br>
            </div>
        <!--End of Div which hold buttons to update user details /Code line 217 to 226/-->
            
        <!--Div which display forms to update user details accourding to above selection /Code line 228 to 318/-->
            <div style="width:65%;float:right;">
                <br>
                <?php
                /*Changing password form /Code line 232 to 258/*/
                    /*Relevent PHP Script Code line 373 to 418*/
                    if(isset($_POST['ch_pwd'])){ ?>
                        <h3 style="color:brown;margin-left:25%;"> ~ Change Password ~ <br></h3>
                        <form method="post" action="user_profile.php">
                            <table>
                                <tr>
                                    <th>Enter Current Password :</th>
                                    <td><input type="password" name="cur_pwd"></td>
                                </tr>
                                <tr>
                                    <th>Enter New Password :</th>
                                    <td><input type="password" name="new_pwd1"></td>
                                </tr>
                                <tr>
                                    <th>Re-Enter New Password  :</th>
                                    <td><input type="password" name="new_pwd2"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><input type="submit" name="pwd_upd" value="Update Password" id="btns"></td>
                                </tr>
                            </table>
                        </form>
                        <br><br><br>     
                 <?php  
                /*End of Changing password form /Code line 232 to 258/*/
                    }
                /*Changing name form /Code line 260 to 278/*/
                    /*Relevent PHP Script Code line 420 to 448*/
                    else if(isset($_POST['ch_name'])){ ?>
                        <h3 style="color:brown;margin-left:25%;"> ~ Change Name ~ <br></h3>
                        <form method="post" action="user_profile.php">
                            <table>
                                <tr>
                                    <th>Enter Full Name :</th>
                                    <td><input type="text" name="new_name" style="width:90%;"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><input type="submit" name="name_upd" value="Update Name" id="btns"></td>
                                </tr>
                            </table>
                        </form>
                        <br><br><br>     
                 <?php  
                /*End of Changing name form /Code line 260 to 278/*/
                    
                    }
                /*Changing gender form /Code line 281 to 303/*/
                    /*Relevent PHP Script Code line 450 to 464*/
                    else if(isset($_POST['ch_gen'])){ ?>
                        <h3 style="color:brown;margin-left:25%;"> ~ Change Name ~ <br></h3>
                        <form method="post" action="user_profile.php">
                            <table>
                                <tr>
                                    <th>Choose Your Gender :</th>
                                    <td>
                                        Male <input type="radio" name="gender" value="male" checked>
                                        <span style="margin-left:50px;"></span>
                                        Female <input type="radio" name="gender" value="female">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><input type="submit" name="gen_upd" value="Update Gender" id="btns"></td>
                                </tr>
                            </table>
                        </form>
                        <br><br><br>     
                 <?php
                /*End of Changing gender form /Code line 281 to 303/*/
                        
                    }
                /*Changing tel number form /Code line 306 to 326/*/
                    /*Relevent PHP Script Code line 466 to 494*/
                    else if(isset($_POST['ch_tp'])){ ?>
                        <h3 style="color:brown;margin-left:25%;"> ~ Change Telephone Number~ <br></h3>
                        <form method="post" action="user_profile.php">
                            <table>
                                <tr>
                                    <th>Enter your new Telephone Number :</th>
                                    <td>
                                       <input type="text" name="new_tp" placeholder="(+94)XXXXXXXXX" checked>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><input type="submit" name="tp_upd" value="Update TP" id="btns"></td>
                                </tr>
                            </table>
                        </form>
                        <br><br><br>     
                 <?php 
                /*End of Changing tel number form /Code line 306 to 326/*/
                    }
                    else{
                        echo '<img src="images/banner.jpg" width="90%">';
                    }
                    ?>
                <!--End of Div which display forms to update user details accourding to above selection /Code line 228 to 339/-->
                
            </div>
        </div>
        
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
    </body>
</html>
<?php
    /*PHP Script to update Password*/
    if(isset($_POST['pwd_upd'])){
        
        $cur_pwd=$_POST['cur_pwd'];
        $new_pwd1=$_POST['new_pwd1'];
        $new_pwd2=$_POST['new_pwd2'];
        
        if(empty($cur_pwd) || empty($new_pwd1) || empty($new_pwd2)){
            echo '<script type="text/javascript">';
            echo 'alert("Please Fill All fields")';
            echo '</script>';
        }
        else{
            $sql="SELECT password FROM user_accounts WHERE user_name='$userloged'";
            $result = mysqli_query($con,$sql);
            $record=mysqli_fetch_assoc($result);
            $ex_pwd=$record['password'];
            
            if($ex_pwd!=$cur_pwd){
                echo '<script type="text/javascript">';
                echo 'alert("Incorrect password. Please Enter correct Password")';
                echo '</script>';
            }
            else{
                if($new_pwd1!=$new_pwd2){
                    echo '<script type="text/javascript">';
                    echo 'alert("Re Entered Password Incorrect")';
                    echo '</script>';
                }
                else{
                    $sql=mysqli_query($con,"UPDATE user_accounts SET password='$new_pwd1' WHERE user_name='$userloged'");
                    if($sql){
                        echo '<script type="text/javascript">';
                        echo 'alert("Password Change Successfully")';
                        echo '</script>';
                    }
                    else{
                        echo '<script type="text/javascript">';
                        echo 'alert("Something Went Wrong")';
                        echo '</script>';
                    }
                }
            }
        }
        
    }

    /*PHP script to update name*/
    if(isset($_POST['name_upd'])){
        $new_name=$_POST['new_name'];
        if(empty($new_name)){
            echo '<script type="text/javascript">';
            echo 'alert("Please enter new name, if you want to update your name")';
            echo '</script>';
        }
        else{
            if (!preg_match("/^[a-zA-Z. ]*$/",$new_name)) {
                echo '<script type="text/javascript">';
                echo 'alert("Only Letters,White spaces and full stop marks are allowed for the name")';
                echo '</script>';
            }
            else{
                $sql=mysqli_query($con,"UPDATE user_accounts SET name='$new_name' WHERE user_name='$userloged'");
                if($sql){
                    echo '<script type="text/javascript">';
                    echo 'alert("Your name changed successfully")';
                    echo '</script>';
                }
                else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Something Went Wrong")';
                    echo '</script>';
                } 
            }
        }
    }

    /*PHP script to update gender*/
    if(isset($_POST['gen_upd'])){
        $new_gen=$_POST['gender'];
        $sql=mysqli_query($con,"UPDATE user_accounts SET gender='$new_gen' WHERE user_name='$userloged'");
        if($sql){
            echo '<script type="text/javascript">';
            echo 'alert("Gender changed successfully")';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Something Went Wrong")';
            echo '</script>';
        } 
    }

    /*PHP script ti update tel No*/
    if(isset($_POST['tp_upd'])){
        $new_tp=$_POST['new_tp'];
        if(empty($new_tp)){
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter a telephone number if you want to update existing Tel No")';
            echo '</script>';
        }
        else{
            if((!preg_match( "/^(\(\+[0-9]{2}\)[0-9]{9})$/",$new_tp) )){
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter Tel No in ginven Format : (+94)XXXXXXXXX")';
                echo '</script>';
            }
            else{
                $sql=mysqli_query($con,"UPDATE user_accounts SET tel_no='$new_tp' WHERE user_name='$userloged'");
                if($sql){
                    echo '<script type="text/javascript">';
                    echo 'alert("Tel No changed successfully")';
                    echo '</script>';
                }
                else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Something Went Wrong")';
                    echo '</script>';
                } 
            }
        }
    }


    /*Clossing mysql connection included from conn.php*/    
    mysqli_close($con);
?>
<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->