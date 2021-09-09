<?php session_start(); ?>
<html>
    <head>
        <title>Log in or signup</title>
        <link rel="stylesheet" href="css/login_style.css">
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script src="js/backbtn.js"></script>
    </head>
    <body>
        <div class="login_page">
            
        <!--Main div which capable between login and register forms /Code line 12 to 48/-->
            <div class="form">
                
            <!--Form for facilitate user to create account in Airlanka site /Code line 15 to 34/-->
                <!--//Relevent PHP Code -line 98 to 152//--> 
                <form class="register_form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="text" id="name" name="name" placeholder="Enter your Name">
                    <input type="text" id="email" name="email" placeholder="Your email">
                    <input type="text" id="tellno" name="tellno" placeholder="Telephone Number (+94)XXXXXXXXX">
                    <input type="text" id="username" name="username"placeholder="Enter a user name">
                    <input type="password" id="password1" name="password1" placeholder="Enter Password">
                    <input type="password" id="password2" name="password2" placeholder="Re-enter Password">      
                    <span id="gen">
                        <label>Gender:</label>
                        <input type="radio" name="gender" value="Male" checked>Male
                        <input type="radio" name="gender" value="Female" >Female<br><br>
                        <input type="checkbox" name="terms" value="accept" checked>I Accept Terms and Conditions<br>
                    </span>
                    
                    <button name="submit">Create Account</button>
                    <p class="message">Already registered? <a href="#"> Login</a></p>
                </form>
            <!--End of Form for facilitate user to create account in Airlanka site /Code line 15 to 33/--> 
                
            <!--Form for navigate user to user_acc.php when username and password correct /Code line 36 to 45/-->
                <!--//Relevent PHP Code -line 70 to 96//--> 
                <form class="login_form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="text" placeholder="User Name" name="uname" id="un">
                    <input type="password" id="password" placeholder="Enter Password" name="pword">
                    <button name="login">Login</button>
                    
                    <p class="message">Not yet registered? <a href="#"> Register Now</a></p>
                </form>
            <!--Form for navigate user to user_acc.php when username and password correct /Code line 35 to 43/-->
                
            </div>
        <!--ENd of Main div which capable between login and register forms /Code line 12 to 48/-->
            
        </div>
        
    <!--Back button to navigate index.php page /Code line 50 to 54/ -->    
        <div id="back">
            <a href="index.php"><img src="images/backhome.png" id="backimg"></a>
        </div>
    <!--End of Back button to navigate index.php page /Code line 50 to 54/ -->
        
        
        <script>
            /*Script to switch between login and register forms*/
            $('.message a').click(function(){
                $('form').animate({height:"toggle", opacity:"toggle"},"slow");
            });
        </script>
        
    </body>
</html>

<?php
    include "conn.php";

/*PHP script to direct user to user_acc.php*/
    if(isset($_POST['login'])){
        $uname=$_POST['uname'];
        $pword=$_POST['pword'];
        if($uname=="" || $pword==""){
                    echo '<script type="text/javascript">';
                    echo 'alert("You Must fill both User Name and Password Fields")';
                    echo '</script>';
        }
        else{

            $result = mysqli_query($con,"SELECT user_name FROM user_accounts WHERE user_name='$uname' OR email='$uname' AND password='$pword'");
            if(mysqli_num_rows($result)==0){
                    echo '<script type="text/javascript">';
                    echo 'alert("Please Enter correct login details")';
                    echo '</script>';
            }
            else{
                $result=mysqli_fetch_row($result);
                $username=$result[0];
                $_SESSION['login_user']= $username;
                header("Location: user_acc.php");
            }
            
        }
    }
/*End of PHP script to direct user to user_acc.php*/

/*PHP script to validate and create appropriate user accounts*/
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tellno'];
        $uname = $_POST['username'];
		$pwd = $_POST['password1'];
		$pwd2 = $_POST['password2'];
		$gender = $_POST['gender'];
		$accept = $_POST['terms'];
        
        if (empty($name)||empty($email)||empty($tel)||empty($uname)||empty($pwd)||empty($pwd2)||empty($gender)){
            echo '<script type="text/javascript">';
            echo 'alert("Please Fill All Fields Before Submitting")';
            echo '</script>';
        }
        else if ($pwd!=$pwd2){
            echo '<script type="text/javascript">';
            echo 'alert("Passwords are not matching")';
            echo '</script>';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter Valid Email")';
            echo '</script>';
        }
        else if((!preg_match( "/^(\(\+[0-9]{2}\)[0-9]{9})$/",$tel) )){
            echo '<script type="text/javascript">';
            echo 'alert("Tp Number should Enter according to given format")';
            echo '</script>';   
        }
        else if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_accounts WHERE user_name = '$uname' OR user_name = '$email' OR email ='$uname' OR email='$email'"))==1){
            echo '<script type="text/javascript">';
            echo 'alert("User name or Entered email was already taken. Please Try a different one")';
            echo '</script>';
        }
        else if($accept=""){
            echo '<script type="text/javascript">';
            echo 'alert("You must accept our terms and conditions to register")';
            echo '</script>';
        }
        else{
            $sql = mysqli_query($con, "INSERT INTO user_accounts VALUES ('$uname', '$name', '$gender', '$email', '$tel', '$pwd')");
				if (!$sql) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Something went wrong. Can not register.")';
                    echo '</script>';
				} else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Congradulations. Successfully registered. LOG IN NOW")';
                    echo '</script>';
				}
        }
    }
/*End of PHP script to validate and create appropriate user accounts*/
?>
<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->