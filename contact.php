<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/contact_style.css">
        <link rel="stylesheet" type="text/css" href="css/nav_style.css">
        <link rel="stylesheet" type="text/css" href="css/footer_style.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/div_contact.js"></script>
        <script src="js/footer.js"></script>
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit],input[type=reset] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100px;
            }
            input[type=reset]{
                float: right;
            }
            input[type=submit],input[type=reset]:hover {
                background-color: #45a049;
            }

            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }
        </style> 
    </head>
    
    <body>
        <div>
        <!--Topic line /Code line 51 to 55/-->
            <div>
                <h3 id="topic"> If you have any problem fell free to wirte us <i>OR</i>  contact us</h3>
            </div>
        <!--Topic line /Code line 51 to 55/-->
            
        <!--Form to facilitate user to contact administrators or post feedback /Code line 58 to 74/-->
            <!--//Relevent PHP Code -line 169 to 211//-->
            <div  style="width:500px;heigth:900px;float:left;border-left:2px dotted black;margin-left:20px;">
                <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method= "POST" name="fcontact">
                        <label for="fname">Name</label>
                        <input type="text" id="fname" name="name" placeholder="Your name..">
                        <label for="lname">Email</label>
                        <input type="text" id="email" name="email" placeholder="Your Email..">
                        <label for="subject">Your Inquiry</label>
                        <textarea id="subject" name="content" placeholder="Write something.." style="height:150px"></textarea>
                        <input type="submit" value="Submit" name="submit">
                        <input type="reset" value="Clear">
                    </form>
                </div>
                <br><br>
            </div>
        <!--End of Form to facilitate user to contact administrators or post feedback /Code line 58 to 74/-->
        
        <!--Divs to expand and show email and tel nums of particular branch /Code line 76 to 113/-->
            <div style="width:750px;heigth:900px;float:right;border-left:5px solid black;"  id="numbers">
                <br>
                <div id="contact_4">
                    <h2 style="margin-top:10px;padding-left:10px;float:left;">Customer<br>&nbsp;&nbsp;Hotline</h2>
                    <img src="images/arrow.png" style="width:30px;height:50px; padding-top:20px; padding-left:1px;">
                        <span id="c_info4" style="display:none; float:right;padding-right:20px;">
                        <p> Tel : (+94)11 2222333<br>Email : hotline@airlanka.com  </p>
                    </span>
                </div>
                    <br>
                    <div id="contact_1">
                    <h2 style="margin-top:10px;padding-left:20px;float:left;">&nbsp;Head&nbsp;&nbsp;&nbsp;&nbsp;<br>Office</h2>
                    <img src="images/arrow.png" style="width:30px;height:50px;padding-top:20px;padding-left:5px;">
                    <span id="c_info1" style="display:none; float:right;padding-right:5px;">
                        <p> Tel : (+94)34 2244687<br>Email : headoffice@airlanka.com  </p>
                    </span>
                    </div>
                <br>
                <div id="contact_2">
                    <h2 style="margin-top:10px;padding-left:10px;float:left;">Colombo<br>&nbsp;&nbsp;Branch</h2>
                    <img src="images/arrow.png" style="width:30px;height:50px;padding-top:20px;padding-left:5px;">
                    <span id="c_info2" style="display:none; float:right;padding-right:20px;">
                        <p> Tel : (+94)11 2467687<br>Email : katunayaka@airlanka.com  </p>
                    </span>
                </div>
                <br>
                <div id="contact_3">
                    <h2 style="margin-top:10px;padding-left:10px;float:left;">&nbsp;Mattala&nbsp;&nbsp;<br>&nbsp;Branch</h2>
                    <img src="images/arrow.png" style="width:30px;height:50px; padding-top:20px; padding-left:5px;">
                    <span id="c_info3" style="display:none; float:right;padding-right:20px;">
                        <p> Tel : (+94)90 2679987<br>Email : katunayaka@airlanka.com  </p>
                    </span>
                </div>
            <br>

            </div>
        <!--End of Div to expand and show email and tel nums of particular branch /Code line 76 to 113/-->
            
        </div>
        <br>
    <!--Web Site Navigation Bar Codes /Code line 117 to 129/-->
        <div id="navbar">    
            <img id="logo" src="images/airlanka.png">
            <ul>  
                <li><a href="index.php" id="linkref">Home</a></li>
                <li><a href="login.php" id="linkref">LogIn</a></li>
                <li><a href="gallery.php" id="linkref">Gallery</a></li>
                <li><a href="#" id="linkref">Contact</a></li>
                <li><a href="about.html" id="linkref">AboutUs</a></li>
                <li></li>
            </ul>
        </div>
        <!--End of Web Site Navigation Bar Codes /Code line 117 to 129/-->
        
    <!--Web side footer which contain social network links and administrator link codes /Code line 131 to 165/-->
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
    <!--End of Web side footer which contain social network links and administrator link codes /Code line 131 to 165/-->
    </body>
</html>

<?php
    /*Contact form submission php script*/
    include "conn.php";
    if(isset($_POST['submit'])){
        if(empty(($_POST['name']) || ($_POST['email']) ||($_POST['content']) )){
                    echo '<script type="text/javascript">';
                    echo 'alert("Please fill all field befor submitting")';
                    echo '</script>';
        }
        else{
            $name=$_POST['name'];
            $email=$_POST['email'];
            $content=$_POST['content'];
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Only letters and white space allowed for name")';
                    echo '</script>';
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Please fill valid Email Address")';
                    echo '</script>';
            }
            else{
            $datesubmited = date('Y-m-d');
            $sql="INSERT INTO form_submissions(name,email,date_submited,question) VALUES('$name','$email','$datesubmited','$content')";
                if(mysqli_query($con,$sql)){
                    $tempsql="SELECT inquery_id FROM form_submissions ORDER BY inquery_id DESC LIMIT 1";
                    $result=mysqli_fetch_row(mysqli_query($con,$tempsql));
                    echo '<script type="text/javascript">';
                    echo 'var id="'.$result[0].'"; alert("Your Inquiry submitted successfully. Ref id of inquiry is "+id)';
                    echo '</script>';
                }
                    else{
                        echo "error in inserted data:".mysqli_error($con);
                    }
            }

        }
    }
    mysqli_close($con);
    /*End ofContact form submission php script*/
?>
<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->